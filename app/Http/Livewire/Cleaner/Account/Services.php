<?php

namespace App\Http\Livewire\Cleaner\Account;

use Livewire\Component;
use App\Models\Types;
use App\Models\CleanerServices;
use App\Models\CleanerServicesIncluded;
use App\Models\Discount;
use App\Models\CleanerDiscount;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\ServicesItems;



class Services extends Component
{
    use LivewireAlert;

    public $cleaner, $types, $discounts;
    public $activeServiceItemsIds = [];
    public $newCustomServiceCardOpen = false;
    // public $newCustomService = [
    //     'title' => '',
    //     'price' => 0,
    //     'is_recurring' => false,
    //     'duration' => 0,
    // ];


    public function mount()
    {
        $this->prepareProps();
    }

    public function prepareProps()
    {
        $this->cleaner = User::with(['cleanerServices', 'cleanerServicesDescriptions', 'cleanerDiscounts'])->where('id', auth()->user()->id )->first();
        $this->types = Types::whereRelation('services', 'status', '1')->with('services.items')->get();    
        $this->discounts = Discount::all();
        $this->addCustomAttributesInProps();    
    }

    public function updated($prop, $value )
    {

    }


    public function upsertDiscount($discountId, $percentage)
    {
        $fieldsToCompare = ['user_id' => $this->cleaner->id, 'discounts_id' => $discountId];
        $fieldsToUpdate  = ['discount' => $percentage ];
        $resp = CleanerDiscount::updateOrCreate($fieldsToCompare, $fieldsToUpdate);

        $this->alert('success', 'Discount updated');
        $this->cleaner->load('cleanerDiscounts'); // refresh relation
        $this->addCustomAttributesInProps();
        return true;
    }


    public function hydrate()
    {
        $this->addCustomAttributesInProps();
    }    

    public function addCustomAttributesInProps()
    {
        $cleanerServices = $this->cleaner->cleanerServices;
        $cleanerServicesDescriptions = $this->cleaner->cleanerServicesDescriptions;

        /* Discounts Prop */
        foreach ( $this->discounts as $discount ) {
            $discount->cleaner_discount = $this->cleaner->cleanerDiscounts->where('discounts_id', $discount->id )->first();
        }

        /* Types prop */
        foreach ( $this->types as $type ) {

            foreach ( $type->services as $service ) {

                $service->cleaner_service_description = $cleanerServicesDescriptions->where('service_id', $service->id )->first();
                $service->does_offer_customization    = str_contains( strtolower( $service->title ), 'custom offer' ); // TODO: this code can break since it's hard coded

                foreach ( $service->items as $item ) {                    
                    $item->cleaner_service = $cleanerServices->where('services_items_id', $item->id )->first();
                }
            }
        }
        
    }

    public function refreshCleanerServicesRelation()
    {
        $this->cleaner->load('cleanerServices');
        $this->addCustomAttributesInProps();
    }

    public function toggleService($itemId)
    {
        $cleanerService = getCleanerServiceByServiceItemId( $this->cleaner, $itemId );

        if ( $cleanerService ){
            toggleCleanerServiceStatus($cleanerService);          
            $this->alert('success', "Service updated");
            $this->refreshCleanerServicesRelation();
            return true;
        }

        $cleanerService = storeCleanerServiceWithDefaults($this->cleaner, $itemId );

        $this->alert('success', "Service updated");
        $this->refreshCleanerServicesRelation();     
        return true;              
    }

    function updateCleanerService($cleanerServiceId, $details)
    {
        $cleanerService = $this->cleaner->cleanerServices->find( $cleanerServiceId );
        
        $cleanerService->price = $details['price'];
        $cleanerService->duration = $details['duration'];
        $cleanerService->save();

        $this->refreshCleanerServicesRelation();     
        $this->alert('success', 'Service updated');
        return true;
    }

    public function storeServiceDescription( $serviceId, $description ) 
    {
        $cleanerServiceIncluded = CleanerServicesIncluded::where('cleaner_id', $this->cleaner->id )
                                    ->where('service_id', $serviceId)->first();        

        if ( $cleanerServiceIncluded ) {

            $cleanerServiceIncluded->description = $description;
            $cleanerServiceIncluded->save();
            $this->alert('success', 'Description updated');
            return true;            
        }

        $cleanerServiceIncluded = new CleanerServicesIncluded;
        $cleanerServiceIncluded->cleaner_id = $this->cleaner->id;
        $cleanerServiceIncluded->service_id = $serviceId;
        $cleanerServiceIncluded->description = $description;
        $cleanerServiceIncluded->save();

        $this->alert('success', 'Description updated');        
        return true;
    }



    public function storeCustomServiceItem($serviceId, $details)
    {
        // TODO: fields validation is left
        
        $serviceItem = new ServicesItems;
        $serviceItem->services_id = $serviceId;
        $serviceItem->title = empty( $details['title'] ) ? "Custom service " : $details['title']; // TODO: added unnecessary condition to handle errors
        $serviceItem->is_custom   = true;
        $serviceItem->cleaner_id  = $this->cleaner->id;
        $serviceItem->save();

        $serviceItem->refresh();


        $cleanerService = new CleanerServices;
        $cleanerService->users_id = $this->cleaner->id;
        $cleanerService->services_items_id = $serviceItem->id;
        $cleanerService->price = $details['price'];
        $cleanerService->duration = $details['duration'];
        $cleanerService->status = '1';
        $cleanerService->save();

        $this->alert('success', 'Service added');
        $this->newCustomServiceCardOpen = false;
        $this->prepareProps();
        return true;                

    }

/*     public function serviceAction($type, $service)
    {
        $dataArray = $this->serviceData;

        $services = $dataArray[$type]['services'][$service];

        $itemsArray = [];
        if(@$services['items']){
            foreach($services['items'] as $i => $item){
                $item['checked'] = @$services['checked'] ? 'on' : false;
                $itemsArray[] = $item;
            }
        }
        
        $dataArray[$type]['services'][$service]['items'] = $itemsArray;

        $this->serviceData = $dataArray;
    }

    public function showService($type, $service, $item){

        $this->serviceData[$type]['services'][$service]['items'][$item]['toogle'] = $this->serviceData[$type]['services'][$service]['items'][$item]['toogle'] ? false : true;
    }


    public function servicePrice($type, $service, $item, $action){
        if($action == 'plus'){
            $this->serviceData[$type]['services'][$service]['items'][$item]['price'] = $this->serviceData[$type]['services'][$service]['items'][$item]['price'] + 1;
        }
        else {
            if($this->serviceData[$type]['services'][$service]['items'][$item]['price']=='1'){
                $this->serviceData[$type]['services'][$service]['items'][$item]['price'] = 1;
            }
            else {
                $this->serviceData[$type]['services'][$service]['items'][$item]['price'] = $this->serviceData[$type]['services'][$service]['items'][$item]['price'] - 1;
            }
        }
    }


    public function serviceDuration($type, $service, $item, $action){
        if($action == 'plus'){
            $this->serviceData[$type]['services'][$service]['items'][$item]['duration'] = $this->serviceData[$type]['services'][$service]['items'][$item]['duration'] + 1;
        }
        else {
            if($this->serviceData[$type]['services'][$service]['items'][$item]['duration']=='1'){
                $this->serviceData[$type]['services'][$service]['items'][$item]['duration'] = 1;
            }
            else {
                $this->serviceData[$type]['services'][$service]['items'][$item]['duration'] = $this->serviceData[$type]['services'][$service]['items'][$item]['duration'] - 1;
            }
        }
    } 


    public function saveData(){
        dd( $this->serviceData );
        updateServicesOfCleaners($this->user, $this->serviceData);

        $this->alert('success', 'Services saved');
    }


    public function storeIncluded(){
        

        
        if(@$this->included){
            $includedServices = CleanerServicesIncluded::where('user_id', $this->user->id)->get();

            foreach($this->included as $service => $data){
                if(@$data['data']){
                    $checkIncluded = $includedServices->where('services_id', $service)->first();
                    
                    $store = new CleanerServicesIncluded;
                    if(@$checkIncluded){
                        $store->id = $checkIncluded->id;
                        $store->exists = true;
                    }
                    $store->user_id = $this->user->id;
                    $store->services_id = $service;
                    $store->data = $data['data'];
                    $store->save();
                }
            }

            $this->alert('success', 'Included services saved');
        }
        else {
            $this->alert('error', 'Add included services');
        }
    }
    


    public function addServices($type, $service){
        $customDataArray = $this->serviceData[$type]['services'][$service]['items'] ?? [];

        $itemArray = [];
        $itemArray['id'] = $this->serviceData[$type]['services'][$service]['id'];
        $itemArray['title'] = '';
        $itemArray['price'] = '1';
        $itemArray['duration'] = '1';
        $itemArray['checked'] = true;
        $itemArray['toogle'] = true;
        $itemArray['custom'] = true;
        $itemArray['is_recurring'] = true;

        array_push($customDataArray, $itemArray);

        $this->serviceData[$type]['services'][$service]['items'] = $customDataArray;
    }


    public function discountAction($discount, $action)
    {
        if($action == 'plus'){
            $this->discountData[$discount]['discount'] = $this->discountData[$discount]['discount'] + 1;
        }
        else {
            if($this->discountData[$discount]['discount'] == 0){
                $this->discountData[$discount]['discount'] = 0;
            }
            else {
                $this->discountData[$discount]['discount'] = $this->discountData[$discount]['discount'] - 1;
            }
        }
    }

    public function discountStore()
    {
        $this->validate([
            'discountData.*.discount' => 'nullable|gte:0',
        ]);

        $cleanerDiscounts = CleanerDiscount::where('user_id', $this->user->id)->get();

        foreach($this->discountData as $discountId => $data){
            if(@$data['discount']){
                $checkDiscount = $cleanerDiscounts->where('discounts_id', $discountId)->first();

                $store = new CleanerDiscount;
                if(@$checkDiscount){
                    $store->id = $checkDiscount->id;
                    $store->exists = true;
                }
                $store->user_id = $this->user->id;
                $store->discounts_id = $discountId;
                $store->discount = $data['discount'];
                $store->save();
            }
        }

        $this->alert('success', 'Large Home Discount Saved');
    }
    */


    public function render()
    {
        $this->dispatchBrowserEvent('componentRendered');
        return view('livewire.cleaner.account.services');
    }
}

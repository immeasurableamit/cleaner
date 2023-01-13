<?php

namespace App\Http\Livewire\Cleaner\Account;

use Livewire\Component;
use App\Models\Types;
use App\Models\CleanerServices;
use App\Models\CleanerServicesIncluded;
use App\Models\Discount;
use App\Models\CleanerDiscount;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Services extends Component
{
    use LivewireAlert;

    public $user;
    public $serviceData;
    public $included;
    public $discounts;
    public $discountData;

    public function mount()
    {
        $this->user = auth()->user();

        $this->discounts = Discount::whereStatus('1')->get();
        $cleanerDiscounts = CleanerDiscount::where('user_id', $this->user->id)->get();

        foreach($this->discounts as $discount){
            $checkDiscount = $cleanerDiscounts->where('discounts_id', $discount->id)->first();

            $this->discountData[$discount->id]['discount'] = $checkDiscount->discount ?? '0';
        }



        $includedServices = CleanerServicesIncluded::where('user_id', $this->user->id)->get();
        foreach($includedServices as $include){
            $this->included[$include->services_id]['data'] = $include->data;
        }

        $customServices = CleanerServices::where('users_id', $this->user->id)->where('is_custom', '1')->get();

        $types = Types::with(['services', 'services.servicesItems'])->get();
        $cservices = CleanerServices::with('servicesItems')->where('users_id', $this->user->id)->where('is_custom', '0')->get();

        $cservicesItems = $cservices->where('status', 1 )->pluck('servicesItems.services_id')->toArray();
        $cservicesItems = array_unique($cservicesItems);



        $dataArray = [];
        foreach($types as $type){
            $typeArray = [];

            $typeArray['id'] = $type->id;
            $typeArray['title'] = $type->title;

            foreach($type->services as $service){
                $serviceArray = [];

                $serviceArray['id'] = $service->id;
                $serviceArray['title'] = $service->title;
                $serviceArray['home_discount'] = $service->home_discount;
                $serviceArray['checked'] = in_array($service->id, $cservicesItems) ? 'on' : false;

                if($service->title=='Custom Offerings'){
                    foreach($customServices as $cservi){
                        $itemArray = [];

                        $itemArray['id'] = $cservi->services_id;
                        $itemArray['title'] = $cservi->title;
                        $itemArray['price'] = @$cservi->price ?? '1';
                        $itemArray['duration'] = @$cservi->duration ?? '1';
                        $itemArray['checked'] = @$cservi->status=='1' ? 'on' : false;
                        $itemArray['toogle'] = false;
                        $itemArray['custom'] = @$cservi->is_custom=='1' ? true : false;
                        $itemArray['is_recurring'] = @$cservi->is_recurring=='1' ? true : false;

                        $serviceArray['items'][] = $itemArray;
                    }
                }
                else {
                    foreach($service->servicesItems as $item){
                        $cservice = $cservices->where('services_items_id', $item->id )->first();
                        $itemArray = [];

                        $itemArray['id'] = $item->id;
                        $itemArray['title'] = $item->title;
                        $itemArray['price'] = @$cservice->price ?? '1';
                        $itemArray['duration'] = @$cservice->duration ?? '1';
                        $itemArray['checked'] = @$cservice->status=='1' ? 'on' : false;
                        $itemArray['toogle'] = false;
                        $itemArray['custom'] = false;

                        $serviceArray['items'][] = $itemArray;
                    }
                }

                $typeArray['services'][] = $serviceArray;
            }

            //array_push($dataArray, $typeArray);
            $dataArray[] = $typeArray;
        }

        $this->serviceData = $dataArray;

        //dd($dataArray);
    }

    public function serviceAction($type, $service)
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


    public function render()
    {
        return view('livewire.cleaner.account.services');
    }
}

<?php

namespace App\Http\Livewire\Cleaner\Account;

use Livewire\Component;
use App\Models\Types;
use App\Models\CleanerServices;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Services extends Component
{
    use LivewireAlert;

    public $user;
    public $serviceData;

    public function mount()
    {
        $this->user = auth()->user();

        $types = Types::with(['services', 'services.servicesItems'])->get();
        $cservices = CleanerServices::with('servicesItems')->where('users_id', $this->user->id)->get();

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
                $serviceArray['checked'] = in_array($service->id, $cservicesItems) ? 'on' : false;

                foreach($service->servicesItems as $item){
                    $cservice = $cservices->where('services_items_id', $item->id )->first();
                    $itemArray = [];

                    $itemArray['id'] = $item->id;
                    $itemArray['title'] = $item->title;
                    $itemArray['price'] = @$cservice->price ?? '1';
                    $itemArray['duration'] = @$cservice->duration ?? '1';
                    $itemArray['checked'] = @$cservice->status=='1' ? 'on' : false;
                    $itemArray['toogle'] = false;

                    $serviceArray['items'][] = $itemArray;
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
        foreach(@$services['items'] as $i => $item){
            $item['checked'] = @$services['checked'] ? 'on' : false;
            $itemsArray[] = $item;
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
    


    public function render()
    {
        return view('livewire.cleaner.account.services');
    }
}

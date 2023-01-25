<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\Setting as SettingModel;
use App\Models\Seo as SeoModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Setting extends Component
{   
    use LivewireAlert;
    public $settings;

    public $page_name, $title, $description, $keywords;
    public $seoId;
    // public $seos;
   
    public $tax, $transaction_fee;
    public $tax_type, $transaction_type;

    public $stripe_key, $stripe_secret_key;
    public $facebook, $twitter, $instagram, $linkedin;
    public $smtp_host, $smtp_port, $smtp_username, $smtp_password;

    protected $listeners = ['confirmedAction'];

      public function mount(){
        

        $this->settings = SettingModel::findOrFail(1)->first();

        // $this->seos = SeoModel::all();

        $this->smtp_host = $this->settings->smtp_host;
        $this->smtp_port = $this->settings->smtp_port;
        $this->smtp_username = $this->settings->smtp_username;
        $this->smtp_password = $this->settings->smtp_password;

        $this->stripe_key = $this->settings->stripe_key;
        $this->stripe_secret_key = $this->settings->stripe_secret_key;

        $this->tax = $this->settings->tax;
        $this->transaction_fee = $this->settings->transaction_fees;

        $this->facebook = $this->settings->facebook_link;
        $this->twitter = $this->settings->twitter_link;
        $this->instagram = $this->settings->instagram_link;
        $this->linkedin = $this->settings->linkedin_link;

        $this->tax_type = $this->settings->tax_type;
        $this->transaction_type = $this->settings->transaction_fee_type;

    }

   

    public function update(){

        //   $validatedDate = $this->validate([
        //     'smtp_host' => 'required',
        //     'smtp_port' => 'required',
        //     'smtp_username' => 'required',
        //     'smtp_password' => 'required',
        // ]);
          
        // $store = new SettingModel;

        $store = SettingModel::findOrFail(1);
        $store->smtp_host = $this->smtp_host;
        $store->smtp_port = $this->smtp_port;
        $store->smtp_username = $this->smtp_username;
        $store->smtp_password = $this->smtp_password;

        $store->stripe_key = $this->stripe_key;
        $store->stripe_secret_key = $this->stripe_secret_key;

        $store->tax = $this->tax;
        $store->tax_type = $this->tax_type;
        $store->transaction_fees = $this->transaction_fee;
        $store->transaction_fee_type = $this->transaction_type;

        $store->facebook_link = $this->facebook;
        $store->twitter_link = $this->twitter;
        $store->instagram_link = $this->instagram;
        $store->linkedin_link = $this->linkedin;
        $store->save();

        $this->alert('success', 'Details stored successfully');
  

    }

      public function resetFields()
    {
        $this->page_name = '';
        $this->title = '';
        $this->description = '';
        $this->keywords = '';
        $this->seoId = '';
    }

     public function rules()
    {
        if($this->seoId){
            return [
                'page_name' => 'required|unique:seos,page,'.$this->seoId,
                'title' => 'required|max:255',
            ];
        }
        
        return [
            'page_name' => 'required|unique:seos,page',
            'title' => 'required|max:255',
        ];
    }

     public function edit($id)
    {
        $this->resetFields();
        $this->seoId = $id;
        $data = SeoModel::findOrFail($this->seoId);

        $this->page_name = $data->page;
        $this->title = $data->title;
        $this->description = $data->description;
        $this->keywords = $data->keywords;

        $this->emit('formShow');
    }

      public function store()
    {
        $this->validate();

        $store = new SeoModel;
        if($this->seoId){
            $store->id = $this->seoId;
            $store->exists = true;
        }
        $store->page = $this->page_name;
        $store->title = $this->title;
        $store->description = $this->description;
        $store->keywords = $this->keywords;
        $store->save();

        $this->alert('success', 'Seo added');
        $this->emit('formClose');
        $this->resetFields();
    }
    
      public function delete($id)
        {
            $this->seoId = $id;

            $this->alert('', 'Are you sure to Delete?', [
                'toast' => false,
                'position' => 'center',
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancel',
                'showConfirmButton' => true,
                'confirmButtonText' => 'Yes',
                'onConfirmed' => 'confirmedAction',
                'allowOutsideClick' => false,
                'timer' => null
            ]);     
        }

        public function confirmedAction()
        {
            $data = SeoModel::findOrFail($this->seoId);

            $data->delete();
            $this->alert('success', 'Seo deleted');
            $this->resetFields();
        }

    public function render()
    {   
        $seos = SeoModel::all();

        return view('livewire.admin.settings.setting', ['seos'=>$seos]);
    }
}

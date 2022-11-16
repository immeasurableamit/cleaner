    <?php

namespace App\Http\Livewire\Admin\Services;

use Livewire\Component;
use App\Models\Services as ServicesModel;
use App\Models\ServicesItems;

class Services extends Component
{

    public $title, $status;

    public $itemTitle, $itemPrice, $itemDuration, $itemDescription, $itemStatus;


    public $deleteId, $deleteItemId;
    protected $listeners = ['confirmedDelete', 'confirmedItemDelete'];








    public function deleteService($id)
    {
        $this->deleteId = $id;

        $this->alert('warning', 'Are you sure do want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Delete it',
            'onConfirmed' => 'confirmedItemDelete',
            'timer' => null
        ]);
    }

    public function confirmedItemDelete()
    {
        $data = ServicesModel::findOrFail($this->deleteId);
        //...
        $data->delete();

        //$this->alert('success', 'Service deleted successfully');
    }



    public function deleteItem($id)
    {
        $this->deleteItemId = $id;

        $this->alert('warning', 'Are you sure do want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Delete it',
            'onConfirmed' => 'confirmedItemDelete',
            'timer' => null
        ]);
    }

    public function confirmedItemDelete()
    {
        $data = ServicesItems::findOrFail($this->deleteItemId);
        //...
        $data->delete();

        //$this->alert('success', 'Item deleted successfully');
    }


    public function render()
    {
        return view('livewire.admin.services.services');
    }
}

<?php

namespace App\Traits\Livewire\Cleaner;

use App\Models\User;

trait ServicesTrait {

    protected $cleaner;

    public function loadCleaner(User $cleaner)
    {
        $this->cleaner = $cleaner;

        $cleaner->loadMissing('cleanerServices');
    }

    public function doesProvideServiceItem($serviceItemId)
    {
        $serviceItem = $this->cleaner->cleanerServices->where('services_items_id', $serviceItemId )->first();

        return $serviceItem != null;
    }

    public function toggleStatusOfCleanerService($cleanerService)
    {

    }

}
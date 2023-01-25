<?php

namespace App\Http\Livewire\Admin\Faqs;

use Livewire\Component;
use App\Models\Faq;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Faqs extends Component
{   

    use LivewireAlert;

    public $question;
    public $answer;

     public function resetFields()
    {
        $this->question = '';
        $this->answer = '';
    }

    public function store(){

         $validatedDate = $this->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        
        Faq::create($validatedDate);
        
        $this->alert('success', 'Faqs added');
        $this->resetFields();
    }

    public function render()
    {
        // dd($this->answer);
        return view('livewire.admin.faqs.faqs');
    }
}

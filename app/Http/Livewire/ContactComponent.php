<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $comment;


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'comment' => 'required',
            'subject' => 'required',

        ]);
    }
    public function sendMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'comment' => 'required',
            'subject' => 'required',
        ]);
        $contact= New Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->comment = $this->comment;
        $contact->subject = $this->subject;
        $contact->save();
        session()->flash('message','Thanks , your message has been sent successfully');

    }



    public function render()
    {
        return view('livewire.contact-component');
    }
}

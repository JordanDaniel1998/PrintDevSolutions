<?php

namespace App\Livewire\Subscribers;

use App\Mail\SharedRegister;
use App\Models\Information;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CreateSubscriber extends Component
{

    public $username;
    public $email;
    public $rules;
    public $website;
    public $socialMedias;

    public function mount()
    {

        $this->username = "suscriptor";
        $this->rules = [
            'username' => 'required|string|min:3|max:30',
            'email' => 'required|email|unique:subscribers,email|min:5|max:60',
        ];

    }

    public function createSubs(){

        try {

            $data = $this->validate($this->rules);

            $informations = Information::all()->first();

            $suscriber = Subscriber::create([
                'email' => $data['email'],
                'username' => $data['username']
            ]);

            Mail::to($suscriber->email)->cc($informations->email)->send(new SharedRegister($informations, $suscriber));

            $this->reset('email');
            $this->dispatch("showMessageProcessing", ['message' => 'Su mensaje fue registrado, nos pondremos en contacto con usted.']);


        } catch (\Illuminate\Validation\ValidationException $th) {
            // Obtiene el primer mensaje de error de validación
            $errorMessage = $th->validator->errors()->first();

            // Despacha el evento con el mensaje de error
            $this->dispatch("showAlertConfig", ['message' => $errorMessage]);
        }


    }


    public function render()
    {
        return view('livewire.subscribers.create-subscriber');
    }
}

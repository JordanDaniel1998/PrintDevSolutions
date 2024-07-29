<?php

namespace App\Livewire\Users;

use App\Mail\SharedForm;
use App\Models\Form;
use App\Models\Information;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

class FormContact extends Component
{
    public $name;
    public $cellphone;
    public $email;
    public $message;


    protected $rules = [
        'name' => 'required|string|max:30',
        'cellphone' => 'required|regex:/^[1-9]{9}$/',
        'email' => 'required|email|max:60',
        'message' => 'required|string|max:255',
    ];

    protected $customMessages = [
        'name.required' => 'El campo nombre es requerido.',
        'cellphone.required' => 'El campo celular es requerido.',
        'cellphone.regex' => 'El campo celular debe contener exactamente 9 dígitos del 1 al 9.',
        'email.required' => 'El campo correo es requerido.',
        'email.email' => 'El campo correo debe ser una dirección de correo válida.',
        'message.required' => 'El campo mensaje es requerido.',
    ];

    public function sendFormUser()
    {
        try {

            $data = $this->validate($this->rules, $this->customMessages);

            $informations = Information::all()->first();

            $userForm = Form::create([
                'name' => $data['name'],
                'cellphone' => $data['cellphone'],
                'email' => $data['email'],
                'message' => $data['message'],
            ]);

            Mail::to($data['email'])->cc($informations->email)->queue(new SharedForm($informations, $userForm));
            $this->reset();

            $this->dispatch('showAlertFormUser', ['type' => 'success', 'message' => 'Su mensaje fue registrado, nos pondremos en contacto con usted.']);

        } catch (\Illuminate\Validation\ValidationException $th) {
            // Obtén el primer error específico del campo
            $firstError = $th->validator->errors()->first();

            // Muestra solo el mensaje de error del campo que falló
            $this->dispatch('showAlertFormError', ['message' => $firstError]);
        }
    }

    public function render()
    {
        return view('livewire.users.form-contact');
    }
}

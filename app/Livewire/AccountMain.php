<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AccountMain extends Component
{
    public $view;
    public $user;

    /* public $name;
    public $last;
    public $email;
    public $password;
    public $imagen; */

    // Solo basta con escuchar el evento que dispara su hijo, para que se actualize con los nuevos datos de $user
    /* protected $listeners = ['update-user']; */

    /* public function updateUser($updatedUser){
        $user = $updatedUser;
    }  */

    public function mount(User $user){

        $this->view = 'edit-user'; // Al cargar que se muestre por defecto este livewire
        $this->user = $user;
    }

    public function showEditUser()
    {
        $this->view = 'edit-user';
    }

    public function showDirectionUser()
    {
        $this->view = 'direction-user';
    }

    public function showOrdersHistory()
    {
        $this->view = 'historial-pedido';
    }

    public function render()
    {
        return view('livewire.account-main');
    }
}
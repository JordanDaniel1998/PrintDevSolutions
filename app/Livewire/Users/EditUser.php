<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

    // Creación de variables
    public $user_id;
    public $name;
    public $last;
    public $email;
    public $password;
    public $password_nuevo;
    public $password_nuevo_confirmation;
    public $imagen_perfil;
    public $imagen_nueva;

    public $rules;

    public function mount(User $user)
    {
        // Inicializar las variables
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->last = $user->last;
        $this->email = $user->email;
        $this->imagen_perfil = $user->imagen_perfil;

        // Se ejecutan cuando la función validate() se manda a llamar
        $this->rules = [
            'name' => 'required|max:30',
            'last' => 'required|max:30',
            'email' => 'required|email|unique:users,email,' . $this->user_id . '|max:60',
            'password' => 'required|min:6',
            'password_nuevo' => 'required|confirmed|min:6',
            'imagen_nueva' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function interventionImage($data, $user)
    {
        if ($data['imagen_nueva']) {
            $isImage = Storage::exists('public/users/' . $user->imagen_perfil);
            if ($isImage) {
                Storage::delete('public/users/' . $user->imagen_perfil);
            }
            $imagen = $data['imagen_nueva']->store('public/users');
            $data['imagen_nueva'] = str_replace('public/users/', '', $imagen);

            return $data['imagen_nueva']; // Imagen nueva
        }
        return $user->imagen_perfil; // Imagen antigua
    }

    public function updateUser()
    {
        // Datos a actualizar
        $data = $this->validate($this->rules);

        // Verificar si el usuario actual hace match con sus datos (email y password) antes de la actualizacion, con esto corroboramos que quien actualiza es el dueño de la cuenta
        if (!Auth::attempt(['email' => auth()->user()->email, 'password' => $data['password']])) {
            return redirect()
                ->route('myAccount', auth()->user()->id)
                ->with([
                    'message' => 'Credenciales incorrectas',
                    'type' => 'error',
                ]);
        }

        // Obtener usuario por su ID
        $user = User::findOrFail($this->user_id);

        // Aplicar Intervention
        $nombreImagen = $this->interventionImage($data, $user);

        // Reescribimos al usuario
        $user->name = $data['name'];
        $user->last = $data['last'];
        $user->email = $data['email'];
        $user->imagen_perfil = $nombreImagen;
        $user->password = $data['password_nuevo'];

        $user->save();
        // Dado que la variable a enviar es $user y este coincide con la variable que se envia al livewire padre <livewire:account-main :user="$user" />, automaicamente se actualiza la variable, ya no es necesario crear la funcion en el componente padre

        // Dispara el evento al componente padre
        /* $this->dispatch('update-user', $user); */
        return redirect()
            ->route('myAccount', auth()->user()->id)
            ->with([
                'message' => 'Usuario actualizado',
                'type' => 'success',
            ]);
    }
    public function render()
    {
        return view('livewire.users.edit-user');
    }
}
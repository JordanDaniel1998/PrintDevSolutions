<?php

namespace App\Livewire\Partners;

use App\Models\Partner;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowPartners extends Component
{

    #[On('deletePartnerById')]
    public function deletePartnerById(Partner $partner)
    {
        // Eliminar la foto principal
        $partnerImagen = 'public/partners/' . $partner->imagen;
        if (Storage::exists($partnerImagen)) {
            Storage::delete($partnerImagen);
        }

        $partner->delete();
    }

    public function render()
    {

        $partners = Partner::latest()->get();

        return view('livewire.partners.show-partners', compact('partners'));
    }
}
<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfilePhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public function updatedPhoto()
    {

        //buraya daha sonra güvenlik için "mimes" ekleyebilirsin
        $this->validate([
            'photo' => 'image|mimes:jpg,jpeg,png,webp|max:2048', // Max 1MB

        ]);

        $path = $this->photo->store('profile-photos', 'public');

        auth()->user()->update([
            'profile_photo' => $path
        ]);

        $this->dispatch('profile-updated'); // Sayfayı yenilemeden bildirmek için
    }

    public function render()
    {
        return view('livewire.update-profile-photo');
    }
}

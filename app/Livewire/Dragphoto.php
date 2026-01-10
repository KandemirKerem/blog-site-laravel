<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Dragphoto extends Component
{
    use WithFileUploads;

    public $photo;
    public $storedPath;

    public function mount($initialPath = null)
    {

        if($initialPath){
            $this->storedPath = $initialPath;
        }

        // Validasyon hatası sonrası geri dönüşte resmi kaybetmemek için
        if (old('image_path')) {
            $this->storedPath = old('image_path');
        }
    }

    public function updatedPhoto()
    {
        // Resim seçildiği an valide et ve kalıcı olarak kaydet
        $this->validate([
            'photo' => 'image|max:10240'
        ]);

        // Resim storage/app/public/blog-images klasörüne gider
        $this->storedPath = $this->photo->store('blog-images', 'public');
    }

    public function resetPhoto()
    {
        $this->photo = null;
        $this->storedPath = null;
    }

    public function render()
    {
        return view('livewire.dragphoto');
    }
}

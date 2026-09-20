<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Url;

class Blogs extends Component
{
    public $perPage = 6;

    // Tüm filtreleri URL ile senkronize ediyoruz
    #[Url(except: '')]
    public $category = '';

    #[Url(except: 'newest')]
    public $sort = 'newest';

    #[Url(history: true, except: '')]
    public $search = '';

    // Filtreler değiştiğinde sayfayı başa sarmak için
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['category', 'sort', 'search'])) {
            $this->perPage = 6;
        }
    }

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function selectCategory($slug)
    {
        $this->category = $slug;
        $this->perPage = 6;
    }

    public function render()
    {
        $query = Post::with(['user', 'tags', 'category']);

        // 1. Kategori Filtresi
        if ($this->category) {
            $query->whereHas('category', function($q) {
                $q->where('slug', $this->category);
            });
        }

        // 2. Arama Filtresi
        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                    ->orWhere('context', 'like', '%' . $this->search . '%')
                    ->orWhereHas('tags', function($tagQuery) {
                        $tagQuery->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        // 3. Sıralama
        if ($this->sort === 'oldest') {
            $query->reorder()->oldest();
        } elseif ($this->sort === 'popular') {
            // Eğer likes_count yoksa bunu 'views' vs. ile değiştir
            $query->reorder()->orderBy('id', 'desc');
        } else {
            $query->reorder()->latest();
        }

        return view('livewire.blogs', [
            'posts' => $query->simplePaginate($this->perPage),
            'categories' => Category::all()
        ])->layout('pages.blogs'); // Layout hala aynı kalabilir
    }
}

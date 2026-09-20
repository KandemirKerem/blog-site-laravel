<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class PostComments extends Component
{
    public $post;
    public $context;
    public $perPage = 5; // Başlangıçta kaç yorum görünsün?

    protected $rules = [
        'context' => 'required|min:3|max:1000',
    ];

    public function loadMore()
    {
        $this->perPage += 5; // Her tıklandığında 5 tane daha ekle
    }

    public function sendComment()
    {
        $this->validate();

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'context' => $this->context,
        ]);

        $this->context = '';
        // Yeni yorum gelince en üste düşmesi için listeyi tazelemiş oluyoruz
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);

        // Güvenlik: Sadece yorum sahibi veya admin silebilir
        if (auth()->id() === $comment->user_id || auth()->user()->is_admin) {
            $comment->delete();
        }
    }

    public function render()
    {
        return view('livewire.post-comments', [
            'comments' => $this->post->comments()
                ->with(['user']) // İŞTE ÇÖZÜM BURASI: Eager Loading
                ->latest()
                ->take($this->perPage) // Sayfalamak yerine "take" kullanıyoruz
                ->get()
        ]);
    }
}

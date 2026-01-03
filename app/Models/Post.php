<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property-read User $user
 */

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';


    protected $guarded = [];

    /*
    protected $fillable = [
        'title',
        'slug',
        'context',
        'excerpt',
        'image',
        'category_id',
    ];
    */
// app/Models/Post.php

    public function syncTags(?string $tagsString)
    {
        if (!$tagsString) {
            return $this->tags()->detach();
        }

        $tagIds = collect(explode(',', $tagsString))
            ->map(fn($name) => trim($name)) // Sadece boşlukları temizle, lower yapma (orijinal kalsın)
            ->filter()
            ->map(function ($name) {
                $slug = \Illuminate\Support\Str::slug($name);

                // İsim yerine SLUG üzerinden kontrol yapıyoruz
                $tag = \App\Models\Tag::firstOrCreate(
                    ['slug' => $slug], // Eğer bu slug varsa onu getir
                    ['name' => $name]  // Eğer yoksa, bu isimle yeni oluştur
                );
                return $tag->id;
            });

        return $this->tags()->sync($tagIds);
    }


    public static function makeslug($title){

        $title = request('title');
        $slug = Str::slug($title);

        // Aynı slug ile başlayan kayıtları bul (Örn: "deneme", "deneme-1", "deneme-2")
        $originalSlug = $slug;
        $count = 1;

        // Veritabanında bu slug zaten var mı?
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }


    public function user() {
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}

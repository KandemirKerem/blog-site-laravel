<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearOrphanPostImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:orphan-blog-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 1. Klasördeki tüm dosyaları al
        $allFiles = Storage::disk('public')->files('blog-images');

        // 2. Veritabanında kayıtlı olan yolları al
        $dbFiles = Post::pluck('image')->toArray();

        // 3. Klasörde olup DB'de olmayanları bul
        $orphanedFiles = array_diff($allFiles, $dbFiles);

        foreach ($orphanedFiles as $file) {
            // Varsayılan fotoğrafı silmemeye dikkat et!
            if ($file !== 'blog-images/default.avif') {
                Storage::disk('public')->delete($file);
                $this->info("Silindi: {$file}");
            }
        }

        $this->info('Temizlik tamamlandı knk!');
    }
}

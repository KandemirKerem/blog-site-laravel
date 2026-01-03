<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearOrphanedImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:orphan-pp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sahipsiz fotoğrafları temizler';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 1. Klasördeki tüm dosyaları al
        $allFiles = Storage::disk('public')->files('profile-photos');

        // 2. Veritabanında kayıtlı olan yolları al
        $dbFiles = User::pluck('profile_photo')->toArray();

        // 3. Klasörde olup DB'de olmayanları bul
        $orphanedFiles = array_diff($allFiles, $dbFiles);

        foreach ($orphanedFiles as $file) {
            // Varsayılan fotoğrafı silmemeye dikkat et!
            if ($file !== 'profile-photos/default_pp.jpg') {
                Storage::disk('public')->delete($file);
                $this->info("Silindi: {$file}");
            }
        }

        $this->info('Temizlik tamamlandı knk!');
    }
}

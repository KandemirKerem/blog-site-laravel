# 🚀 Laravel Blog Projesi

Bu proje, Laravel ve Livewire kullanılarak geliştirilmiş bir blog sitesidir.
Öğrenme amaçlı geliştirilmiştir.

## ✨ Özellikler
* 📝 **CRUD İşlemleri:** Blog yazısı ekleme, silme ve düzenleme.
* 👤 **Profil Yönetimi:** Profil fotoğrafı güncelleme ve şifre değişikliği.
* 👁️ **Sayaç:** Yazıların görüntülenme sayısı (Session kontrollü).
* 🖼️ **Resim Yükleme:** Sürükle-bırak destekli resim yükleme sistemi.

## 🛠️ Kurulum
1. `git clone https://github.com/KandemirKerem/blog-site-laravel.git`
2. `composer install`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. `php artisan migrate`

Projenin CSS (Tailwind) ve JS (Livewire/Vite) dosyalarının anlık olarak derlenmesi için şu komutu çalıştırmanız gerekir:

```bash
npm install && npm run dev
```
Projeyi geliştirirken XAMPP ve Mysql kullandım siz .env dosyasından kendinize göre değiştirebilirsiniz

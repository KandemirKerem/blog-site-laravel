  <!-- Hero -->
  <section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-soft via-white to-white"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12 relative">
      <div class="grid md:grid-cols-2 gap-10 items-center">
        <div class="space-y-6">
          <p class="text-sm font-semibold text-accent uppercase tracking-wide">Modern Blog Deneyimi</p>
          <h1 class="text-4xl sm:text-5xl font-bold text-slate-900 leading-tight">2025’in minimalist blog arayüzü ile yazılarını öne çıkar.</h1>
          <p class="text-lg text-slate-600">NovaBlog, temiz tipografi ve kart tabanlı yerleşimiyle okuyucularına nefes aldıran bir deneyim sunar. Kategorilere göre filtrele, en popüler yazılara göz at, yazılarını kolayca yönet.</p>
          <div class="flex flex-wrap gap-3">
            <a href="{{route('blogs.index')}}" class="px-5 py-3 bg-base text-white rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-700 transition-all duration-300">Popüler yazıları keşfet</a>
            <a href="{{route('dashboard.view')}}" class="px-5 py-3 bg-soft text-base rounded-xl text-sm font-semibold text-base/80 hover:text-base hover:shadow-lg transition-all duration-300">Panelime git</a>
          </div>
          <div class="flex items-center gap-4 text-sm text-slate-500">
            <div class="flex -space-x-3">
              <span class="w-9 h-9 rounded-full border border-white bg-slate-200"></span>
              <span class="w-9 h-9 rounded-full border border-white bg-slate-300"></span>
              <span class="w-9 h-9 rounded-full border border-white bg-slate-400"></span>
            </div>
            <span>10K+ aylık okuyucu • 350+ yazar</span>
          </div>
        </div>
        <div class="relative">
          <div class="absolute -left-10 -top-10 w-32 h-32 bg-soft rounded-full blur-3xl"></div>
          <div class="absolute -right-12 -bottom-10 w-32 h-32 bg-accent/10 rounded-full blur-3xl"></div>
          <div class="bg-white rounded-3xl shadow-card border border-slate-100 p-4 space-y-4">
            <img class="rounded-2xl object-cover h-64 w-full" src="{{ asset('assets/images/bilgisayar.avif') }}" alt="Blog cover">
            <div class="space-y-2">
              <div class="flex gap-2">
                <span class="px-3 py-1 text-xs font-semibold bg-soft text-accent rounded-full">Tasarım</span>
                <span class="px-3 py-1 text-xs font-semibold bg-soft text-accent/80 rounded-full">Üretkenlik</span>
              </div>
              <h3 class="text-xl font-semibold text-slate-900">Minimalist tasarım ile daha okunabilir blog deneyimi</h3>
              <p class="text-sm text-slate-600">Yeni jenerasyon kart tabanlı yapılar, mobil öncelikli tasarım ve tipografi odaklı içerik sunumu.</p>
              <div class="flex items-center justify-between text-xs text-slate-500">
                <span>İlayda Işık • 04 Şubat 2025</span>
                <a href="blog-detail.html" class="text-base font-semibold">Devamını Oku →</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

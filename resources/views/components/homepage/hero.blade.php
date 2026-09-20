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
          @if($mostpopular)
            <article class="group rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-card transition-all duration-200 overflow-hidden">
              <div class="relative h-48 overflow-hidden">
                 <img src="{{ $mostpopular->image ? asset('storage/' . $mostpopular->image) : asset('storage/blog-images/default.avif') }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" alt="Blog cover">
              </div>
              <div class="p-5 space-y-3">
                <div class="flex items-center justify-between text-xs text-slate-500">
                    <span class="px-3 py-1 bg-soft text-accent rounded-full font-semibold">{{ $mostpopular->category?->name ?? 'Genel' }}</span>
                    <span>{{ $mostpopular->views }} görüntüleme</span>
                </div>
                <a href="{{ route('blogs.show', $mostpopular->slug) }}" class="text-lg font-semibold text-slate-900 group-hover:underline">{{ $mostpopular->title }}</a>
                <p class="mt-2 text-sm text-slate-600 line-clamp-2">{{ $mostpopular->excerpt }}</p>
                <div class="flex items-center justify-between text-sm text-slate-600">
                  <span>{{ $mostpopular->user?->name }}</span>
                  <a class="text-base font-semibold group-hover:underline" href="{{ route('blogs.show', $mostpopular->slug) }}">Oku →</a>
                </div>
              </div>
            </article>
          @else
            <article class="group rounded-2xl bg-white border border-slate-100 shadow-sm p-6 text-center space-y-3">
              <div class="w-16 h-16 bg-soft text-accent rounded-2xl flex items-center justify-center mx-auto text-2xl font-bold">
                ✍️
              </div>
              <h3 class="text-lg font-semibold text-slate-900">Henüz Yazı Eklenmedi</h3>
              <p class="text-sm text-slate-500">İlk blog yazısını ekleyerek burayı renklendirin.</p>
              @auth
                <a href="{{ route('blogs.create') }}" class="inline-block px-4 py-2 bg-base text-white text-xs font-semibold rounded-xl hover:bg-slate-800 transition">Yeni Yazı Ekle</a>
              @endauth
            </article>
          @endif
        </div>
      </div>
    </div>
  </section>

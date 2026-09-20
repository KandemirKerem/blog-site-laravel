  <!-- Arama + Kategori Filtreleri -->
  <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-4">
      {{--
      <!--
    <div class="w-full">
      <form id="blog-search-form" class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-3 shadow-sm focus-within:border-base focus-within:ring-1 focus-within:ring-base/20">
        <label class="sr-only" for="blog-search">Blog ara</label>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
        </svg>
        <input id="blog-search" name="q" type="search" placeholder="Bloglarda ara (başlık, özet, yazar)..." class="w-full bg-transparent focus:outline-none text-sm text-slate-700" required>
        <button type="submit" class="hidden sm:inline-flex px-4 py-2 rounded-xl bg-base text-white text-sm font-semibold hover:bg-slate-900">Ara</button>
      </form>
    </div>
    -->
    --}}
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <h2 class="text-2xl font-semibold text-slate-900">Son Paylaşılan Bloglar</h2>
        <a href="{{route('blogs.index')}}" class="text-sm font-semibold text-base hover:underline">Tümünü Gör →</a>
      </div>
        {{--
      <div class="flex flex-wrap gap-2 text-sm">
        <button data-filter="all" class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-slate-700 font-semibold bg-white hover:border-base/40">Tümü</button>
        <button data-filter="tasarim" class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-slate-700 font-semibold bg-white hover:border-base/40">Tasarım</button>
        <button data-filter="kodlama" class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-slate-700 font-semibold bg-white hover:border-base/40">Kodlama</button>
        <button data-filter="uretekenlik" class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-slate-700 font-semibold bg-white hover:border-base/40">Üretkenlik</button>
        <button data-filter="yapay-zeka" class="filter-btn px-4 py-2 rounded-xl border border-slate-200 text-slate-700 font-semibold bg-white hover:border-base/40">Yapay Zeka</button>
      </div>
      --}}
    </div>
  </section>

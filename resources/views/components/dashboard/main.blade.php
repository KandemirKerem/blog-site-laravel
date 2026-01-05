  <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-slate-600">Hoş geldin, <span class="uppercase">{{auth()->user()->name}}</span></p>
        <h1 class="text-3xl font-bold text-slate-900">Kontrol Paneli</h1>
      </div>
      <div class="flex gap-3">
        <a href="{{route('blogs.create')}}" class="px-4 py-3 bg-base text-white rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-700 transition-all duration-300">Yeni Blog Ekle</a>
        <a href="{{route('profile')}}" class="px-4 py-3 bg-soft text-base rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg transition-all duration-300">Profilim</a>
      </div>
    </div>

    <section class="grid sm:grid-cols-3 gap-4">
      <div class="p-4 rounded-2xl border border-slate-100 bg-card shadow-sm">
        <p class="text-sm text-slate-500">Toplam Yazı</p>
        <p class="text-2xl font-semibold text-slate-900">{{count(auth()->user()->posts)}}</p>
      </div>
      <div class="p-4 rounded-2xl border border-slate-100 bg-card shadow-sm">
        <p class="text-sm text-slate-500">Bu Ay Okunma</p>
        <p class="text-2xl font-semibold text-slate-900">{{auth()->user()->getTotalViewsAttribute()}}</p>
      </div>

      <div class="p-4 rounded-2xl border border-slate-100 bg-card shadow-sm">
        <p class="text-sm text-slate-500">Taslak <span class="italic text-slate-500">(Yakında)</span></p>
        <p class="text-2xl font-semibold text-slate-900">0</p>
      </div>

    </section>
    <section class="space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold text-slate-900">Yazılarım</h2>

         {{-- Filtre ekle
        <div class="flex gap-2 text-sm">
          <button class="px-3 py-2 rounded-xl border border-slate-200 text-slate-700 font-semibold bg-white">Tümü</button>
          <button class="px-3 py-2 rounded-xl border border-slate-200 text-slate-700 font-semibold bg-white">Taslak</button>
          <button class="px-3 py-2 rounded-xl border border-slate-200 text-slate-700 font-semibold bg-white">Yayında</button>
        </div>
         --}}
      </div>

      <div class="min-h-50 grid md:grid-cols-2 gap-4">

          @forelse(auth()->user()->posts as $post)
              <article class="rounded-2xl border border-slate-100 bg-white shadow-sm hover:shadow-card transition-all duration-200 p-4 sm:p-5 space-y-3 overflow-hidden">
                  {{-- Üst Kısım: Esnek ve Taşmayan Yapı --}}
                  <div class="flex flex-col sm:flex-row sm:items-start justify-between text-xs text-slate-500 gap-2">
                      <div class="flex flex-wrap items-center gap-2 min-w-0">
                          {{-- Başlık: Mobilde genişliği kısıtladık --}}
                          <span class="px-3 py-1 bg-soft text-accent rounded-full font-semibold truncate max-w-45 sm:max-w-none">
                {{$post->title}}
            </span>
                          <span class="shrink-0 text-slate-400">Yayında</span>
                      </div>
                      <span class="shrink-0 whitespace-nowrap opacity-70">04 Şub 2025</span>
                  </div>

                  {{-- İçerik Kısmı --}}
                  <p class="text-sm text-slate-600 line-clamp-2 wrap-break-word">
                      {{$post->excerpt}}
                  </p>

                  {{-- Butonlar: Mobilde sıkışmaması için gap ve flex düzeni --}}
                  <div class="flex items-center justify-between gap-2 pt-2">
                      <div class="flex items-center gap-2">
                          <a href="{{route('blogs.edit',$post->slug)}}" class="px-3 py-2 rounded-lg bg-soft text-base text-xs sm:text-sm font-semibold whitespace-nowrap cursor-pointer hover:shadow-lg transition-all duration-300">
                              Düzenle
                          </a>

                          <button
                              form="delete-form-{{ $post->id }}"
                              onclick="return confirm('Bu yazıyı silmek istediğine emin misin knk? Bu işlem geri alınamaz!')"
                              type="submit"
                              class="cursor-pointer px-3 py-2 rounded-lg border border-red-200 bg-red-50 text-red-600 text-xs sm:text-sm font-semibold hover:bg-red-600 hover:text-white hover:border-red-600 transition-colors duration-200 whitespace-nowrap"
                          >
                              Sil
                          </button>
                      </div>

                      <a href="{{route('blogs.show',$post->slug)}}" class="text-base font-semibold text-xs sm:text-sm whitespace-nowrap">
                          Görüntüle
                      </a>
                  </div>

                  <form id="delete-form-{{ $post->id }}" action="{{route('blogs.delete',$post->slug)}}" class="hidden" method="post">
                      @csrf
                      @method('DELETE')
                  </form>
              </article>
          @empty
              <div class="col-span-full flex flex-col items-center justify-center py-20 px-4 border-2 border-dashed border-slate-200 rounded-3xl bg-slate-50/50">
                  <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                      </svg>
                  </div>
                  <h1 class="text-xl font-bold text-slate-900 mb-2">Henüz Bir Blog Paylaşmadınız</h1>
                  <p class="text-slate-500 text-center max-w-sm mb-6">
                      Görünüşe göre buralar biraz ıssız. Hemen ilk yazını yazmaya ne dersin?
                  </p>
                  <a href="{{ route('blogs.create') }}" class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-colors duration-200 shadow-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                      </svg>
                      İlk Yazını Oluştur
                  </a>
              </div>
          @endforelse



      </div>
    </section>
  </main>

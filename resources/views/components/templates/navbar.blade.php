 <!-- Navbar -->
  <header class="sticky top-0 z-40 backdrop-blur bg-white/80 border-b border-slate-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <a href="index.html" class="text-xl font-semibold text-base flex items-center gap-2">
          <span class="w-9 h-9 rounded-2xl bg-slate-900 text-white grid place-items-center font-bold">N</span>
          <span>NovaBlog</span>
        </a>
        <button class="md:hidden p-2 rounded-xl border border-slate-200 text-slate-700" id="mobile-menu-toggle" aria-label="Menüyü aç">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-600">
          <x-templates.navlink href="{{route('homepage')}}" :active="request()->routeIs('homepage')">Ana Sayfa</x-templates.navlink>
          <x-templates.navlink href="{{route('blogs.index')}}" :active="request()->is('blogs*')">Tüm Bloglar</x-templates.navlink>
          <x-templates.navlink href="{{route('dashboard.view')}}" :active="request()->is('dashboard')">Panelim</x-templates.navlink>
          <x-templates.navlink href="{{route('profile')}}" :active="request()->is('profile')">Profil</x-templates.navlink>
        </nav>
        <div class="hidden md:flex items-center gap-3">
          @guest
          <a href="{{route('login')}}" class="px-4 py-2 text-sm font-semibold text-base border border-slate-200 rounded-xl hover:border-base/30">Giriş Yap</a>
          <a href="{{route('register')}}" class="px-4 py-2 text-sm font-semibold text-white bg-base rounded-xl hover:bg-slate-900">Kayıt Ol</a>
          @endguest
          @auth
              <form method="post" action="{{route('logout')}}">
                  @csrf
                  <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-red-600 bg-red-50 border border-red-100 rounded-xl hover:bg-red-600 hover:text-white transition-all duration-200 shadow-sm active:scale-95">
                      Çıkış Yap
                  </button>
              </form>
          @endauth
        </div>
      </div>
      <div id="mobile-menu" class="md:hidden hidden flex-col gap-3 pb-4 text-sm font-semibold text-slate-700 transition-all duration-200 origin-top scale-95 opacity-0">
        <div class="grid gap-2">
          <a class="px-4 py-3 rounded-xl border border-slate-200 bg-white" href="{{route('homepage')}}">Ana Sayfa</a>
          <a class="px-4 py-3 rounded-xl border border-slate-200 bg-white" href="{{route('blogs.index')}}">Tüm Bloglar</a>
          <a class="px-4 py-3 rounded-xl border border-slate-200 bg-white" href="{{route('dashboard.view')}}">Panelim</a>
          <a class="px-4 py-3 rounded-xl border border-slate-200 bg-white" href="{{route('profile')}}">Profil</a>


            @guest
            <a href="{{route('login')}}" class="px-4 py-3 rounded-xl border border-slate-200 bg-white">Giriş Yap</a>
            <a href="{{route('register')}}" class="px-4 py-3 rounded-xl bg-base text-white">Kayıt Ol</a>
            @endguest
                @auth
                    <form class="mt-4" method="post" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="cursor-pointer px-5 py-2.5 text-sm font-semibold text-red-600 bg-red-50 border border-red-100 rounded-xl hover:bg-red-600 hover:text-white transition-all duration-200 shadow-sm active:scale-95">
                            Çıkış Yap
                        </button>
                    </form>
                @endauth
        </div>
      </div>
    </div>
  </header>

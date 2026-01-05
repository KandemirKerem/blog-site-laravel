  <footer class="bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
        <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-2xl bg-slate-900 text-white grid place-items-center font-bold">N</span>
          <div>
            <p class="text-base font-semibold text-slate-900">NovaBlog</p>
            <p class="text-sm text-slate-500">Modern, hafif ve okunabilir blog teması.</p>
          </div>
        </div>
        <div class="flex gap-6 text-sm text-slate-600">
          <x-templates.navlink href="{{route('dashboard.view')}}" class="hover:text-base">Panel</x-templates.navlink>
          <x-templates.navlink href="{{route('login')}}" class="hover:text-base">Giriş</x-templates.navlink>
          <x-templates.navlink href="{{route('register')}}" class="hover:text-base">Kayıt</x-templates.navlink>
          <x-templates.navlink href="{{route('profile')}}" class="hover:text-base">Profil</x-templates.navlink>
        </div>
      </div>
      <div class="mt-6 text-xs text-slate-400">© 2025 NovaBlog. Tüm hakları saklıdır.</div>
    </div>
  </footer>

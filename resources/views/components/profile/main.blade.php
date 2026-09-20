  <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div>
        <p class="text-sm text-slate-600">Hesabım</p>
        <h1 class="text-3xl font-bold text-slate-900">Profilim</h1>
      </div>
      <a href="{{route('dashboard.view')}}" class="hover:shadow-lg transition-all duration-300 px-4 py-3 bg-soft text-base rounded-xl text-sm font-semibold hover:text-base">Bloglarıma Git</a>
    </div>

    <section class="grid md:grid-cols-3 gap-6">
      <div class="md:col-span-1">
        <div class="rounded-2xl border border-slate-100 bg-card p-6 shadow-sm space-y-4 text-center">

            <livewire:update-profile-photo/>

          <div style="margin-top: 35px;">
            <p class="text-lg font-semibold text-slate-900">{{auth()->user()->name}}</p>
            <p class="text-sm text-slate-500">Blog Yazarı</p>
          </div>
        </div>
      </div>

      <div class="md:col-span-2 space-y-6">
          @unless(auth()->user()->hasVerifiedEmail())
              <div class="rounded-2xl border border-amber-100 bg-amber-50 p-6 shadow-sm flex items-start gap-4 mb-6">
                  <div class="p-3 bg-amber-100 rounded-xl text-amber-600">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                      </svg>
                  </div>
                  <div class="flex-1 space-y-1">
                      <h3 class="text-amber-900 font-semibold">Hesabın Henüz Onaylanmadı!</h3>
                      <p class="text-amber-700 text-sm leading-relaxed">
                          {{auth()->user()->name}}, blogdaki tüm özellikleri kullanabilmek için e-posta adresini doğrulaman gerekiyor. Aşağıdaki linke tıklayarak doğrulama mailini alabilirsiniz.
                      </p>
                      <div class="pt-2">
                          <a href="{{ route('verification.notice') }}" class="text-sm font-bold text-amber-900 hover:underline flex items-center gap-1">
                              Doğrulama Sayfasına Git
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                              </svg>
                          </a>
                      </div>
                  </div>
              </div>
          @endunless
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm space-y-4">
            <form method="post" action="{{route('profile.update')}}">
                @csrf
                @method('PATCH')
          <h2 class="text-lg font-semibold text-slate-900">Profil Bilgileri</h2>
          <div class="grid sm:grid-cols-2 gap-4">
            <div class="space-y-2">
              <label class="text-sm font-semibold text-slate-700">Kullanıcı Adı</label>
              <input name="name" type="text" value="{{auth()->user()->name}}" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>

            <div class="space-y-2 mb-4">
              <label class="text-sm font-semibold text-slate-700">Email</label>
              <input title="Email adresi değiştirilemez" readonly type="email" value="{{auth()->user()->email}}" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            {{-- İlerde Ekle biyografi ve email(opsiyonel)
          <div class="space-y-2 sm:col-span-2">
            <label class="text-sm font-semibold text-slate-700">Bio</label>
            <textarea rows="3" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">Minimalist arayüzlere ve tipografiye meraklı bir UX tasarımcısıyım.</textarea>
          </div>
          --}}
          </div>

          <div class="flex items-center justify-end gap-3">
            <button class="px-4 py-3 bg-soft text-base rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg transition-all duration-300">İptal</button>
            <button type="submit" class="px-4 py-3 bg-base text-white rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-700 transition-all duration-300">Kaydet</button>
          </div>
                @if (session('success_1'))
                    <div class="mt-4 mb-4 rounded-xl border border-emerald-100 bg-emerald-50 p-4 text-emerald-700 shadow-sm ">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-semibold">{{ session('success_1') }}</span>
                        </div>
                    </div>
                @endif
            </form>
        </div>

        <form id="update-password" method="post" action="{{route('password.update')}}">
        @csrf
        @method('PUT')
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm space-y-4">
          <h2 class="text-lg font-semibold text-slate-900">Parola Güncelle</h2>
          <div class="grid sm:grid-cols-2 gap-4">
            <div class="space-y-2">
              <label class="text-sm font-semibold text-slate-700">Mevcut Parola</label>
              <input name="current_password" type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            <div class="space-y-2">
              <label class="text-sm font-semibold text-slate-700">Yeni Parola</label>
              <input name="password" type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            <div class="space-y-2 sm:col-span-2">
              <label class="text-sm font-semibold text-slate-700">Yeni Parola Tekrar</label>
              <input name="password_confirmation" type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
          </div>
          <div class="flex items-center justify-end gap-3">
            <button class="px-4 py-3 bg-soft text-base rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg transition-all duration-300">Vazgeç</button>
            <button type="submit" class="px-4 py-3 bg-base text-white rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-700 transition-all duration-300">Parolayı Güncelle</button>
          </div>
            @if (session('success'))
                <div class="mb-4 rounded-xl border border-emerald-100 bg-emerald-50 p-4 text-emerald-700 shadow-sm">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold">{{ session('success') }}</span>
                    </div>
                </div>
            @endif
        </div>
        </form>
      </div>




    </section>
  </main>

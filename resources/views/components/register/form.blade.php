<div class="flex items-center justify-center p-8">

    <div class="w-full max-w-md space-y-8">
        <div class="flex items-center gap-3">
            <span class="w-10 h-10 rounded-2xl bg-slate-900 text-white grid place-items-center font-bold">N</span>
            <div>
                <p class="font-semibold text-slate-900">NovaBlog</p>
                <p class="text-sm text-slate-500">Yeni hesabını oluştur.</p>
            </div>
        </div>
        <form method="post" action="{{route('register.store')}}" class="space-y-4 bg-card border border-slate-100 rounded-2xl p-6 shadow-sm">
            @csrf
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Kullanıcı Adı</label>
                <input required name="name" type="text" placeholder="Adınız Soyadınız" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            @error('name')
            {{$message}}
            @enderror

            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Email</label>
                <input required name="email" type="email" placeholder="ornek@mail.com" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            @error('email')
            {{$message}}
            @enderror

            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Şifre</label>
                <input required name="password" type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            @error('password')
            {{$message}}
            @enderror

            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700">Şifre Tekrar</label>
                <input required name="password_confirmation" type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>
            @error('password_confirmation')
            {{$message}}
            @enderror

            <button type="submit" class="w-full py-3 bg-base text-white rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-700 transition-all duration-300">Hesap oluştur</button>
            <p class="text-sm text-center text-slate-600">Zaten hesabın var mı? <a href="{{route('login')}}" class="text-base font-semibold">Giriş yap</a></p>
        @if($errors->any())
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif
        </form>
    </div>
</div>

</main>

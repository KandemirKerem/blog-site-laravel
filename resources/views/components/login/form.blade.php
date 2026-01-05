<div class="flex items-center justify-center p-8">
    <div class="w-full max-w-md space-y-8">
        <div class="flex items-center gap-3">
            <span class="w-10 h-10 rounded-2xl bg-slate-900 text-white grid place-items-center font-bold">N</span>
            <div>
                <p class="text-base font-semibold">NovaBlog</p>
                <p class="text-sm text-slate-500">Giriş yap ve yazılarını yönet.</p>
            </div>
        </div>
        <form method="post" action="{{route('login.store')}}" class="space-y-4 bg-card border border-slate-100 rounded-2xl p-6 shadow-sm">
            @csrf
            <div class="space-y-2">
                <label for="email" class="text-sm font-semibold text-slate-700">Email</label>
                <input value="{{old('email')}}" id="email" name="email" type="email" placeholder="ornek@mail.com" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>

            <div class="space-y-2">
                <label for="password" class="text-sm font-semibold text-slate-700">Şifre</label>
                <input id="password" name="password" type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            </div>

            <button type="submit" class="w-full py-3 bg-base text-white rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-700 transition-all duration-300">Giriş yap</button>
            <p class="text-sm text-center text-slate-600">Hesabın yok mu? <a href="{{route('register')}}" class="text-base font-semibold">Kayıt ol</a></p>
            @error('email')
            <p class="text-center text-sm font-medium text-red-600 bg-red-50 py-2 px-4 rounded-xl mt-2 border border-red-100">
                {{ $message }}
            </p>
            @enderror
        </form>
    </div>
</div>
</main>

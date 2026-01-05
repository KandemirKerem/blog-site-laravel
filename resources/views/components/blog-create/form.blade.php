<form action="{{route('blogs.store')}}" method="post" class="space-y-6" onsubmit="disableButton()">
    @csrf

    <div class="space-y-2">
        <label class="text-sm font-semibold text-slate-700">Başlık</label>
        <input
            autocomplete="off"
            value="{{ old('title') }}"
            name="title"
            type="text"
            placeholder="Minimalist tasarım ile okunabilir blog deneyimi"
            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
        @error('title')
        <p class="text-red-600 text-sm italic mt-1 font-medium">{{$message}}</p>
        @enderror
    </div>

    <livewire:dragphoto/>

    @error('image_path')
    <p class="text-red-600 text-sm italic mt-1 font-medium">The image field is required.</p>
    @enderror

    <div class="space-y-2">
        <div class="flex justify-between items-center">
            <label class="text-sm font-semibold text-slate-700">Kısa Özet (Excerpt)</label>
        </div>
        <textarea
            name="excerpt"
            rows="3"
            placeholder="Yazının giriş kısmından dikkat çekici bir cümle ekleyin..."
            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none resize-none"
        >{{ old('excerpt') }}</textarea>
        <p class="text-xs text-slate-500">Arama sonuçlarında ve ana sayfada bu metin görünecektir.</p>
        @error('excerpt')
        <p class="text-red-600 text-sm italic mt-1 font-medium">{{$message}}</p>
        @enderror
    </div>


    <div class="space-y-2">
        <label class="text-sm font-semibold text-slate-700">Kategori</label>
        <select name="category_id" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-red-600 text-sm italic mt-1 font-medium">{{$message}}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label class="text-sm font-semibold text-slate-700">Etiketler</label>
        <input
            name="tags"
            type="text"
            placeholder="tasarım, tipografi, ux"
            autocomplete="off"
            value="{{ old('tags') }}"
            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
        <p class="text-xs text-slate-500">Virgülle ayırabilirsiniz.</p>
    </div>

    <div class="space-y-2">
        <label class="text-sm font-semibold text-slate-700">İçerik</label>
        <textarea
            name="context"
            rows="10"
            placeholder="Blog içeriğinizi yazın..."
            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none"
        >{{ old('context') }}</textarea>
        @error('context')
        <p class="text-red-600 text-sm italic mt-1 font-medium">{{$message}}</p>
        @enderror
    </div>

    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard.view') }}" class="text-sm font-semibold text-slate-600">Geri dön</a>
        <div class="flex gap-3">
            <a href="{{ route('dashboard.view') }}" class="px-4 py-3 bg-soft text-base rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg transition-all duration-300">İptal</a>
           {{-- İlerde Ekle Taslak olarak kaydetme olayı
            <button type="button" class="px-4 py-3 bg-soft text-base rounded-xl text-sm font-semibold ">Taslak Kaydet</button>
           --}}
            <button id="submitBtn" type="submit" class="px-4 py-3 bg-base text-white rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-700 transition-all duration-300">Yayınla</button>
        </div>
    </div>
    <script>
        function disableButton() {
            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerText = 'Yükleniyor...';
            btn.classList.add('opacity-50', 'cursor-not-allowed');
        }
    </script>
</form>
</main>

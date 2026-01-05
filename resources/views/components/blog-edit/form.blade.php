<form action="{{route('blogs.update',$post->slug)}}" method="post" class="space-y-6">
    @csrf
    @method('PATCH')
    <div class="space-y-2">
        <label class="text-sm font-semibold text-slate-700">Başlık</label>
        <input
            name="title"
            type="text"
            placeholder="Minimalist tasarım ile okunabilir blog deneyimi"
            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none"
            value="{{old('title',$post->title)}}"
            required
        >
        @error('title')
        <p class="text-red-600 text-sm italic mt-1 font-medium">{{$message}}</p>
        @enderror
    </div>

    <livewire:dragphoto :storedPath="$post->image"/>

    @error('image')
    <p class="text-red-600 text-sm italic mt-1 font-medium">{{$message}}</p>
    @enderror

    <div class="space-y-2">
        <div class="flex justify-between items-center">
            <label class="text-sm font-semibold text-slate-700">Kısa Özet (Excerpt)</label>
        </div>
        <textarea
            required
            name="excerpt"
            rows="3"
            placeholder="Yazının giriş kısmından dikkat çekici bir cümle ekleyin..."
            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none resize-none"
        >{{old('excerpt',$post->excerpt)}}</textarea>
        <p class="text-xs text-slate-500">Arama sonuçlarında ve ana sayfada bu metin görünecektir.</p>
        @error('excerpt')
        <p class="text-red-600 text-sm italic mt-1 font-medium">{{$message}}</p>
        @enderror
    </div>


    <div class="space-y-2">
        <label class="text-sm font-semibold text-slate-700">Kategori</label>
        <select name="category_id" class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
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
            value="@foreach($post->tags as $tag){{old('tags',$tag->name) . "," }}@endforeach"
            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none">
        <p class="text-xs text-slate-500">Virgülle ayırabilirsiniz.</p>
    </div>

    <div class="space-y-2">
        <label class="text-sm font-semibold text-slate-700">İçerik</label>
        <textarea
            required
            name="context"
            rows="10"
            placeholder="Blog içeriğinizi yazın..."
            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none"
        >{{old('context',$post->context)}}</textarea>
        @error('context')
        <p class="text-red-600 text-sm italic mt-1 font-medium">{{$message}}</p>
        @enderror
    </div>

    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard.view') }}" class="text-sm font-semibold text-slate-600">Geri dön</a>
        <div class="flex gap-3">
            <button
                form="delete-form"
                type="submit"
                class="px-4 py-3 bg-red-600 text-white rounded-xl text-sm font-semibold hover:bg-red-700 transition-colors duration-200 shadow-sm active:scale-95"
            >Sil</button>
            <a href="{{ route('dashboard.view') }}" class="px-4 py-3 bg-soft text-base rounded-xl text-sm font-semibold ">İptal</a>
            <button type="submit" class="px-4 py-3 bg-base text-white rounded-xl text-sm font-semibold hover:bg-slate-900">Güncelle</button>
        </div>
    </div>

</form>

<form id="delete-form" action="{{route('blogs.delete',$post->slug)}}" method="post" class="hidden"
      onsubmit="return confirm('Bu yazıyı silmek istediğinize emin misiniz? Bu işlem geri alınamaz!')">
    @csrf
    @method('DELETE')

</form>
</main>

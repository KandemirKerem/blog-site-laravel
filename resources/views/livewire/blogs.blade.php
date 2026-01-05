<div class="space-y-8">
    {{-- 1. Arama Grubu --}}
    <form wire:submit.prevent="$refresh" class="flex items-stretch gap-3">
        <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-3 shadow-sm focus-within:ring-1 focus-within:ring-base/20 w-full">
            <input wire:model.defer="search" type="text" placeholder="Aradığınız kelime..." class="w-full bg-transparent focus:outline-none text-sm text-slate-700" />
        </div>
        <button type="submit" class="cursor-pointer px-4 py-3 rounded-2xl bg-slate-900 text-white text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-700 transition-all duration-300">Ara</button>
    </form>

    {{-- 2. Filtreler ve Sıralama --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="flex flex-wrap gap-2">
            <button wire:click="selectCategory('')" class="cursor-pointer hover:shadow-lg hover:bg-slate-900 transition-all duration-300 hover:text-white px-4 py-2 rounded-xl text-sm font-semibold {{ $category == '' ? 'bg-slate-900 text-white' : 'bg-white border text-slate-700' }}">Tümü</button>
            @foreach($categories as $cat)
                <button wire:click="selectCategory('{{ $cat->slug }}')"
                        class="cursor-pointer hover:shadow-lg hover:bg-slate-900 transition-all duration-300 hover:text-white  px-4 py-2 rounded-xl text-sm font-semibold {{ $category == $cat->slug ? 'bg-slate-900 text-white' : 'bg-white border text-slate-700' }}">
                    {{ $cat->name }}
                </button>
            @endforeach
        </div>

        <div class="flex items-center gap-2">
            <span class="text-sm text-slate-500 font-semibold">Sırala</span>
            <select wire:model.live="sort" class="cursor-pointer bg-white border rounded-xl px-3 py-2 text-sm focus:outline-none">
                <option value="newest">En son yayınlanan</option>
                <option value="oldest">En eski</option>
                <option value="popular">En popüler</option>
            </select>
        </div>
    </div>

    {{-- 3. Post Listesi (Loading Efektiyle) --}}
    <div class="relative">
        <div wire:loading.class="opacity-40 blur-[1px]" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 transition-all duration-200">

            @foreach($posts as $post)

                <article wire:key="post-{{ $post->id }}" class="blog-card group rounded-2xl bg-card border border-slate-100 shadow-sm hover:shadow-card transition-all duration-200 overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img alt="kapak" src="{{asset('storage/' . $post->image )}}" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="p-5 space-y-3">
                        <div class="flex items-center text-xs text-slate-500">
                            <span class="px-3 py-1 bg-soft text-accent rounded-full font-semibold">{{ $post->category->name }}</span>
                            <span class="ml-2"> {{ $post->views }} görüntüleme </span>
                            <span class="ml-auto"> {{ $post->created_at->diffForHumans() }} </span>
                        </div>
                        <a href="{{route('blogs.show',$post->slug)}}" class="text-lg font-semibold text-slate-900 group-hover:underline line-clamp-2">{{ $post->title }}</a>
                        <p class="text-sm text-slate-600 line-clamp-3"> {{ $post->excerpt }} </p>
                        <div class="flex items-center justify-between text-sm text-slate-600">
                            <span> {{ $post->user->name }} </span>
                            <a class="text-base font-semibold group-hover:underline" href="{{"blogs/" . $post->slug}}">Devamını Oku</a>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-3 h-7 overflow-hidden">
                            @foreach($post->tags as $tag)
                                <span class="flex items-center justify-center px-2 py-1 bg-slate-200 text-slate-700 text-xs rounded">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="col-span-full py-10">
            @if($posts->hasMorePages())

                <div
                    x-intersect="$wire.loadMore()"
                    class="col-span-full h-10 flex justify-center items-center"
                >
                    <div wire:loading class="text-slate-500">Yükleniyor...</div>
                </div>


            @else
                <p class="text-center text-slate-400 text-sm">Tüm içerikler yüklendi.</p>
            @endif
        </div>


    </div>
</div>

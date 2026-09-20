  <!-- Blog Kartları -->
  <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6" id="blog-grid">

        @foreach($recent as $post)
            <article class="blog-card group rounded-2xl bg-card border border-slate-100 shadow-sm hover:shadow-card transition-all duration-200 overflow-hidden">
                <div class="relative h-48 overflow-hidden">
                    <img alt="photo of blog" src="{{asset('storage/' . $post->image )}}" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
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
  </section>

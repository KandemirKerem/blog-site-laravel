  <!-- Popüler Bloglar -->
  <section class="bg-card border-t border-b border-slate-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-6">
      <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-slate-900">Popüler Bloglar</h2>
        <a href="{{route('blogs.index')}}" class="text-base font-semibold">Tümünü Gör →</a>
      </div>
      <div class="grid md:grid-cols-3 gap-6">
        @foreach($popular as $post)
        <article class="group rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-card transition-all duration-200 overflow-hidden">
          <div class="relative h-48 overflow-hidden">
            <img src=" {{ $post->image ? asset('storage/' . $post->image) : asset('storage/blog-images/default.avif') }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" alt="Blog cover">
          </div>
          <div class="p-5 space-y-3">
            <div class="flex items-center justify-between text-xs text-slate-500">
              <span class="px-3 py-1 bg-soft text-accent rounded-full font-semibold">{{$post->category->name}}</span>
              <span>{{$post->views}} görüntüleme</span>
            </div>
            <a href="{{route('blogs.show',$post->slug)}}" class="text-lg font-semibold text-slate-900 group-hover:underline">{{$post->title}}</a>
            <p class="mt-2 text-sm text-slate-600">{{$post->excerpt}}</p>
            <div class="flex items-center justify-between text-sm text-slate-600">
              <span>{{$post->user->name}}</span>
              <a class="text-base font-semibold group-hover:underline" href="{{route('blogs.show',$post->slug)}}">Oku</a>
            </div>
          </div>
        </article>
         @endforeach
      </div>
    </div>
  </section>

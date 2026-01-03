  <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">


    <div class="rounded-3xl overflow-hidden border border-slate-100 shadow-card">
      <img class="w-full h-96 object-cover" src="{{asset('storage') . "/" . $post->image }}" alt="Kapak">
    </div>

    <div class="space-y-4">
      <div class="flex items-center gap-3 text-sm text-slate-600">
        <span class="px-3 py-1 bg-soft text-accent rounded-full font-semibold">{{$post->category->name}}</span>
          <div class="w-8 h-8 rounded-full overflow-hidden bg-slate-100 shrink-0">
              <img
                  src="{{ $post->user->profile_photo ? asset('storage/' . $post->user->profile_photo) : asset('storage/profile-photos/default_pp.jpg') }}"
                  alt="PP"
                  class="w-full h-full object-cover"
              >
          </div>
        <span>{{$post->user->name}}</span>
        <span>•</span>
        <span>{{$post->created_at->diffForHumans()}}</span>
        <div class="ml-auto ">
        <span class="text-xs px-3 py-1 bg-slate-100 text-slate-600 rounded-full">Görüntüleme : {{$post->views}} </span>
        <span class="ml-2 text-xs px-3 py-1 bg-slate-100 text-slate-600 rounded-full">Güncellendi : {{$post->updated_at->diffForHumans()}} </span>
        </div>
      </div>
      <h1 class="text-4xl font-bold text-slate-900 leading-tight wrap-break-word">{{$post->title}}</h1>
    </div>

      {{-- İçerik (context) --}}
      <article class="prose lg:prose-lg max-w-none text-slate-700 wrap-break-word overflow-hidden">
          <p>
              {{$post->context}}
          </p>
      </article>

      {{-- Etiketler --}}
    <div class="flex flex-wrap gap-2">
        @foreach($post->tags as $tag)
      <span class="px-3 py-1 text-xs font-semibold rounded-full bg-soft text-accent">{{$tag->name}}</span>
        @endforeach
    </div>


      <livewire:post-comments :post="$post" />


  </main>

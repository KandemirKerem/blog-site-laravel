<div>
    {{-- Yorum Formu --}}
    @auth
        <section class="space-y-4 mb-10">
            <h3 class="text-xl font-semibold text-slate-900">Yorum Gönder</h3>
            <form wire:submit.prevent="sendComment" class="space-y-4">
                <div class="space-y-2">
                <textarea wire:model="context" rows="2" placeholder="Görüşlerinizi yazın..."
                          class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-base focus:outline-none"></textarea>
                    @error('context') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <button type="submit" wire:loading.attr="disabled" class="px-5 py-3 bg-base text-white rounded-xl text-sm font-semibold hover:bg-slate-900">
                    <span wire:loading.remove>Gönder</span>
                    <span wire:loading>Gönderiliyor...</span>
                </button>
            </form>
        </section>
    @else
        <p class="text-sm text-slate-500 mb-10 italic">Yorum yapabilmek için giriş yapmalısın.</p>
    @endauth

    {{-- Yorum Listesi --}}
    <section class="space-y-4">
        <h3 class="text-xl font-semibold text-slate-900">Yorumlar ({{ $post->comments()->count() }})</h3>

        <div class="space-y-3">
            @foreach($comments as $comment)
                <div class="p-4 rounded-2xl border border-slate-100 bg-card group relative">
                    <div class="flex items-center justify-between text-sm text-slate-600">
                        <div class="flex items-center gap-3">
                            {{-- Kullanıcı Fotoğrafı --}}
                            <img src="{{ $comment->user->profile_photo ?  asset('storage/' . $comment->user->profile_photo ) : asset('storage/profile-photos/default_pp.jpg') }}" class="w-10 h-10 rounded-full object-cover">
                            <div>
                                <p class="font-semibold text-slate-900">{{ $comment->user->name }}</p>
                                <p class="text-xs text-slate-500">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        {{-- Silme Butonu Alanı --}}
                        @if(auth()->id() === $comment->user_id /* Admin olayı gelince ekle || auth()->user()->is_admin*/)
                            <button
                                wire:click="deleteComment({{ $comment->id }})"
                                wire:confirm="Bu yorumu silmek istediğine emin misin knk?"
                                {{--
                                    opacity-100: Mobilde hep görünür
                                    lg:opacity-0: Masaüstünde (geniş ekran) gizli başla
                                    lg:group-hover:opacity-100: Masaüstünde üzerine gelince göster
                                --}}
                                class="opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity p-2 text-slate-400 hover:text-red-600"
                                title="Yorumu Sil">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        @endif
                    </div>
                    <p class="mt-3 text-sm text-slate-700">{{ $comment->context }}</p>
                </div>
            @endforeach
        </div>

        {{-- Daha Fazla Göster Butonu --}}
        @if($post->comments()->count() > $perPage)
            <div class="flex justify-center pt-4">
                <button
                    wire:click="loadMore"
                    wire:loading.attr="disabled"
                    class="px-6 py-2 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition">
                    <span wire:loading.remove wire:target="loadMore">Daha Fazla Yorum Gör</span>
                    <span wire:loading wire:target="loadMore">Yükleniyor...</span>
                </button>
            </div>
        @endif
    </section>
</div>

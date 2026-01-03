<div class="space-y-2">
    <label class="text-sm font-semibold text-slate-700">Kapak Fotoğrafı</label>
    <input type="hidden" name="image_path" value="{{ old('image_path', $storedPath) }}">

    <div
        x-data="{ isDragging: false }"
        x-on:dragover.prevent="isDragging = true"
        x-on:dragleave.prevent="isDragging = false"
        x-on:drop.prevent="isDragging = false; const file = $event.dataTransfer.files[0]; if (file && file.type.startsWith('image/')) { @this.upload('photo', file) }"
        class="relative border-2 border-dashed rounded-xl p-6 flex flex-col items-center gap-3 transition-all duration-200
               {{ $errors->has('photo') ? 'border-red-400 bg-red-50' : ($storedPath ? 'border-emerald-400 bg-emerald-50/30' : 'border-slate-300 bg-card') }}"
        :class="isDragging ? 'border-blue-500 bg-blue-50 scale-[1.01]' : ''"
    >
        <div wire:loading wire:target="photo" class="absolute inset-0 bg-white/80 rounded-xl flex items-center justify-center z-10">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
        </div>

        <div class="w-20 h-20 rounded-full bg-slate-100 border-2 border-white shadow-sm overflow-hidden flex items-center justify-center">
            @if($photo)
                <img src="{{ $photo->temporaryUrl() }}" class="w-full h-full object-cover">
            @elseif($storedPath)
                <img src="{{ asset('storage/' . $storedPath) }}" class="w-full h-full object-cover">
            @else
                <span class="text-2xl text-slate-400">+</span>
            @endif
        </div>

        <div class="text-center">
            <p class="text-sm font-semibold text-slate-700">
                {{ $storedPath ? 'Resim Hazır' : 'Kapak fotoğrafı yükleyin' }}
            </p>
            @error('photo') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-2">
            <button type="button" onclick="document.getElementById('photoInput').click()" class="px-4 py-2 text-sm font-semibold bg-white border border-slate-200 rounded-xl hover:bg-slate-50">
                {{ $storedPath ? 'Değiştir' : 'Dosya Seç' }}
            </button>

            @if($storedPath)
                <button type="button" wire:click="resetPhoto" class="px-4 py-2 text-sm font-semibold text-red-600 bg-red-50 border border-red-100 rounded-xl">Temizle</button>
            @endif
        </div>

        <input type="file" id="photoInput" wire:model="photo" class="hidden" accept="image/*">
    </div>
</div>

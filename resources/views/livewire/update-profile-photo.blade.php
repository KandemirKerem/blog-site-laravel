<div class="relative w-28 h-28 mx-auto">
    <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('storage/profile-photos/default_pp.jpg') }}"
         class="w-28 h-28 rounded-3xl object-cover" alt="Profil">

    <label class="hover:shadow-lg transition-all duration-300 absolute -bottom-5 right--2 px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold shadow-sm cursor-pointer">
        Değiştir
        <input type="file" wire:model="photo" class="hidden">
    </label>
</div>

<script>
    document.addEventListener('livewire:init', () => {

        const mobileToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        if (!mobileToggle || !mobileMenu) return;

        const toggleMobileMenu = () => {
            const willOpen = mobileMenu.classList.contains('hidden');

            if (willOpen) {
                mobileMenu.classList.remove('hidden', 'opacity-0', 'scale-95');
                requestAnimationFrame(() => {
                    mobileMenu.classList.add('opacity-100', 'scale-100');
                });
            } else {
                mobileMenu.classList.remove('opacity-100', 'scale-100');
                mobileMenu.classList.add('opacity-0', 'scale-95');
                setTimeout(() => mobileMenu.classList.add('hidden'), 180);
            }
        };

        mobileToggle.addEventListener('click', toggleMobileMenu);
    });
</script>

<script src="{{ asset('vendor/livewire/livewire.js') }}"
        data-csrf="{{ csrf_token() }}"
        data-update-uri="/blogsitesi/public/livewire/update">
</script>

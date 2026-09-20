
<!-- Head Section -->
<x-templates.head>

    <x-slot:title>
        {{ $title ?? 'Hoşgeldiniz' }}
    </x-slot:title>

    <x-slot:config>
        {{ $config ?? '' }}
    </x-slot:config>

</x-templates.head>

<!-- Navbar -->
<x-templates.navbar/>

<!-- Main Content -->
{{ $slot }}


@props([
    'hidefooter' => false,
])

<!-- Footer -->
@if ( !($hidefooter ?? false) )
    <x-templates.footer/>
@endif

<!-- Scripts Section -->
<x-templates.scripts/>

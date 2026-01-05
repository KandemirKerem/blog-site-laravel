
<!-- Head Section -->
<x-templates.head>

    <x-slot:title>
        {{ $title ?? 'Hoşgeldiniz' }}
    </x-slot:title>

    <x-slot:config>
        {{ $config ?? '' }}
    </x-slot:config>

    <x-slot:desc>
        {{$desc  ?? "NovaBlog ile yeni yazıları keşfet."}}
    </x-slot:desc>

</x-templates.head>

<!-- Navbar -->
<x-templates.navbar/>

{{-- Page Content --}}
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

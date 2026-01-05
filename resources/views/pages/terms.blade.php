<x-layout>

    {{--Page Title--}}
    <x-slot:title>
        Gizlilik Politikası
    </x-slot:title>

    {{--Meta description--}}
    <x-slot:desc>
        NovaBlog topluluk kuralları ve gizlilik politikası hakkında detaylı bilgi.
    </x-slot:desc>

    {{--Bu sayfa için google indexlememesi için özel meta etiketi--}}
    @push('meta')
        <meta name="robots" content="noindex, follow">
    @endpush

    {{--Compoments--}}
    <x-terms.main/>

</x-layout>

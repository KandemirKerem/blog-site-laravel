<x-layout>

    {{--Page Title--}}
    <x-slot:title>
        Blog Detayı
    </x-slot:title>

    {{--Meta description--}}
    <x-slot:desc>
        {{ Str::limit(strip_tags($post->excerpt), 155) }}
    </x-slot:desc>


    {{--Compoments--}}
    <x-blog-detail.main :post="$post"/>

</x-layout>

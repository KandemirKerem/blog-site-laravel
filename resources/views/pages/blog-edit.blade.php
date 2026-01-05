<x-layout>

    {{--Page Title--}}
    <x-slot:title>
        Blog Düzenle
    </x-slot:title>

    {{--Meta description--}}
    <x-slot:desc>
        NovaBlog üzerindeki içeriğini güncelle, hatalarını düzelt veya yeni bilgiler ekle. Yazını her zaman güncel tutarak okuyucularınla olan etkileşimini artır.
    </x-slot:desc>

    {{--Compoments--}}
    <x-blog-edit.title/>
    <x-blog-edit.form :post="$post" :categories="$categories" />
</x-layout>

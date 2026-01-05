<x-layout>

    {{--Page Title--}}
    <x-slot:title>
        Blog Oluştur
    </x-slot:title>

    {{--Meta description--}}
    <x-slot:desc>
        Anlatacak bir hikayen mi var? NovaBlog'da hemen yeni bir yazı oluştur, düşüncelerini özgürce paylaş ve binlerce okuyucuya ulaşmaya başla.
    </x-slot:desc>


    {{--Compoments--}}
    <x-blog-create.title/>
    <x-blog-create.form :categories="$categories"/>

</x-layout>

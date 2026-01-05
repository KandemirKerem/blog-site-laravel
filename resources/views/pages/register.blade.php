<x-layout :hidefooter="true">

    {{--Page Title--}}
    <x-slot:title>
        Kayıt Ol
    </x-slot:title>

    {{--Meta description--}}
    <x-slot:desc>
        NovaBlog dünyasına katılmak için ücretsiz hesap oluştur. Kendi yazılarını paylaş, diğer geliştiricilerle etkileşime gir ve favori içeriklerini takip et.
    </x-slot:desc>


    {{--Compoments--}}
    <x-register.hero/>
    <x-register.form/>

</x-layout>

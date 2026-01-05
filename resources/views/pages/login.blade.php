<x-layout :hidefooter="true">

    {{--Page Title--}}
    <x-slot:title>
        Giriş Yap
    </x-slot:title>

    {{--Meta description--}}
    <x-slot:desc>
    NovaBlog hesabına giriş yap ve kaldığın yerden devam et. İçeriklerini yönet, toplulukla bağlantıda kal ve yazılım dünyasını keşfet.
    </x-slot:desc>


    {{--Compoments--}}
    <x-login.hero/>
    <x-login.form/>

</x-layout>

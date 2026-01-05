<x-layout>

    {{--Page Title--}}
    <x-slot:title>
        Anasayfa
    </x-slot:title>

    {{--Meta description--}}
    <x-slot:desc>
        NovaBlog'da sınır yok! Hayata dair her şeyi paylaşın, ilginç hikayeler okuyun ve özgürce içerik üreten topluluğumuza katılın. Sizin sesiniz, sizin blogunuz.
    </x-slot:desc>


    {{--Compoments--}}
    <x-homepage.hero :mostPopular="$mostPopular"/>
    <x-homepage.filter-search/>
    <x-homepage.recentblogs :recent="$recent"/>
    <x-homepage.populerblogs :popular="$popular"/>


</x-layout>


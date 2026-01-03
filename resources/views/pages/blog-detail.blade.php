<x-layout>

    <!-- Page Title -->
    <x-slot:title>
        Blog Detayı
    </x-slot:title>



    <!--components-->
    <x-blog-detail.main :post="$post"/>

</x-layout>

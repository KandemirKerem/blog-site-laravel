<x-layout>

    <!-- Page Title -->
    <x-slot:title>
        Blog Düzenle
    </x-slot:title>


    <!--components-->
    <x-blog-edit.title/>
    <x-blog-edit.form :post="$post" />
</x-layout>

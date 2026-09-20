<x-layout>

    <!-- Page Title -->
    <x-slot:title>
        Tüm Bloglar
    </x-slot:title>



    <!--components-->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        <x-blogs.title/>
        {{ $slot }}
    </main>

</x-layout>




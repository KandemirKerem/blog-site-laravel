<x-layout>

    {{--Page Title--}}
    <x-slot:title>
        Tüm Bloglar
    </x-slot:title>

    {{--Meta description--}}
    <x-slot:desc>
        NovaBlog dünyasını keşfedin! Her konuda yazılmış yüzlerce özgün blog yazısı, ilginç hikayeler ve farklı bakış açıları burada. Siz de ilginizi çeken konuları bulun veya kendi yazınızı paylaşarak topluluğa katılın.
    </x-slot:desc>

    {{--Compoments--}}
    <x-blogs.title/>
    <livewire:blogs/>
    </main>
    {{--Livewire elementi tek kök içinde olmak zorunda olduğu için böyle aptal bir çözüm yaptım ilerde düzelt--}}

</x-layout>




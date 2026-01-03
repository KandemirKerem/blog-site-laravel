<x-layout>

    <!-- Page Title -->
    <x-slot:title>
        Ana Sayfa
    </x-slot:title>


    <!--Components-->
    <x-homepage.hero/>
    <x-homepage.filter-search/>
    <x-homepage.recentblogs :recent="$recent"/>
    <x-homepage.populerblogs :popular="$popular"/>


</x-layout>


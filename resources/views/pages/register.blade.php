<x-layout :hidefooter="true">

    <!-- Page Title -->
    <x-slot:title>
        Kayıt Ol
    </x-slot:title>

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    <!--components-->
    <x-register.hero/>
    <x-register.form/>

</x-layout>

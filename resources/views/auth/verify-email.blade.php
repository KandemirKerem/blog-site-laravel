<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novablog | E-postanı Onayla </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F8FAFC] min-h-screen flex items-center justify-center p-4">

<div class="max-w-md w-full">
    {{-- Logo Alanı (Varsa)
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-slate-900">Novablog</h1>
    </div>
    --}}
    <div class="bg-white rounded-[2rem] border border-slate-100 p-8 shadow-sm space-y-6 text-center">
        {{-- İkon --}}
        <div class="relative w-20 h-20 mx-auto bg-slate-50 rounded-3xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <div class="absolute -top-2 -right-2 w-6 h-6 bg-amber-400 rounded-full border-4 border-white"></div>
        </div>

        <div class="space-y-2">
            <h2 class="text-xl font-bold text-slate-900">E-postanı Onayla Knk!</h2>
            <p class="text-sm text-slate-500 leading-relaxed px-2">
                Kayıt olduğun için sağ ol! Blogdaki tüm özellikleri açmak için sana gönderdiğimiz linke tıklaman gerekiyor.
            </p>
        </div>

        {{-- Durum Mesajı --}}
        @if (session('status') == 'verification-link-sent')
            <div class="bg-emerald-50 text-emerald-700 text-xs font-semibold py-3 px-4 rounded-xl border border-emerald-100">
                Yeni bir doğrulama linki e-posta adresine gönderildi!
            </div>
        @endif

        <div class="space-y-3 pt-2">
            {{-- Maili Tekrar Gönder --}}
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full bg-slate-900 hover:bg-black text-white font-semibold py-3.5 px-4 rounded-2xl transition duration-200 text-sm shadow-lg shadow-slate-200">
                    Doğrulama Mailini Tekrar Gönder
                </button>
            </form>

            {{-- Çıkış Yap --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-transparent text-slate-400 hover:text-slate-600 font-semibold py-2 px-4 rounded-xl transition duration-200 text-xs">
                    Şimdilik Çıkış Yap
                </button>
            </form>
        </div>
    </div>

    {{-- Alt Bilgi --}}
    <p class="text-center mt-8 text-xs text-slate-400">
        Yardıma mı ihtiyacın var? <a href="#" class="text-slate-600 font-semibold underline">Destek ekibine ulaş</a>
    </p>
</div>

</body>
</html>

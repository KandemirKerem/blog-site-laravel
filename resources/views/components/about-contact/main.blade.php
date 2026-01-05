<!-- Hero -->
<section class="relative overflow-hidden bg-linear-to-b from-soft/60 to-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-10 relative">
        <div class="text-center max-w-3xl mx-auto">
            <p class="text-sm font-semibold text-accent uppercase tracking-wide">Biz Kimiz</p>
            <h1 class="text-3xl sm:text-4xl font-bold text-slate-900 leading-tight mt-2">NovaBlog ile içerik üretimini basit ve güzel kılıyoruz</h1>
            <p class="text-lg text-slate-600 mt-3">Okuyuculara odaklı, sade ve performanslı bir blog deneyimi sağlamak için tasarlanmış bir platformuz. Amacımız kaliteli içerik üreticilerini desteklemek ve okuyuculara keyifli bir okuma ortamı sunmaktır.</p>
        </div>
    </div>
</section>

<!-- Main content: Hakkımızda + İletişim -->
<main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid lg:grid-cols-2 gap-8">
    <!-- Hakkımızda -->
    <section class="space-y-6">
        <div class="bg-white rounded-3xl shadow-card border border-slate-100 p-6">
            <h2 class="text-2xl font-semibold text-slate-900">Hakkımızda</h2>
            <p class="text-slate-600 mt-3">NovaBlog, yazarların fikirlerini dürüst ve temiz bir şekilde paylaşabildiği, okuyucuların ise dikkat dağıtıcı unsurlardan uzak kaliteli içeriklere ulaşabildiği bir mecradır. Mimarimiz mobil öncelikli ve içerik odaklıdır; erişilebilirlik ve performans ana önceliklerimizdir.</p>
            <div class="mt-6 grid sm:grid-cols-2 gap-4">
                <div class="space-y-3">
                    <h3 class="text-base font-semibold">Misyonumuz</h3>
                    <p class="text-sm text-slate-600">Güvenilir, uzun ömürlü içerik üretimini desteklemek; yazarların seslerini duyurmasına yardımcı olmak.</p>
                </div>
                <div class="space-y-3">
                    <h3 class="text-base font-semibold">Vizyonumuz</h3>
                    <p class="text-sm text-slate-600">Okuyucular için sade, zevkli ve hızlı bir okuma deneyimi sunan lider bir blog platformu olmak.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-card rounded-2xl p-4 border border-slate-100 shadow-sm">
                <img src="{{asset('assets/images/bilgisayar.avif')}}" alt="Kurucular" class="w-full h-28 object-cover rounded-xl">
                <h4 class="mt-3 font-semibold text-slate-900">Kurucular</h4>
                <p class="text-sm text-slate-600">Bu proje tamemen öğrenme amaçlı bir öğrenci tarafından geliştirilmiştir</p>
            </div>
            <div class="bg-card rounded-2xl p-4 border border-slate-100 shadow-sm">
                <img src="{{asset('assets/images/kafe.avif')}}" alt="Topluluk" class="w-full h-28 object-cover rounded-xl">
                <h4 class="mt-3 font-semibold text-slate-900">Topluluk</h4>
                <p class="text-sm text-slate-600">Bu proje tamemen açık kaynaklıdır ve herkes github üzerinden erişebilir.</p>
            </div>
            <div class="bg-card rounded-2xl p-4 border border-slate-100 shadow-sm">
                <img src="{{asset('assets/images/kahve.avif')}}" alt="Değerler" class="w-full h-28 object-cover rounded-xl">
                <h4 class="mt-3 font-semibold text-slate-900">Değerlerimiz</h4>
                <p class="text-sm text-slate-600">Açıklık, kalite, sürdürülebilirlik ve kullanıcı odaklılık bizim değerlerimiz arasında yer almaktadır.</p>
            </div>
        </div>
    </section>

    <!-- İletişim -->
    <aside class="space-y-6">
        <div class="bg-white rounded-3xl shadow-card border border-slate-100 p-6">
            <h2 class="text-2xl font-semibold text-slate-900">İletişim</h2>
            <p class="text-slate-600 mt-3">Bize her zaman ulaşabilirsiniz. Aşağıdaki formu doldurun ya da doğrudan e-posta ve sosyal kanallarımızdan iletişime geçin.</p>

            <div class="mt-6 space-y-4">
                <div class="flex items-center gap-3 text-sm text-slate-600">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M112 128C85.5 128 64 149.5 64 176C64 191.1 71.1 205.3 83.2 214.4L291.2 370.4C308.3 383.2 331.7 383.2 348.8 370.4L556.8 214.4C568.9 205.3 576 191.1 576 176C576 149.5 554.5 128 528 128L112 128zM64 260L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 260L377.6 408.8C343.5 434.4 296.5 434.4 262.4 408.8L64 260z"/></svg>
                    <div>
                        <div class="text-sm text-slate-600"><span class="font-semibold text-slate-900">E-posta : </span> kandemirhuseyinkerem@gmail.com</div>
                    </div>
                </div>
            </div>

            <form class="mt-6 grid gap-3" action="{{route('contactmail')}}" method="post" onsubmit="disableButton()">
                @csrf
                <div class="grid sm:grid-cols-2 gap-3">
                    <input required name="name" value="{{ old('name') }}" placeholder="İsim" class="px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-1 focus:ring-base/20" />
                    <input required type="email" value="{{ old('email') }}" name="email" placeholder="E-posta" class="px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-1 focus:ring-base/20" />
                </div>
                <textarea required name="message" rows="5"  placeholder="Mesajınız" class="px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-1 focus:ring-base/20">{{ old('message') }}</textarea>
                <div class="flex items-center gap-3">
                    <button id="submitBtn" type="submit" class="px-5 py-3 bg-base text-white rounded-xl text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-700 transition-all duration-300">Gönder</button>
                    <button type="reset" class="px-4 py-3 border border-slate-200 rounded-xl text-sm font-semibold text-slate-600 cursor-pointer hover:shadow-lg transition-all duration-300">Temizle</button>
                </div>
                {{-- Başarı Mesajı --}}
                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-xl bg-green-50 border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- Hata Mesajları (Validation) --}}
                @if($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-xl bg-red-50 border border-red-200">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>

        <div class="bg-card rounded-3xl border border-slate-100 p-4 shadow-sm">
            <h3 class="font-semibold text-slate-900">Sosyal</h3>
            <p class="text-sm text-slate-600 mt-2">Bizi takip edin ve güncellemelerden haberdar olun.</p>
            <div class="flex gap-3 mt-3">
                <a href="#" class="px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-900 transition-all duration-300 hover:text-white">
                    Twitter
                </a>
                <a href="#" class="px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-900 transition-all duration-300 hover:text-white">
                    LinkedIn
                </a>
                <a href="#" class="px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold cursor-pointer hover:shadow-lg hover:bg-slate-900 transition-all duration-300 hover:text-white">
                    Instagram
                </a>
            </div>
        </div>
    </aside>
</main>
<script>
    function disableButton() {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.innerText = 'Yükleniyor...';
        btn.classList.add('opacity-50', 'cursor-not-allowed');
    }
</script>


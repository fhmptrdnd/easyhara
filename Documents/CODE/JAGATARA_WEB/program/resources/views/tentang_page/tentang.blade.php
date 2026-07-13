<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jagatara - Tentang Tim Inovasi BEM Fasilkom UNEJ</title>

    <!-- Meta tags for SEO -->
    <meta name="description" content="Kenali Tim Jagatara BEM Fasilkom UNEJ yang bertugas mengimplementasikan program hilirisasi zero-waste di Desa Rowokangkung, Lumajang.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', var(--font-sans), sans-serif;
        }
    </style>
</head>
<body class="bg-white text-brand-text-dark antialiased overflow-x-hidden selection:bg-brand-lime selection:text-brand-dark">

    <x-navbar />

    <main>
        <!-- Dark Header Banner with Background Image -->
        <section class="relative pt-40 pb-24 px-6 sm:px-8 lg:px-16 text-center overflow-hidden">
            <!-- Background Image and Overlays -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/hero_bg.jpg') }}" alt="Rowokangkung Farmland Sunset" class="w-full h-full object-cover">
                <!-- Golden-Green-Dark Sunset overlay -->
                <div class="absolute inset-0 bg-gradient-to-tr from-brand-dark/95 via-brand-dark/40 to-black/20"></div>
                <div class="absolute inset-0 bg-black/30"></div>
            </div>

            <div class="relative z-10 max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-brand-lime/30 bg-brand-lime/5 text-brand-lime text-xs font-semibold uppercase tracking-wider reveal-on-load">
                    Profil Jagatara
                </div>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white reveal-on-load delay-100">
                    Tim Inovasi BEM <span class="bg-gradient-to-r from-brand-lime via-[#bef264] to-emerald-400 bg-clip-text text-transparent">Fasilkom UNEJ.</span>
                </h1>
                <p class="text-sm sm:text-base text-white/75 font-light leading-relaxed max-w-xl mx-auto reveal-on-load delay-200">
                    Kolaborasi mahasiswa Fakultas Ilmu Komputer Universitas Jember untuk melakukan pengabdian masyarakat dan hilirisasi produk di Desa Rowokangkung, Lumajang.
                </p>
            </div>
        </section>

        <!-- White Background Content Section (aligned with 'informasi' theme) -->
        <section class="bg-white py-20 px-6 sm:px-8 lg:px-16">
            <div class="max-w-7xl mx-auto space-y-20">
                
                <!-- Vision & Mission Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <!-- Vision Card -->
                    <div class="bg-brand-light-gray border border-brand-border/60 rounded-[32px] p-8 shadow-sm flex flex-col justify-between">
                        <div class="space-y-4">
                            <div class="text-emerald-700 font-bold uppercase tracking-wider text-xs">• Visi Kami</div>
                            <h2 class="text-2xl font-bold tracking-tight text-brand-text-dark">Menjadi Katalisator Digital Ekologis</h2>
                            <p class="text-sm sm:text-base text-brand-text-gray font-light leading-relaxed">
                                Mewujudkan Desa Rowokangkung sebagai role model desa cerdas berbasis circular economy melalui integrasi teknologi informasi dan hilirisasi pengolahan hasil pertanian tanpa limbah (zero-waste).
                            </p>
                        </div>
                    </div>

                    <!-- Mission Card -->
                    <div class="bg-brand-light-gray border border-brand-border/60 rounded-[32px] p-8 shadow-sm flex flex-col justify-between">
                        <div class="space-y-4">
                            <div class="text-emerald-700 font-bold uppercase tracking-wider text-xs">• Misi Kami</div>
                            <ul class="space-y-3 text-sm sm:text-base text-brand-text-gray font-light leading-relaxed">
                                <li class="flex items-start gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#bef264] mt-2 shrink-0"></span>
                                    <span>Mengembangkan teknologi pengolahan hasil bumi ramah lingkungan.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#bef264] mt-2 shrink-0"></span>
                                    <span>Membantu digitalisasi pemasaran produk UMKM Desa Rowokangkung.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#bef264] mt-2 shrink-0"></span>
                                    <span>Meningkatkan kolaborasi lintas sektor antara akademisi, desa, dan industri.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Team Members Grid -->
                <div class="space-y-10">
                    <div class="text-center space-y-2">
                        <h2 class="text-3xl font-bold tracking-tight text-brand-text-dark">Anggota Tim Jagatara</h2>
                        <p class="text-sm text-brand-text-gray font-light">Mahasiswa penggerak di balik implementasi zero-waste.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Member 1 -->
                        <div class="bg-brand-light-gray border border-brand-border/60 rounded-[28px] p-6 flex flex-col items-center text-center hover:border-brand-lime/50 transition-all duration-300 group shadow-sm">
                            <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center overflow-hidden mb-4 relative shadow-inner text-emerald-700">
                                <i class="bi bi-person-workspace text-4xl leading-none"></i>
                            </div>
                            <h3 class="text-lg font-bold text-brand-text-dark">Muhammad Al Fahmi</h3>
                            <p class="text-xs text-emerald-700 font-semibold uppercase tracking-wider mt-1">Ketua Tim</p>
                            <p class="text-xs text-brand-text-gray font-light mt-3 leading-relaxed">
                                Koordinator utama program inovasi pengabdian masyarakat BEM Fasilkom Universitas Jember.
                            </p>
                        </div>

                        <!-- Member 2 -->
                        <div class="bg-brand-light-gray border border-brand-border/60 rounded-[28px] p-6 flex flex-col items-center text-center hover:border-brand-lime/50 transition-all duration-300 group shadow-sm">
                            <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center overflow-hidden mb-4 relative shadow-inner text-emerald-700">
                                <i class="bi bi-mortarboard text-4xl leading-none"></i>
                            </div>
                            <h3 class="text-lg font-bold text-brand-text-dark">Siti Ayu Ningsih</h3>
                            <p class="text-xs text-emerald-700 font-semibold uppercase tracking-wider mt-1">Pengembangan Produk</p>
                            <p class="text-xs text-brand-text-gray font-light mt-3 leading-relaxed">
                                Penanggung jawab riset hilirisasi zero-waste komoditas gurami, kangkung, dan jagung.
                            </p>
                        </div>

                        <!-- Member 3 -->
                        <div class="bg-brand-light-gray border border-brand-border/60 rounded-[28px] p-6 flex flex-col items-center text-center hover:border-brand-lime/50 transition-all duration-300 group shadow-sm">
                            <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center overflow-hidden mb-4 relative shadow-inner text-emerald-700">
                                <i class="bi bi-laptop text-4xl leading-none"></i>
                            </div>
                            <h3 class="text-lg font-bold text-brand-text-dark">Budi Iskandar</h3>
                            <p class="text-xs text-emerald-700 font-semibold uppercase tracking-wider mt-1">Divisi IT & Digital</p>
                            <p class="text-xs text-brand-text-gray font-light mt-3 leading-relaxed">
                                Merancang website katalog pemasaran dan integrasi sistem digitalisasi desa cerdas.
                            </p>
                        </div>

                        <!-- Member 4 -->
                        <div class="bg-brand-light-gray border border-brand-border/60 rounded-[28px] p-6 flex flex-col items-center text-center hover:border-brand-lime/50 transition-all duration-300 group shadow-sm">
                            <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center overflow-hidden mb-4 relative shadow-inner text-emerald-700">
                                <i class="bi bi-people text-4xl leading-none"></i>
                            </div>
                            <h3 class="text-lg font-bold text-brand-text-dark">Bagus Lutfi</h3>
                            <p class="text-xs text-emerald-700 font-semibold uppercase tracking-wider mt-1">Humas & Pendamping Desa</p>
                            <p class="text-xs text-brand-text-gray font-light mt-3 leading-relaxed">
                                Menjembatani kolaborasi mahasiswa dengan masyarakat tani dan nelayan Desa Rowokangkung.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Collaboration & Institution Grid -->
                <div class="bg-brand-light-gray border border-brand-border/60 rounded-[32px] p-8 text-center space-y-6 shadow-sm">
                    <h3 class="text-lg font-bold uppercase tracking-wider text-emerald-700">Didukung & Berkolaborasi Dengan</h3>
                    <div class="flex flex-wrap items-center justify-center gap-12 py-4">
                        <span class="text-brand-text-gray font-bold hover:text-brand-text-dark transition-colors">Universitas Jember (UNEJ)</span>
                        <span class="text-brand-text-gray font-bold hover:text-brand-text-dark transition-colors">BEM Fasilkom UNEJ</span>
                        <span class="text-brand-text-gray font-bold hover:text-brand-text-dark transition-colors">Pemerintah Desa Rowokangkung</span>
                        <span class="text-brand-text-gray font-bold hover:text-brand-text-dark transition-colors">Kelompok Tani Lumajang</span>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <x-footer />
    <x-floating-action />

</body>
</html>

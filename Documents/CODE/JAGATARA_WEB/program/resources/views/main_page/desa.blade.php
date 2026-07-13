<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jagatara - Potensi & Keunggulan Desa Rowokangkung</title>

    <!-- Meta tags for SEO -->
    <meta name="description" content="Eksplorasi potensi perikanan dan pertanian di Desa Rowokangkung Lumajang, pusat hilirisasi Gurami, Jagung, dan Kangkung.">

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
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-brand-lime/30 bg-brand-lime/5 text-brand-lime text-xs font-semibold uppercase tracking-wider">
                    Profil Desa Binaan
                </div>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white">
                    Desa <span class="bg-gradient-to-r from-brand-lime via-[#bef264] to-emerald-400 bg-clip-text text-transparent">Rowokangkung.</span>
                </h1>
                <p class="text-sm sm:text-base text-white/75 font-light leading-relaxed max-w-xl mx-auto">
                    Kecamatan Rowokangkung, Kabupaten Lumajang — kawasan agraris subur dengan potensi perikanan darat dan hasil tani terintegrasi melimpah.
                </p>
            </div>
        </section>

        <!-- White Background Content Section (aligned with 'informasi' theme) -->
        <section class="bg-white py-20 px-6 sm:px-8 lg:px-16">
            <div class="max-w-7xl mx-auto space-y-20">
                
                <!-- About Rowokangkung Info Columns -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    <!-- Card 1 -->
                    <div class="bg-brand-light-gray border border-brand-border/60 rounded-[32px] p-8 flex flex-col justify-between shadow-sm">
                        <div class="space-y-4">
                            <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-emerald-700 shadow-sm border border-brand-border/40">
                                <!-- Fish Icon (Custom SVG) -->
                                <svg class="w-6 h-6 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 12c4-8 16-8 20 0-4 8-16 8-20 0z" />
                                    <path d="M2 12L0 9v6l2-3z" />
                                    <path d="M16 8a5 5 0 0 1 0 8" />
                                    <circle cx="18" cy="11" r="1" fill="currentColor" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-brand-text-dark">Potensi Perikanan Gurami</h2>
                            <p class="text-sm text-brand-text-gray leading-relaxed font-light">
                                Rowokangkung merupakan salah satu sentra budidaya Gurami air tawar di Lumajang. Melimpahnya sumber air tanah dimanfaatkan warga untuk mengelola kolam budidaya gurami berkualitas ekspor.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-brand-light-gray border border-brand-border/60 rounded-[32px] p-8 flex flex-col justify-between shadow-sm">
                        <div class="space-y-4">
                            <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-emerald-700 shadow-sm border border-brand-border/40">
                                <!-- Tulip Icon (Custom SVG) -->
                                <svg class="w-6 h-6 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2C8 2 6 5 6 9c0 3 2 5 6 7 4-2 6-4 6-7 0-4-2-7-6-7z" />
                                    <path d="M12 2c1.2 2 1.2 5 0 7M12 2C10.8 4 10.8 7 12 9" opacity="0.7" />
                                    <path d="M12 16v6M8 20c2-1 4-1 4 0M16 18c-2-1-4-1-4 0" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-brand-text-dark">Sektor Pertanian Jagung</h2>
                            <p class="text-sm text-brand-text-gray leading-relaxed font-light">
                                Lahan pertanian jagung terhampar luas di sepanjang desa Rowokangkung. Hasil panen jagung manis melimpah ruah dan menjadi komoditas pangan pokok penopang ekonomi keluarga.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-brand-light-gray border border-brand-border/60 rounded-[32px] p-8 flex flex-col justify-between shadow-sm">
                        <div class="space-y-4">
                            <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-emerald-700 shadow-sm border border-brand-border/40">
                                <i class="bi bi-leaf text-2xl leading-none"></i>
                            </div>
                            <h2 class="text-xl font-bold text-brand-text-dark">Budidaya Kangkung Air</h2>
                            <p class="text-sm text-brand-text-gray leading-relaxed font-light">
                                Saluran irigasi desa dimanfaatkan secara optimal untuk budidaya kangkung air segar. Kangkung diproduksi harian untuk menyuplai pasar sayur segar di Lumajang dan sekitarnya.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Integrated Circular Economy Graphic -->
                <div class="bg-brand-light-gray border border-brand-border/60 rounded-[32px] p-8 space-y-8 shadow-sm">
                    <div class="text-center space-y-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">• Circular Economy</span>
                        <h3 class="text-2xl font-bold text-brand-text-dark">Model Hilirisasi Terintegrasi Jagatara</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                        <!-- Flow 1 -->
                        <div class="p-6 bg-white border border-brand-border/40 rounded-2xl text-center space-y-2 relative shadow-sm">
                            <div class="text-emerald-700 font-bold">1. Input Komoditas</div>
                            <p class="text-xs text-brand-text-gray font-light">Gurami, jagung manis, dan kangkung dipanen langsung dari pembudidaya dan petani lokal Desa Rowokangkung.</p>
                        </div>
                        <!-- Flow 2 -->
                        <div class="p-6 bg-white border border-brand-border/40 rounded-2xl text-center space-y-2 relative shadow-sm">
                            <div class="text-emerald-700 font-bold">2. Pengolahan Zero-Waste</div>
                            <p class="text-xs text-brand-text-gray font-light">Daging & bagian utama menjadi produk pangan olahan, sedangkan kulit, duri, batang, dan klobot diproses menjadi pakan & pupuk.</p>
                        </div>
                        <!-- Flow 3 -->
                        <div class="p-6 bg-white border border-brand-border/40 rounded-2xl text-center space-y-2 relative shadow-sm">
                            <div class="text-emerald-700 font-bold">3. Re-distribusi Hasil</div>
                            <p class="text-xs text-brand-text-gray font-light">Pupuk kembali menyuburkan sawah kangkung & ladang jagung, sedangkan pakan organik disuplai kembali ke pembudidaya gurami.</p>
                        </div>
                    </div>
                </div>

                <!-- Local Economic Impact -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                    <div class="lg:col-span-7 space-y-6">
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">• Dampak Program</span>
                        <h3 class="text-3xl font-bold tracking-tight text-brand-text-dark">Meningkatkan Pendapatan Petani & Melindungi Ekosistem Desa</h3>
                        <p class="text-sm sm:text-base text-brand-text-gray leading-relaxed font-light">
                            Melalui penerapan hilirisasi zero-waste dari tim Jagatara BEM Fasilkom UNEJ, kami mengeliminasi penumpukan limbah organik pertanian dan perikanan di Desa Rowokangkung. Selain menjaga kebersihan lingkungan desa, program ini meningkatkan margin keuntungan petani lokal dengan memotong biaya pembelian pupuk dan pakan ikan.
                        </p>
                    </div>
                    <div class="lg:col-span-5">
                        <div class="aspect-video rounded-3xl overflow-hidden shadow-lg relative border border-brand-border/40">
                            <img src="{{ asset('images/garden_card.jpg') }}" alt="Rowokangkung Integrated Garden" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-brand-dark/10"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <x-footer />
    <x-floating-action />

</body>
</html>

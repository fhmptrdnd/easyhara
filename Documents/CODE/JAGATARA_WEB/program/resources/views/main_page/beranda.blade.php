<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jagatara - Inovasi Hilirisasi Zero-Waste Desa Rowokangkung</title>

    <!-- Meta tags for SEO -->
    <meta name="description" content="Jagatara adalah tim inovasi BEM Fakultas Ilmu Komputer Universitas Jember yang menjalankan program hilirisasi zero-waste berbasis Gurami, Jagung, dan Kangkung di Desa Rowokangkung, Lumajang.">

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
        /* Custom image heights and crops to match layout precisely */
        .card-img-fit {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        /* Smooth transitions for interactive information tabs */
        #informasi .grid {
            transition: opacity 300ms ease-in-out, transform 300ms ease-in-out;
        }
    </style>
</head>
<body class="bg-brand-dark text-white antialiased overflow-x-hidden selection:bg-brand-lime selection:text-brand-dark">

    <x-navbar />

    <main>
        <!-- Hero Section -->
        <section id="home" class="relative min-h-screen flex items-center justify-center pt-24 pb-16 px-6 sm:px-8 lg:px-16 overflow-hidden">
            <!-- Background Image with Sunset Crop and Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/hero_bg.jpg') }}" alt="Rowokangkung Farmland Sunset" class="w-full h-full object-cover">
                <!-- Golden-Green-Dark Sunset overlay -->
                <div class="absolute inset-0 bg-gradient-to-tr from-brand-dark/95 via-brand-dark/40 to-black/20"></div>
                <div class="absolute inset-0 bg-black/30"></div>
            </div>

            <!-- Content Area -->
            <div class="relative z-10 max-w-7xl w-full mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center pt-10">

                <!-- Left Column: Main Hero Headings -->
                <div class="lg:col-span-7 flex flex-col items-start space-y-6">
                    <!-- Badge with green-yellow accents -->
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-brand-lime/30 bg-brand-lime/5 backdrop-blur-sm text-brand-lime text-xs font-semibold uppercase tracking-wider reveal-on-load">
                        Inovasi Zero-Waste Desa Rowokangkung
                    </div>

                    <!-- Title with gradient text on "Zero-Waste Gurami, Jagung & Kangkung." -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.1] max-w-2xl reveal-on-load delay-100">
                        Inovasi Jagatara: </br><span class="bg-gradient-to-r from-brand-lime via-[#bef264] to-emerald-400 bg-clip-text text-transparent">Zero-Waste Gurami, Jagung & Kangkung.</span>
                    </h1>

                    <!-- Paragraph -->
                    <p class="text-base sm:text-lg text-white/80 max-w-xl font-light leading-relaxed reveal-on-load delay-200">
                        Tim BEM Fakultas Ilmu Komputer Universitas Jember menghadirkan inovasi produk untuk memaksimalkan potensi komoditas Desa Rowokangkung, Lumajang tanpa menyisakan limbah.
                    </p>

                    <!-- CTA Button with green-yellow gradient -->
                    <a href="#produk" class="inline-flex items-center justify-between gap-6 pl-6 pr-2 py-2 rounded-full bg-gradient-to-r from-brand-lime to-[#a3e635] hover:opacity-95 text-brand-dark text-base font-bold transition-all duration-300 shadow-lg shadow-brand-lime/10 group reveal-on-load delay-300">
                        Lihat Produk
                        <span class="w-10 h-10 rounded-full bg-brand-dark flex items-center justify-center text-white transition-transform duration-300 group-hover:translate-x-1">
                            <!-- Right Arrow SVG -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </span>
                    </a>
                </div>

                <!-- Right Column: Glassmorphic Mission Card -->
                <div class="lg:col-span-5 flex justify-center lg:justify-end reveal-on-load backdrop-blur-xl delay-400">
                    <div class="w-full max-w-md bg-white/10 border border-white/15 rounded-[32px] p-8 shadow-2xl relative text-white flex flex-col justify-between min-h-[300px]">

                        <!-- Top Header with Navigation Buttons -->
                        <div class="flex items-center justify-between mb-8">
                            <span id="mission-badge" class="text-xs font-bold uppercase tracking-wider text-brand-lime">• Tujuan Jagatara</span>
                            <div class="flex gap-2.5">
                                <!-- Prev Arrow Button -->
                                <button id="mission-prev-btn" class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center hover:bg-white/10 transition-colors text-white cursor-pointer" aria-label="Sebelumnya">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                    </svg>
                                </button>
                                <!-- Next Arrow Button -->
                                <button id="mission-next-btn" class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center hover:bg-white/10 transition-colors text-white cursor-pointer" aria-label="Selanjutnya">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div id="mission-body-container" class="space-y-4">
                            <p id="mission-text" class="text-lg font-medium leading-relaxed text-white/90">
                                Kegiatan PPK ORMAWA ini bertujuan untuk mendorong pengembangan potensi UMKM di Desa Rowokangkung, melalui berbagai inovasi dan pemberdayaan.
                            </p>
                        </div>

                        <!-- Card Footer Link -->
                        <div class="mt-8 pt-4 border-t border-white/10">
                            <a id="mission-link" href="#informasi" class="inline-flex items-center gap-2 text-sm font-bold text-white hover:text-brand-lime transition-colors group">
                                Pelajari Selengkapnya
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- About Us Section (Tentang Jagatara) -->
        <section id="informasi" class="bg-white text-brand-text-dark py-20 lg:py-28 px-6 sm:px-8 lg:px-16">
            <div class="max-w-7xl mx-auto space-y-16">                <!-- Navigation Tabs/Pills with green-yellow gradient active state -->
                <div class="flex flex-wrap gap-3 border-b border-brand-border/60 pb-6">
                    <button data-tab="jagatara" class="tab-btn px-6 py-2.5 rounded-full bg-brand-lime text-black font-bold transition-all duration-300 ease-in-out shadow-sm border border-transparent cursor-pointer">
                        Tentang Jagatara
                    </button>
                    <button data-tab="hilirisasi" class="tab-btn px-6 py-2.5 rounded-full border border-brand-border text-brand-text-gray hover:text-brand-text-dark hover:border-brand-text-dark text-sm font-semibold transition-all duration-300 ease-in-out cursor-pointer">
                        Program Hilirisasi
                    </button>
                    <button data-tab="bem" class="tab-btn px-6 py-2.5 rounded-full border border-brand-border text-brand-text-gray hover:text-brand-text-dark hover:border-brand-text-dark text-sm font-semibold transition-all duration-300 ease-in-out cursor-pointer">
                        Tim BEM Fasilkom
                    </button>
                    <button data-tab="desa" class="tab-btn px-6 py-2.5 rounded-full border border-brand-border text-brand-text-gray hover:text-brand-text-dark hover:border-brand-text-dark text-sm font-semibold transition-all duration-300 ease-in-out cursor-pointer">
                        Desa Rowokangkung
                    </button>
                </div>

                <!-- Mid Split Row: Subtitle + Main copy -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <!-- Left Label Column -->
                    <div class="lg:col-span-3">
                        <span id="tab-label" class="text-sm font-bold text-brand-text-gray tracking-wide flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-lime"></span>
                            Dedikasi Kami
                        </span>
                    </div>

                    <!-- Right Copy Column -->
                    <div class="lg:col-span-9 space-y-6">
                        <h2 id="tab-title" class="text-3xl sm:text-4xl lg:text-[40px] font-extrabold leading-[1.2] text-brand-text-dark tracking-tight">
                            Kami berdedikasi untuk memajukan Desa Rowokangkung melalui inovasi hilirisasi zero-waste berkelanjutan. Kami menghubungkan ilmu komputer, pengolahan pangan ramah lingkungan, dan pemberdayaan masyarakat.
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 pt-4 items-center">
                            <div class="md:col-span-8">
                                <p id="tab-description" class="text-base text-brand-text-gray leading-relaxed font-light">
                                    Sebagai perwakilan tim BEM Fasilkom Universitas Jember, kami mengoptimalkan pengolahan produk hilirisasi Gurami, jagung, dan kangkung. Mulai dari pengolahan daging gurami premium, kolagen kulit ikan, pakan ternak organik dari batang kangkung, hingga pemanfaatan tongkol jagung menjadi pupuk kompos berkualitas.
                                </p>
                            </div>
                            <div class="md:col-span-4 flex md:justify-end">
                                <a href="/tentang" id="tab-link" class="inline-flex items-center justify-center px-8 py-3 rounded-full border border-brand-text-dark text-brand-text-dark hover:bg-brand-text-dark hover:text-white text-sm font-bold transition-all duration-300">
                                    Tentang Tim
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom 4-Column Grid: Images and Statistics Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-6">

                    <!-- Item 1: Farmer Image Card -->
                    <div class="aspect-square rounded-[32px] overflow-hidden shadow-md">
                        <img id="tab-img-1" src="{{ asset('images/garden_card.jpg') }}" alt="Aktivitas pertanian Rowokangkung" class="card-img-fit hover:scale-105 transition-transform duration-500">
                    </div>

                    <!-- Item 2: Stat Card 1 (Pemanfaatan Zero-Waste 100%) -->
                    <div class="aspect-square rounded-[32px] bg-brand-light-gray p-8 flex flex-col justify-between relative shadow-sm border border-black/[0.03]">
                        <!-- Top Row: Diagonal Arrow Link -->
                        <div class="flex justify-end">
                            <a href="#potensi-desa" class="diagonal-arrow-link w-10 h-10 rounded-full flex items-center justify-center shadow-sm" aria-label="Detail">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </a>
                        </div>

                        <!-- Content -->
                        <div class="space-y-2">
                            <div id="tab-stat-val-1" class="text-5xl font-extrabold text-brand-text-dark leading-none">100%</div>
                            <h3 id="tab-stat-title-1" class="text-base font-bold text-brand-text-dark">Pemanfaatan Zero-Waste</h3>
                            <p id="tab-stat-desc-1" class="text-xs text-brand-text-gray leading-relaxed font-light">
                                Menjamin seluruh sisa pengolahan gurami, jagung, dan kangkung diolah kembali secara produktif tanpa menyisakan residu sampah berbahaya bagi Desa Rowokangkung.
                            </p>
                        </div>
                    </div>

                    <!-- Item 3: Greenhouse/Garden Image Card -->
                    <div class="aspect-square rounded-[32px] overflow-hidden shadow-md">
                        <img id="tab-img-2" src="{{ asset('images/farmer_card.jpg') }}" alt="Budidaya hortikultura terintegrasi" class="card-img-fit hover:scale-105 transition-transform duration-500">
                    </div>

                    <!-- Item 4: Stat Card 2 (Inovasi Produk Turunan 10+) -->
                    <div class="aspect-square rounded-[32px] bg-gradient-to-br from-brand-lime via-[#bef264] to-emerald-400 p-8 flex flex-col justify-between relative shadow-sm border border-black/[0.02]">
                        <!-- Top Row: Diagonal Arrow Link -->
                        <div class="flex justify-end">
                            <a href="#hilirisasi-produk" class="card-lime-arrow-link w-10 h-10 rounded-full flex items-center justify-center shadow-sm" aria-label="Detail">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </a>
                        </div>

                        <!-- Content -->
                        <div class="space-y-2 text-black">
                            <div id="tab-stat-val-2" class="text-5xl font-extrabold leading-none">10+</div>
                            <h3 id="tab-stat-title-2" class="text-base font-bold">Inovasi Produk Turunan</h3>
                            <p id="tab-stat-desc-2" class="text-xs text-black/80 leading-relaxed font-light">
                                Mengembangkan lebih dari 10 produk turunan olahan pangan sehat, pakan ternak alternatif, dan pupuk organik bernilai ekonomis tinggi hasil kreasi tim Jagatara.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <x-footer />
    <x-floating-action />

    <!-- Script for Dynamic Tab Switcher in Informasi Section -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const contentRows = document.querySelectorAll('#informasi .grid');

            // Element selectors
            const tabLabel = document.getElementById('tab-label');
            const tabTitle = document.getElementById('tab-title');
            const tabDescription = document.getElementById('tab-description');
            const tabLink = document.getElementById('tab-link');

            const tabImg1 = document.getElementById('tab-img-1');
            const tabStatVal1 = document.getElementById('tab-stat-val-1');
            const tabStatTitle1 = document.getElementById('tab-stat-title-1');
            const tabStatDesc1 = document.getElementById('tab-stat-desc-1');

            const tabImg2 = document.getElementById('tab-img-2');
            const tabStatVal2 = document.getElementById('tab-stat-val-2');
            const tabStatTitle2 = document.getElementById('tab-stat-title-2');
            const tabStatDesc2 = document.getElementById('tab-stat-desc-2');

            const tabData = {
                jagatara: {
                    label: 'Dedikasi Kami',
                    title: 'Kami berdedikasi untuk memajukan Desa Rowokangkung melalui inovasi hilirisasi zero-waste berkelanjutan. Kami menghubungkan ilmu komputer, pengolahan pangan ramah lingkungan, dan pemberdayaan masyarakat.',
                    description: 'Sebagai perwakilan tim BEM Fasilkom Universitas Jember, kami mengoptimalkan pengolahan produk hilirisasi Gurami, jagung, dan kangkung. Mulai dari pengolahan daging gurami premium, kolagen kulit ikan, pakan ternak organik dari batang kangkung, hingga pemanfaatan tongkol jagung menjadi pupuk kompos berkualitas.',
                    btnText: 'Tentang Tim',
                    btnUrl: '/tentang',
                    img1: "{{ asset('images/Agil.jpeg') }}",
                    statVal1: '100%',
                    statTitle1: 'Pemanfaatan Zero-Waste',
                    statDesc1: 'Menjamin seluruh sisa pengolahan gurami, jagung, dan kangkung diolah kembali secara produktif tanpa menyisakan residu sampah berbahaya bagi Desa Rowokangkung.',
                    img2: "{{ asset('images/Nai.jpeg') }}",
                    statVal2: '10+',
                    statTitle2: 'Inovasi Produk Turunan',
                    statDesc2: 'Mengembangkan lebih dari 10 produk turunan olahan pangan sehat, pakan ternak alternatif, dan pupuk organik bernilai ekonomis tinggi hasil kreasi tim Jagatara.'
                },
                hilirisasi: {
                    label: 'Inovasi Kami',
                    title: 'Hilirisasi produk zero-waste terintegrasi untuk meningkatkan nilai tambah hasil tani lokal dan menciptakan circular economy.',
                    description: 'Melalui riset dan teknologi tepat guna, kami mengekstrak potensi maksimal dari komoditas desa. Daging gurami diolah menjadi Abon Premium, limbah kulit gurami disulap menjadi sabun kolagen, batang kangkung difermentasi menjadi pakan berkualitas, dan sisa daun kangkung diolah menjadi pupuk cair.',
                    btnText: 'Lihat Produk',
                    btnUrl: '/produk',
                    img1: "{{ asset('images/Arul.jpeg') }}",
                    statVal1: '3',
                    statTitle1: 'Komoditas Utama',
                    statDesc1: 'Fokus hilirisasi terintegrasi pada komoditas Gurami (perikanan), Jagung (pertanian), dan Kangkung (hortikultura) untuk mengeliminasi sisa limbah produksi.',
                    img2: "{{ asset('images/Agil.jpeg') }}",
                    statVal2: '2',
                    statTitle2: 'Kategori Produk',
                    statDesc2: 'Menghasilkan dua kategori produk utama: produk konsumsi bernilai tinggi (abon, sabun kolagen) dan produk pertanian pendukung (pakan organik, POC).'
                },
                bem: {
                    label: 'Anggota Tim Kami',
                    title: 'Kolaborasi inovatif mahasiswa Fasilkom UNEJ dalam pengabdian masyarakat nyata di Desa Rowokangkung.',
                    description: 'Didukung penuh oleh BEM Fasilkom Universitas Jember, tim kami menggabungkan keahlian teknologi informasi, manajemen program, dan kemitraan masyarakat untuk mendampingi pelaku usaha mikro di desa binaan agar naik kelas.',
                    btnText: 'Tentang Tim',
                    btnUrl: '/tentang',
                    img1: "{{ asset('images/Nai.jpeg') }}",
                    statVal1: '4',
                    statTitle1: 'Pilar Pengabdian',
                    statDesc1: 'Fokus program pada transfer teknologi, pendampingan produksi zero-waste, pengembangan brand lokal, dan digitalisasi pemasaran produk UMKM.',
                    img2: "{{ asset('images/Arul.jpeg') }}",
                    statVal2: '20+',
                    statTitle2: 'Mahasiswa Terlibat',
                    statDesc2: 'Didukung oleh sinergi mahasiswa dan dosen pembimbing dalam merancang teknologi pemrosesan limbah serta sistem informasi katalog digital.'
                },
                desa: {
                    label: 'Desa Binaan Potensial',
                    title: 'Desa Rowokangkung: Kawasan agraris subur di Kabupaten Lumajang dengan potensi perikanan darat melimpah.',
                    description: 'Memiliki bentang alam persawahan yang luas dan sistem irigasi berlimpah, Desa Rowokangkung menjadi sentra budidaya Gurami air tawar. Jagatara hadir untuk mengintegrasikan limbah pertanian dan perikanan agar menjadi berkah bagi lingkungan desa.',
                    btnText: 'Jelajahi Desa',
                    btnUrl: '/desa',
                    img1: "{{ asset('images/Arul.jpeg') }}",
                    statVal1: '1',
                    statTitle1: 'Desa Binaan Cerdas',
                    statDesc1: 'Rowokangkung ditargetkan sebagai desa percontohan nasional penerapan circular economy terintegrasi berbasis zero-waste.',
                    img2: "{{ asset('images/Nai.jpeg') }}",
                    statVal2: '300+',
                    statTitle2: 'Keluarga Penerima Manfaat',
                    statDesc2: 'Meningkatkan pendapatan dan keterampilan pembudidaya ikan serta petani sayur lokal melalui pemanfaatan pupuk dan pakan buatan sendiri.'
                }
            };

            tabButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const targetTab = this.getAttribute('data-tab');
                    const data = tabData[targetTab];
                    if (!data) return;

                    // 1. Update Active State of Buttons
                    tabButtons.forEach(btn => {
                        btn.className = 'tab-btn px-6 py-2.5 rounded-full border border-brand-border text-brand-text-gray hover:text-brand-text-dark hover:border-brand-text-dark text-sm font-semibold transition-all duration-300 ease-in-out cursor-pointer';
                    });

                    // Style the clicked button as active (smooth transition to bg-brand-lime and text-black)
                    this.className = 'tab-btn px-6 py-2.5 rounded-full bg-brand-lime text-black font-bold transition-all duration-300 ease-in-out shadow-sm border border-transparent cursor-pointer';

                    // 2. Fade Out Content
                    contentRows.forEach(row => {
                        row.style.opacity = '0';
                        row.style.transform = 'translateY(8px)';
                    });

                    // 3. Swap Content and Fade In
                    setTimeout(() => {
                        // Update texts
                        tabLabel.innerHTML = `<span class="w-1.5 h-1.5 rounded-full bg-brand-lime"></span>${data.label}`;
                        tabTitle.textContent = data.title;
                        tabDescription.textContent = data.description;
                        tabLink.textContent = data.btnText;
                        tabLink.setAttribute('href', data.btnUrl);

                        // Update grid images and stats
                        tabImg1.setAttribute('src', data.img1);
                        tabStatVal1.textContent = data.statVal1;
                        tabStatTitle1.textContent = data.statTitle1;
                        tabStatDesc1.textContent = data.statDesc1;

                        tabImg2.setAttribute('src', data.img2);
                        tabStatVal2.textContent = data.statVal2;
                        tabStatTitle2.textContent = data.statTitle2;
                        tabStatDesc2.textContent = data.statDesc2;

                        // Fade back in
                        contentRows.forEach(row => {
                            row.style.opacity = '1';
                            row.style.transform = 'translateY(0)';
                        });
                    }, 250);
                });
            });

            // Glassmorphic Mission Card Slider Logic
            const missionPrevBtn = document.getElementById('mission-prev-btn');
            const missionNextBtn = document.getElementById('mission-next-btn');
            const missionBadge = document.getElementById('mission-badge');
            const missionText = document.getElementById('mission-text');
            const missionLink = document.getElementById('mission-link');
            const missionContainer = document.getElementById('mission-body-container');

            const missionSlides = [
                {
                    badge: '• Identifikasi Potensi',
                    content: 'Melalui konsep “3 Komoditas, Banyak Produk, 0 Limbah” berbasis zero-waste, circular economy, dan aquaponik, komoditas ditingkatkan seperti abon dan bakso gurami, susu dan biofoam jagung, serta mie dan pakan ikan dari kangkung yang didukung pelatihan produksi dan digitalisasi untuk peningkatan ekonomi.',
                    link: '#informasi'
                },
                {
                    badge: '• Tujuan Jagatara',
                    content: 'Kegiatan PPK ORMAWA ini bertujuan untuk mendorong pengembangan potensi UMKM di Desa Rowokangkung, melalui berbagai inovasi dan pemberdayaan.',
                    link: '#informasi'
                },
                {
                    badge: '• Sasaran Program',
                    content: 'Sasaran program zero-waste, circular economy, dan aquaponic meliputi: petani jagung, pembudidaya ikan gurami, petani kangkung, dan pelaku UMKM yang bergantung pada sektor pertanian dan perikanan.',
                    link: '#informasi'
                }
            ];

            let currentSlideIndex = 1; // Default to Misi (slide 2) to align with initial HTML

            function updateSlide(index) {
                // Fade out transition
                missionContainer.style.opacity = '0';
                missionContainer.style.transform = 'translateY(5px)';
                missionBadge.style.opacity = '0';

                setTimeout(() => {
                    const slide = missionSlides[index];

                    // Update content values
                    missionBadge.textContent = slide.badge;
                    missionText.textContent = slide.content;
                    missionLink.setAttribute('href', slide.link);

                    // Fade in transition
                    missionContainer.style.opacity = '1';
                    missionContainer.style.transform = 'translateY(0)';
                    missionBadge.style.opacity = '1';
                }, 200);
            }

            missionPrevBtn.addEventListener('click', function (e) {
                e.preventDefault();
                currentSlideIndex = (currentSlideIndex - 1 + missionSlides.length) % missionSlides.length;
                updateSlide(currentSlideIndex);
            });

            missionNextBtn.addEventListener('click', function (e) {
                e.preventDefault();
                currentSlideIndex = (currentSlideIndex + 1) % missionSlides.length;
                updateSlide(currentSlideIndex);
            });

            // Set transition styles dynamically
            missionContainer.style.transition = 'opacity 200ms ease-in-out, transform 200ms ease-in-out';
            missionBadge.style.transition = 'opacity 200ms ease-in-out';
        });
    </script>

</body>
</html>

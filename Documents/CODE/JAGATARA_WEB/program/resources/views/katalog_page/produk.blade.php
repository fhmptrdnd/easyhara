<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jagatara - Produk Hilirisasi Zero-Waste Rowokangkung</title>

    <!-- Meta tags for SEO -->
    <meta name="description" content="Katalog produk hilirisasi zero-waste dari Gurami, Jagung, dan Kangkung kreasi tim Jagatara BEM Fasilkom UNEJ di Desa Rowokangkung.">

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
                    Katalog Jagatara
                </div>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white reveal-on-load delay-100">
                    Produk Hilirisasi <span class="bg-gradient-to-r from-brand-lime via-[#bef264] to-emerald-400 bg-clip-text text-transparent">Zero-Waste.</span>
                </h1>
                <p class="text-sm sm:text-base text-white/75 font-light leading-relaxed max-w-xl mx-auto reveal-on-load delay-200">
                    Pengolahan komoditas unggulan Desa Rowokangkung secara holistik tanpa menyisakan limbah, meningkatkan nilai ekonomi bagi petani dan peternak lokal.
                </p>
            </div>
        </section>

        <!-- White Background Content Section (aligned with 'informasi' theme) -->
        <section class="bg-white py-20 px-6 sm:px-8 lg:px-16">
            <div class="max-w-7xl mx-auto space-y-20">
                
                @php
                    $guramiProducts = $products->filter(fn($p) => str_contains(strtolower($p->zero_waste_source), 'gurami') || str_contains(strtolower($p->name), 'gurami'));
                    $jagungProducts = $products->filter(fn($p) => str_contains(strtolower($p->zero_waste_source), 'jagung') || str_contains(strtolower($p->name), 'jagung'));
                    $kangkungProducts = $products->filter(fn($p) => str_contains(strtolower($p->zero_waste_source), 'kangkung') || str_contains(strtolower($p->name), 'kangkung'));

                    $images = [
                        'susu-jagung-manis' => 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?w=600&auto=format&fit=crop',
                        'biofoam-jagung' => 'https://images.unsplash.com/photo-1595079676339-1534801ad6cf?w=600&auto=format&fit=crop',
                        'abon-gurami-premium' => 'https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?w=600&auto=format&fit=crop',
                        'bakso-gurami-sehat' => 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?w=600&auto=format&fit=crop',
                        'pellet-pakan-kelinci-kangkung' => 'https://images.unsplash.com/photo-1516253593875-bd7ba052fbc5?w=600&auto=format&fit=crop',
                        'mi-kangkung-kering' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=600&auto=format&fit=crop',
                        'poc-kotoran-gurami' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=600&auto=format&fit=crop',
                    ];

                    $units = [
                        'susu-jagung-manis' => 'botol',
                        'biofoam-jagung' => 'pcs',
                        'abon-gurami-premium' => 'bungkus',
                        'bakso-gurami-sehat' => 'pack',
                        'pellet-pakan-kelinci-kangkung' => 'kg',
                        'mi-kangkung-kering' => 'bungkus',
                        'poc-kotoran-gurami' => 'botol',
                    ];
                @endphp

                <!-- Category 1: GURAMI -->
                <div class="space-y-8">
                    <div class="flex items-center gap-4 border-b border-brand-border/60 pb-4">
                        <div class="w-10 h-10 rounded-full bg-brand-lime/10 flex items-center justify-center text-emerald-700">
                            <!-- Fish Icon (Custom SVG) -->
                            <svg class="w-5 h-5 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12c4-8 16-8 20 0-4 8-16 8-20 0z" />
                                <path d="M2 12L0 9v6l2-3z" />
                                <path d="M16 8a5 5 0 0 1 0 8" />
                                <circle cx="18" cy="11" r="1" fill="currentColor" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold tracking-tight text-brand-text-dark">Hilirisasi Gurami</h2>
                        <span class="text-xs text-brand-text-gray bg-brand-light-gray px-3 py-1 rounded-full font-semibold">{{ $guramiProducts->count() }} Produk Inovatif</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @forelse($guramiProducts as $product)
                            @php
                                $imgUrl = $images[$product->slug] ?? 'https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?w=600&auto=format&fit=crop';
                                $unit = $units[$product->slug] ?? 'pcs';
                                $productData = json_encode([
                                    'name' => $product->name,
                                    'slug' => $product->slug,
                                    'category' => $product->category,
                                    'description' => $product->description,
                                    'price' => $product->price,
                                    'zero_waste_source' => $product->zero_waste_source,
                                    'imageUrl' => $imgUrl,
                                    'unit' => $unit
                                ]);
                            @endphp
                            <div onclick="openProductDetail('{{ addslashes($productData) }}')" class="bg-brand-light-gray border border-brand-border/60 rounded-[28px] p-6 hover:border-brand-lime/50 transition-all duration-300 flex flex-col justify-between group shadow-sm cursor-pointer">
                                <div class="space-y-4">
                                    <div class="w-full h-48 rounded-2xl bg-white flex items-center justify-center overflow-hidden relative shadow-inner">
                                        <img src="{{ $imgUrl }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="flex justify-between items-start">
                                        <span class="product-category-badge text-xs font-bold text-emerald-700 bg-brand-lime/20 px-2.5 py-1 rounded-full uppercase">{{ $product->category }}</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-brand-text-dark group-hover:text-emerald-700 transition-colors">{{ $product->name }}</h3>
                                    <p class="text-sm text-brand-text-gray leading-relaxed font-light line-clamp-3">
                                        {{ $product->description }}
                                    </p>
                                    <div class="pt-2 border-t border-brand-border/30">
                                        <span class="product-price text-lg font-extrabold text-emerald-700">Rp {{ number_format($product->price, 0, ',', '.') }} <span class="text-xs font-normal text-brand-text-gray/80">/ {{ $unit }}</span></span>
                                    </div>
                                </div>
                                <div class="mt-6 pt-4 border-t border-brand-border/40 flex justify-between items-center">
                                    <span class="zero-waste-label text-xs font-semibold text-brand-text-gray/70">Zero-Waste: {{ $product->zero_waste_source }}</span>
                                    <a href="javascript:void(0)" class="diagonal-arrow-link w-8 h-8 rounded-full flex items-center justify-center">
                                        <i class="bi bi-arrow-up-right"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-brand-text-gray font-light">Belum ada produk gurami.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Category 2: JAGUNG -->
                <div class="space-y-8">
                    <div class="flex items-center gap-4 border-b border-brand-border/60 pb-4">
                        <div class="w-10 h-10 rounded-full bg-brand-lime/10 flex items-center justify-center text-emerald-700">
                            <!-- Tulip Icon (Custom SVG) -->
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2C8 2 6 5 6 9c0 3 2 5 6 7 4-2 6-4 6-7 0-4-2-7-6-7z" />
                                <path d="M12 2c1.2 2 1.2 5 0 7M12 2C10.8 4 10.8 7 12 9" opacity="0.7" />
                                <path d="M12 16v6M8 20c2-1 4-1 4 0M16 18c-2-1-4-1-4 0" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold tracking-tight text-brand-text-dark">Hilirisasi Jagung</h2>
                        <span class="text-xs text-brand-text-gray bg-brand-light-gray px-3 py-1 rounded-full font-semibold">{{ $jagungProducts->count() }} Produk Inovatif</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @forelse($jagungProducts as $product)
                            @php
                                $imgUrl = $images[$product->slug] ?? 'https://images.unsplash.com/photo-1536511154448-116c243edf97?w=600&auto=format&fit=crop';
                                $unit = $units[$product->slug] ?? 'pcs';
                                $productData = json_encode([
                                    'name' => $product->name,
                                    'slug' => $product->slug,
                                    'category' => $product->category,
                                    'description' => $product->description,
                                    'price' => $product->price,
                                    'zero_waste_source' => $product->zero_waste_source,
                                    'imageUrl' => $imgUrl,
                                    'unit' => $unit
                                ]);
                            @endphp
                            <div onclick="openProductDetail('{{ addslashes($productData) }}')" class="bg-brand-light-gray border border-brand-border/60 rounded-[28px] p-6 hover:border-brand-lime/50 transition-all duration-300 flex flex-col justify-between group shadow-sm cursor-pointer">
                                <div class="space-y-4">
                                    <div class="w-full h-48 rounded-2xl bg-white flex items-center justify-center overflow-hidden relative shadow-inner">
                                        <img src="{{ $imgUrl }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="flex justify-between items-start">
                                        <span class="product-category-badge text-xs font-bold text-emerald-700 bg-brand-lime/20 px-2.5 py-1 rounded-full uppercase">{{ $product->category }}</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-brand-text-dark group-hover:text-emerald-700 transition-colors">{{ $product->name }}</h3>
                                    <p class="text-sm text-brand-text-gray leading-relaxed font-light line-clamp-3">
                                        {{ $product->description }}
                                    </p>
                                    <div class="pt-2 border-t border-brand-border/30">
                                        <span class="product-price text-lg font-extrabold text-emerald-700">Rp {{ number_format($product->price, 0, ',', '.') }} <span class="text-xs font-normal text-brand-text-gray/80">/ {{ $unit }}</span></span>
                                    </div>
                                </div>
                                <div class="mt-6 pt-4 border-t border-brand-border/40 flex justify-between items-center">
                                    <span class="zero-waste-label text-xs font-semibold text-brand-text-gray/70">Zero-Waste: {{ $product->zero_waste_source }}</span>
                                    <a href="javascript:void(0)" class="diagonal-arrow-link w-8 h-8 rounded-full flex items-center justify-center">
                                        <i class="bi bi-arrow-up-right"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-brand-text-gray font-light">Belum ada produk jagung.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Category 3: KANGKUNG -->
                <div class="space-y-8">
                    <div class="flex items-center gap-4 border-b border-brand-border/60 pb-4">
                        <div class="w-10 h-10 rounded-full bg-brand-lime/10 flex items-center justify-center text-emerald-700">
                            <i class="bi bi-leaf text-xl leading-none"></i>
                        </div>
                        <h2 class="text-2xl font-bold tracking-tight text-brand-text-dark">Hilirisasi Kangkung</h2>
                        <span class="text-xs text-brand-text-gray bg-brand-light-gray px-3 py-1 rounded-full font-semibold">{{ $kangkungProducts->count() }} Produk Inovatif</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @forelse($kangkungProducts as $product)
                            @php
                                $imgUrl = $images[$product->slug] ?? 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?w=600&auto=format&fit=crop';
                                $unit = $units[$product->slug] ?? 'pcs';
                                $productData = json_encode([
                                    'name' => $product->name,
                                    'slug' => $product->slug,
                                    'category' => $product->category,
                                    'description' => $product->description,
                                    'price' => $product->price,
                                    'zero_waste_source' => $product->zero_waste_source,
                                    'imageUrl' => $imgUrl,
                                    'unit' => $unit
                                ]);
                            @endphp
                            <div onclick="openProductDetail('{{ addslashes($productData) }}')" class="bg-brand-light-gray border border-brand-border/60 rounded-[28px] p-6 hover:border-brand-lime/50 transition-all duration-300 flex flex-col justify-between group shadow-sm cursor-pointer">
                                <div class="space-y-4">
                                    <div class="w-full h-48 rounded-2xl bg-white flex items-center justify-center overflow-hidden relative shadow-inner">
                                        <img src="{{ $imgUrl }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="flex justify-between items-start">
                                        <span class="product-category-badge text-xs font-bold text-emerald-700 bg-brand-lime/20 px-2.5 py-1 rounded-full uppercase">{{ $product->category }}</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-brand-text-dark group-hover:text-emerald-700 transition-colors">{{ $product->name }}</h3>
                                    <p class="text-sm text-brand-text-gray leading-relaxed font-light line-clamp-3">
                                        {{ $product->description }}
                                    </p>
                                    <div class="pt-2 border-t border-brand-border/30">
                                        <span class="product-price text-lg font-extrabold text-emerald-700">Rp {{ number_format($product->price, 0, ',', '.') }} <span class="text-xs font-normal text-brand-text-gray/80">/ {{ $unit }}</span></span>
                                    </div>
                                </div>
                                <div class="mt-6 pt-4 border-t border-brand-border/40 flex justify-between items-center">
                                    <span class="zero-waste-label text-xs font-semibold text-brand-text-gray/70">Zero-Waste: {{ $product->zero_waste_source }}</span>
                                    <a href="javascript:void(0)" class="diagonal-arrow-link w-8 h-8 rounded-full flex items-center justify-center">
                                        <i class="bi bi-arrow-up-right"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-brand-text-gray font-light">Belum ada produk kangkung.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </section>
    </main>

    <!-- iOS-style Product Detail Modal -->
    <div id="product-detail-modal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300">
        <div id="modal-content" class="bg-white dark:bg-[#1c1c1e] text-brand-text-dark dark:text-white rounded-[32px] overflow-hidden max-w-4xl w-full shadow-2xl transform scale-90 transition-all duration-300 relative flex flex-col md:flex-row h-[90vh] md:h-auto max-h-[850px]">
            
            <!-- Close Button -->
            <button id="close-modal-btn" class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-black/5 hover:bg-black/10 dark:bg-white/10 dark:hover:bg-white/20 flex items-center justify-center text-brand-text-dark dark:text-white transition-all cursor-pointer">
                <i class="bi bi-x-lg text-lg"></i>
            </button>

            <!-- Left Column: Image -->
            <div class="md:w-1/2 h-64 md:h-[500px] bg-slate-100 dark:bg-neutral-800 relative overflow-hidden flex items-center justify-center">
                <img id="modal-product-img" src="" alt="Product Image" class="w-full h-full object-cover">
            </div>

            <!-- Right Column: Details -->
            <div class="md:w-1/2 p-8 flex flex-col justify-between overflow-y-auto h-[calc(90vh-256px)] md:h-[500px]">
                <div class="space-y-4">
                    <!-- Category and Source Badge -->
                    <div class="flex flex-wrap gap-2 items-center">
                        <span id="modal-product-category" class="text-xs font-bold text-emerald-700 bg-brand-lime/20 px-2.5 py-1 rounded-full uppercase"></span>
                        <span id="modal-product-source" class="text-xs font-semibold text-brand-text-gray/80 bg-brand-light-gray dark:bg-white/10 dark:text-white/80 px-2.5 py-1 rounded-full"></span>
                    </div>

                    <!-- Product Name -->
                    <h2 id="modal-product-name" class="text-2xl md:text-3xl font-extrabold leading-tight text-brand-text-dark dark:text-white"></h2>

                    <!-- Price Box (Emerald Themed) -->
                    <div class="p-4 rounded-2xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-100 dark:border-emerald-900/30 flex flex-col justify-center gap-0.5">
                        <span class="text-[10px] font-bold text-emerald-800 dark:text-emerald-400 uppercase tracking-wider">Harga Total Varian</span>
                        <div class="text-2xl font-black text-emerald-700 dark:text-emerald-400" id="modal-product-price"></div>
                    </div>

                    <!-- Divider -->
                    <hr class="border-brand-border/40 dark:border-white/10">

                    <!-- Quantity Variant Options -->
                    <div class="space-y-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-text-gray/70 dark:text-white/60">Pilih Varian Kuantitas</span>
                        <div id="variant-pills-container" class="flex flex-wrap gap-2">
                            <!-- Injected via Javascript -->
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-1 pt-2">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-brand-text-gray/70 dark:text-white/60">Deskripsi Produk</h4>
                        <p id="modal-product-desc" class="text-sm text-brand-text-gray dark:text-white/70 leading-relaxed font-light"></p>
                    </div>
                </div>

                <!-- E-Commerce Checkout Area -->
                <div class="mt-8 space-y-4 border-t border-brand-border/40 dark:border-white/10 pt-4">
                    <!-- Quantity selector -->
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-text-gray/70 dark:text-white/60">Jumlah Pesanan</span>
                        <div class="flex items-center border border-brand-border dark:border-white/15 rounded-full overflow-hidden">
                            <button id="qty-minus" class="px-3 py-1.5 hover:bg-slate-100 dark:hover:bg-white/10 transition-colors cursor-pointer text-sm font-bold">-</button>
                            <input type="text" id="qty-input" value="1" readonly class="w-10 text-center text-sm font-semibold border-none focus:outline-none bg-transparent">
                            <button id="qty-plus" class="px-3 py-1.5 hover:bg-slate-100 dark:hover:bg-white/10 transition-colors cursor-pointer text-sm font-bold">+</button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button class="flex-1 py-3 px-6 rounded-full bg-brand-lime hover:opacity-90 text-brand-dark font-bold text-sm transition-all shadow-md shadow-brand-lime/10 cursor-pointer text-center">
                            Beli Sekarang
                        </button>
                        <button class="py-3 px-5 rounded-full bg-slate-100 dark:bg-white/10 hover:bg-slate-200 dark:hover:bg-white/20 text-brand-text-dark dark:text-white font-bold text-sm transition-all cursor-pointer">
                            <i class="bi bi-cart3 text-base"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-footer />
    <x-floating-action />

    <!-- JS script for Modal Detail and Dynamic Data rendering -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productModal = document.getElementById('product-detail-modal');
            const modalContent = document.getElementById('modal-content');
            const closeModalBtn = document.getElementById('close-modal-btn');
            
            const modalImg = document.getElementById('modal-product-img');
            const modalCategory = document.getElementById('modal-product-category');
            const modalSource = document.getElementById('modal-product-source');
            const modalName = document.getElementById('modal-product-name');
            const modalPrice = document.getElementById('modal-product-price');
            const modalDesc = document.getElementById('modal-product-desc');

            const qtyMinus = document.getElementById('qty-minus');
            const qtyPlus = document.getElementById('qty-plus');
            const qtyInput = document.getElementById('qty-input');

            const variantsMap = {
                'kg': [
                    { label: '1 kg', multiplier: 1 },
                    { label: '5 kg', multiplier: 4.8 }, // 4% discount
                    { label: '10 kg', multiplier: 9.2 } // 8% discount
                ],
                'botol': [
                    { label: '1 Botol', multiplier: 1 },
                    { label: '6 Botol (Pack)', multiplier: 5.6 },
                    { label: '12 Botol (Dus)', multiplier: 10.8 }
                ],
                'pcs': [
                    { label: '1 Pcs', multiplier: 1 },
                    { label: '10 Pcs', multiplier: 9.2 },
                    { label: '50 Pcs', multiplier: 44.0 }
                ],
                'bungkus': [
                    { label: '1 Bungkus', multiplier: 1 },
                    { label: '5 Bungkus', multiplier: 4.8 },
                    { label: '10 Bungkus', multiplier: 9.2 }
                ],
                'pack': [
                    { label: '1 Pack', multiplier: 1 },
                    { label: '5 Pack', multiplier: 4.8 },
                    { label: '10 Pack', multiplier: 9.2 }
                ]
            };

            let basePrice = 0;
            let currentMultiplier = 1;
            let activeVariantLabel = '';

            // Quantity handlers
            qtyMinus.addEventListener('click', (e) => {
                e.stopPropagation();
                let val = parseInt(qtyInput.value) || 1;
                if (val > 1) {
                    qtyInput.value = val - 1;
                    updatePriceDisplay();
                }
            });
            qtyPlus.addEventListener('click', (e) => {
                e.stopPropagation();
                let val = parseInt(qtyInput.value) || 1;
                qtyInput.value = val + 1;
                updatePriceDisplay();
            });

            // Open Modal
            window.openProductDetail = function(productJson) {
                const product = JSON.parse(productJson);
                basePrice = product.price;
                const unit = product.unit || 'pcs';

                // Set content
                modalImg.setAttribute('src', product.imageUrl);
                modalImg.setAttribute('alt', product.name);
                modalCategory.textContent = product.category;
                modalSource.textContent = `Zero-Waste: ${product.zero_waste_source}`;
                modalName.textContent = product.name;
                modalDesc.textContent = product.description;

                // Build Variant Pills
                const variantPillsContainer = document.getElementById('variant-pills-container');
                variantPillsContainer.innerHTML = '';
                
                const productVariants = variantsMap[unit] || [{ label: `1 ${unit}`, multiplier: 1 }];
                currentMultiplier = productVariants[0].multiplier;
                activeVariantLabel = productVariants[0].label;

                productVariants.forEach((variant, index) => {
                    const pill = document.createElement('button');
                    pill.className = `variant-pill px-4 py-2 text-xs font-bold rounded-full border transition-all cursor-pointer ${
                        index === 0 
                        ? 'bg-brand-lime text-brand-dark border-brand-lime shadow-sm' 
                        : 'bg-transparent text-brand-text-dark dark:text-white border-brand-border dark:border-white/20 hover:bg-slate-50 dark:hover:bg-white/5'
                    }`;
                    pill.textContent = variant.label;
                    
                    pill.addEventListener('click', (e) => {
                        e.stopPropagation();
                        // Reset all pills
                        document.querySelectorAll('.variant-pill').forEach(p => {
                            p.className = 'variant-pill px-4 py-2 text-xs font-bold rounded-full border transition-all cursor-pointer bg-transparent text-brand-text-dark dark:text-white border-brand-border dark:border-white/20 hover:bg-slate-50 dark:hover:bg-white/5';
                        });
                        // Activate clicked pill
                        pill.className = 'variant-pill px-4 py-2 text-xs font-bold rounded-full border transition-all cursor-pointer bg-brand-lime text-brand-dark border-brand-lime shadow-sm';
                        
                        currentMultiplier = variant.multiplier;
                        activeVariantLabel = variant.label;
                        updatePriceDisplay();
                    });

                    variantPillsContainer.appendChild(pill);
                });

                // Reset quantity
                qtyInput.value = "1";
                updatePriceDisplay();

                // Anim open
                productModal.classList.remove('opacity-0', 'pointer-events-none');
                productModal.classList.add('opacity-100', 'pointer-events-auto');
                modalContent.classList.remove('scale-90');
                modalContent.classList.add('scale-100');
                document.body.style.overflow = 'hidden'; // Lock background scroll
            };

            function updatePriceDisplay() {
                const qty = parseInt(qtyInput.value) || 1;
                const unitPrice = basePrice * currentMultiplier;
                const totalPrice = unitPrice * qty;

                // Format: e.g. Rp 35.000 (1 Bungkus x 1)
                modalPrice.innerHTML = `${formatRupiah(totalPrice)} <span class="text-sm font-normal text-brand-text-gray/70 dark:text-white/60">(${activeVariantLabel} &times; ${qty})</span>`;
            }

            // Close Modal
            function closeModal() {
                productModal.classList.add('opacity-0', 'pointer-events-none');
                productModal.classList.remove('opacity-100', 'pointer-events-auto');
                modalContent.classList.add('scale-90');
                modalContent.classList.remove('scale-100');
                document.body.style.overflow = ''; // Unlock background scroll
            }

            closeModalBtn.addEventListener('click', closeModal);
            productModal.addEventListener('click', (e) => {
                if (e.target === productModal) {
                    closeModal();
                }
            });

            function formatRupiah(number) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(number);
            }
        });
    </script>

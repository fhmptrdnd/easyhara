<!-- Header Navigation -->
<header class="fixed top-0 inset-x-0 z-50 transition-all duration-300 py-6" id="main-header">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <nav class="flex items-center justify-between" id="nav-container">
            <!-- Logo & Contact Info -->
            <div class="flex items-center gap-6">
                <a href="#" class="flex items-center gap-2 group">
                    <!-- SVG Leaf Logo Icon with green-yellow gradient -->
                    <img src="{{ asset('images/logo_jgtr.png') }}" alt="Jagatara Logo" class="w-7 h-7 rounded-full object-cover transition-transform duration-300 group-hover:scale-105">
                    <span class="text-2xl font-bold tracking-tight text-white font-sans">
                        Jagatara
                    </span>
                </a>

                <!-- Vertical Divider -->
                <div class="hidden lg:block h-6 w-px bg-white/20"></div>

                <!-- Contact Info (BEM Fasilkom UNEJ) -->
                <div class="hidden lg:flex flex-col text-[10px] text-white/50 leading-tight font-sans tracking-wide">
                    <span>BEM Fasilkom UNEJ</span>
                    <span>bem.fasilkom@unej.ac.id</span>
                </div>
            </div>

            <!-- Desktop Nav Links (Indonesian Context) -->
            <div class="hidden md:flex items-center gap-10">
                <a href="/" class="text-sm font-medium text-white/80 hover:text-white transition-colors duration-200">Beranda</a>
                <a href="/produk" class="text-sm font-medium text-white/80 hover:text-white transition-colors duration-200">Produk</a>
                <a href="/tentang" class="text-sm font-medium text-white/80 hover:text-white transition-colors duration-200">Tim Kami</a>
                <a href="/desa" class="text-sm font-medium text-white/80 hover:text-white transition-colors duration-200">Desa Rowokangkung</a>
            </div>

            <!-- Desktop Call To Action -->
            <div class="hidden md:flex items-center gap-6">
                <a href="#signup" class="text-sm font-medium text-white/80 hover:text-white transition-colors duration-200">Daftar</a>
                <a href="#login" class="inline-flex items-center gap-1.5 px-6 py-2.5 rounded-full bg-gradient-to-r from-brand-lime to-[#a3e635] hover:opacity-95 text-sm font-bold text-brand-dark transition-all duration-300 shadow-md shadow-brand-lime/10">
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-dark"></span>
                    Masuk
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button type="button" class="md:hidden p-2 rounded-xl text-white hover:text-brand-lime focus:outline-none" id="mobile-menu-btn" aria-label="Toggle Menu">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="menu-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="hidden md:hidden px-6 pb-6 pt-4" id="mobile-menu">
        <div class="bg-brand-dark/95 border border-white/10 rounded-2xl p-5 flex flex-col gap-4 shadow-2xl backdrop-blur-lg">
            <a href="/" class="text-base font-medium text-white/80 hover:text-brand-lime px-3 py-2 rounded-lg hover:bg-white/5 transition-all">Beranda</a>
            <a href="/produk" class="text-base font-medium text-white/80 hover:text-brand-lime px-3 py-2 rounded-lg hover:bg-white/5 transition-all">Produk</a>
            <a href="/tentang" class="text-base font-medium text-white/80 hover:text-brand-lime px-3 py-2 rounded-lg hover:bg-white/5 transition-all">Tim Kami</a>
            <a href="/desa" class="text-base font-medium text-white/80 hover:text-brand-lime px-3 py-2 rounded-lg hover:bg-white/5 transition-all">Desa Rowokangkung</a>
            <hr class="border-white/10 my-1">
            <div class="flex items-center justify-between px-3 py-2">
                <a href="#signup" class="text-base font-medium text-white/80 hover:text-brand-lime">Daftar</a>
                <a href="#login" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-full bg-gradient-to-r from-brand-lime to-[#a3e635] hover:opacity-95 text-sm font-bold text-brand-dark transition-all">
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-dark"></span>
                    Masuk
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            if (menu.classList.contains('hidden')) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
            }
        });

        // Sticky Header scroll listener with backdrop-blur
        const header = document.getElementById('main-header');
        function handleScroll() {
            if (window.scrollY > 20) {
                header.classList.remove('py-6');
                header.classList.add('py-4', 'bg-brand-dark/85', 'backdrop-blur-md', 'border-b', 'border-white/10', 'shadow-lg');
            } else {
                header.classList.add('py-6');
                header.classList.remove('py-4', 'bg-brand-dark/85', 'backdrop-blur-md', 'border-b', 'border-white/10', 'shadow-lg');
            }
        }
        window.addEventListener('scroll', handleScroll);
        handleScroll();
    });
</script>

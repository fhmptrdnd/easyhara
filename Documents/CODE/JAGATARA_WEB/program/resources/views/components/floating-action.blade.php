<!-- Global CSS overrides for Light/Dark Mode & Page Load Animations -->
<style>
    body.dark-mode {
        background-color: #0b150b !important;
        color: #ffffff !important;
    }
    body.dark-mode .bg-white {
        background-color: #0b150b !important;
        color: #ffffff !important;
    }
    body.dark-mode .text-brand-text-dark {
        color: #ffffff !important;
    }
    body.dark-mode .text-brand-text-gray {
        color: rgba(255, 255, 255, 0.6) !important;
    }
    body.dark-mode .bg-brand-light-gray {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
    }
    body.dark-mode .border-brand-border,
    body.dark-mode .border-brand-border\/60 {
        border-color: rgba(255, 255, 255, 0.1) !important;
    }
    body.dark-mode .border-b {
        border-color: rgba(255, 255, 255, 0.1) !important;
    }
    body.dark-mode footer {
        background-color: #070e07 !important;
    }
    body.dark-mode #tab-link {
        color: #ffffff !important;
        border-color: rgba(255, 255, 255, 0.4) !important;
    }
    body.dark-mode #tab-link:hover {
        background-color: #ffffff !important;
        color: #0b150b !important;
        border-color: #ffffff !important;
    }

    /* Floating Action Button toggles */
    #menu-sun-icon {
        display: none;
    }
    #menu-moon-icon {
        display: block;
    }
    body.dark-mode #menu-sun-icon {
        display: block;
    }
    body.dark-mode #menu-moon-icon {
        display: none;
    }

    /* AssistiveTouch Active State micro-animation */
    #assistive-touch-btn.menu-open span {
        border-color: rgba(255, 255, 255, 0.65);
        transform: rotate(45deg);
    }
    #assistive-touch-btn.menu-open span span {
        background-color: rgba(255, 255, 255, 1);
        transform: scale(0.85);
    }

    /* Page Entrance Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .reveal-on-load {
        opacity: 0;
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .delay-75 { animation-delay: 75ms; }
    .delay-100 { animation-delay: 100ms; }
    .delay-150 { animation-delay: 150ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
    .delay-400 { animation-delay: 400ms; }
    .delay-500 { animation-delay: 500ms; }
    .delay-600 { animation-delay: 600ms; }
</style>

<!-- Floating iOS-style Assistive Touch Menu -->
<div class="fixed bottom-6 right-6 z-50">
    
    <!-- Pop-up iOS-style menu showing ONLY icons -->
    <div id="ios-popup-menu" class="absolute bottom-16 right-0 bg-brand-dark/95 border border-white/15 backdrop-blur-xl rounded-full p-2 shadow-2xl flex gap-2 transform scale-90 opacity-0 pointer-events-none transition-all duration-300 origin-bottom-right">
        <!-- Toggle Dark/Light Mode -->
        <button id="toggle-mode-btn" class="group relative w-12 h-12 flex items-center justify-center bg-white/10 hover:bg-white/20 rounded-full transition-all text-white cursor-pointer" aria-label="Ganti Mode Warna">
            <i id="menu-sun-icon" class="bi bi-sun text-xl text-brand-lime"></i>
            <i id="menu-moon-icon" class="bi bi-moon-stars text-xl text-brand-lime"></i>
            <!-- Tooltip -->
            <span class="absolute bottom-14 left-1/2 -translate-x-1/2 px-2.5 py-1 bg-brand-dark border border-white/10 text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap shadow-md">
                Ganti Mode
            </span>
        </button>
        
        <!-- Toggle AI Chatbot -->
        <button id="open-chat-btn" class="group relative w-12 h-12 flex items-center justify-center bg-white/10 hover:bg-white/20 rounded-full transition-all text-white cursor-pointer" aria-label="Tanya AI Chatbot">
            <i class="bi bi-robot text-xl text-brand-lime"></i>
            <!-- Tooltip -->
            <span class="absolute bottom-14 left-1/2 -translate-x-1/2 px-2.5 py-1 bg-brand-dark border border-white/10 text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap shadow-md">
                Jagatara AI
            </span>
        </button>
    </div>

    <!-- Main AssistiveTouch style FAB (Showing iOS AssistiveTouch Icon) -->
    <button id="assistive-touch-btn" class="w-14 h-14 bg-black/60 border border-white/20 backdrop-blur-md rounded-full flex items-center justify-center shadow-2xl hover:scale-105 active:scale-95 transition-all cursor-pointer relative text-white" aria-label="Menu Aksesibilitas">
        <span class="w-9 h-9 border-2 border-white/25 rounded-full flex items-center justify-center transition-all duration-300">
            <span class="w-5 h-5 bg-white/80 rounded-full shadow-inner transition-all duration-300"></span>
        </span>
    </button>
</div>
<!-- Separated AI Chatbot Window Component -->
<x-ai-chatbot />

<!-- JS controller logic -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const assistiveTouchBtn = document.getElementById('assistive-touch-btn');
        const iosPopupMenu = document.getElementById('ios-popup-menu');
        const toggleModeBtn = document.getElementById('toggle-mode-btn');

        // Toggle popup menu
        assistiveTouchBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = !iosPopupMenu.classList.contains('pointer-events-none');
            if (isOpen) {
                closePopupMenu();
            } else {
                openPopupMenu();
            }
        });

        // Close menu on outside click
        document.addEventListener('click', () => {
            closePopupMenu();
        });

        function openPopupMenu() {
            iosPopupMenu.classList.remove('pointer-events-none', 'scale-90', 'opacity-0');
            iosPopupMenu.classList.add('pointer-events-auto', 'scale-100', 'opacity-100');
            assistiveTouchBtn.classList.add('menu-open');
        }

        function closePopupMenu() {
            iosPopupMenu.classList.add('pointer-events-none', 'scale-90', 'opacity-0');
            iosPopupMenu.classList.remove('pointer-events-auto', 'scale-100', 'opacity-100');
            assistiveTouchBtn.classList.remove('menu-open');
        }

        // Light/Dark Mode Logic
        if (localStorage.getItem('mode') === 'dark') {
            document.body.classList.add('dark-mode');
        }
        toggleModeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            document.body.classList.toggle('dark-mode');
            const mode = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
            localStorage.setItem('mode', mode);
            closePopupMenu();
        });
    });
</script>

<!-- Jagatara AI Chatbot Draggable Component -->
<div id="ai-chat-window" class="fixed bottom-6 right-6 sm:right-8 w-[92vw] sm:w-[380px] h-[520px] bg-white border border-brand-border rounded-[32px] shadow-2xl flex flex-col z-50 overflow-hidden transform scale-90 opacity-0 pointer-events-none transition-all duration-300 origin-bottom-right">

    <!-- Chat Header (Drag Handle) -->
    <div id="ai-chat-header" class="bg-brand-dark p-4 flex items-center justify-between text-white border-b border-white/5 cursor-grab select-none active:cursor-grabbing shrink-0">
        <div class="flex items-center gap-2">
            <!-- Drag Handle Indicator Icon -->
            <div class="text-white/40 hover:text-white/80 transition-colors mr-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <!-- Grip vertical dots icon -->
                    <circle cx="9" cy="5" r="1.5"/>
                    <circle cx="15" cy="5" r="1.5"/>
                    <circle cx="9" cy="12" r="1.5"/>
                    <circle cx="15" cy="12" r="1.5"/>
                    <circle cx="9" cy="19" r="1.5"/>
                    <circle cx="15" cy="19" r="1.5"/>
                </svg>
            </div>
            <div class="w-8 h-8 rounded-full bg-brand-lime flex items-center justify-center text-brand-dark font-bold text-sm shrink-0">
                <i class="bi bi-robot text-base leading-none"></i>
            </div>
            <div>
                <h3 class="font-bold text-sm leading-tight text-white flex items-center gap-1.5">
                    Jagatara AI
                </h3>
                <span class="text-[10px] text-brand-lime flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-lime animate-pulse"></span>
                    Online
                </span>
            </div>
        </div>
        <div class="flex items-center gap-1 shrink-0">
            <!-- Reset Button to clear chat history -->
            <button id="reset-chat-btn" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all text-white/80 hover:text-white cursor-pointer" title="Reset Percakapan">
                <i class="bi bi-arrow-counterclockwise text-sm"></i>
            </button>
            <!-- Toggle Suggestions Button -->
            <button id="toggle-suggestions-btn" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all text-white/80 hover:text-white cursor-pointer" title="Tampilkan/Sembunyikan Saran">
                <i class="bi bi-patch-question text-sm"></i>
            </button>
            <!-- Close Button -->
            <button id="close-chat-btn" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all text-white cursor-pointer" aria-label="Tutup Chat">
                <i class="bi bi-x-lg text-sm"></i>
            </button>
        </div>
    </div>

    <!-- Chat Messages log -->
    <div id="chat-messages" class="flex-1 p-4 overflow-y-auto space-y-4 bg-brand-light-gray/40 text-brand-text-dark text-sm scroll-smooth">
        <!-- Initial Greeting -->
        <div class="flex items-start gap-2.5 max-w-[85%]">
            <div class="w-7 h-7 rounded-full bg-brand-dark flex items-center justify-center text-xs shrink-0 text-white">
                <i class="bi bi-robot"></i>
            </div>
            <div class="bg-white border border-brand-border p-3.5 rounded-2xl rounded-tl-none leading-relaxed shadow-sm dark:bg-brand-dark dark:border-white/10 dark:text-white">
                Halo! Saya <strong>Jagatara AI</strong>. Saya siap membantu Anda menjelaskan inovasi produk zero-waste di Desa Rowokangkung.
            </div>
        </div>
    </div>

    <!-- Predefined Quick Questions -->
    <div id="ai-chat-suggestions" class="p-3 bg-white border-t border-brand-border/40 flex items-center justify-between gap-2 dark:bg-brand-dark dark:border-white/10 shrink-0 transition-all duration-300">
        <div class="flex-1 flex flex-wrap gap-2 overflow-x-auto whitespace-nowrap scrollbar-none">
            <button onclick="sendQuickQuestion('Apa saja produk Gurami?')" class="px-3 py-1.5 bg-slate-100 dark:bg-white/10 hover:bg-brand-lime/25 dark:hover:bg-brand-lime/25 border border-slate-200 dark:border-white/10 text-xs font-semibold rounded-full text-brand-text-dark dark:text-white transition-all cursor-pointer">Apa saja produk Gurami?</button>
            <button onclick="sendQuickQuestion('Bagaimana konsep zero-waste?')" class="px-3 py-1.5 bg-slate-100 dark:bg-white/10 hover:bg-brand-lime/25 dark:hover:bg-brand-lime/25 border border-slate-200 dark:border-white/10 text-xs font-semibold rounded-full text-brand-text-dark dark:text-white transition-all cursor-pointer">Bagaimana konsep zero-waste?</button>
            <button onclick="sendQuickQuestion('Siapa saja anggota tim Jagatara?')" class="px-3 py-1.5 bg-slate-100 dark:bg-white/10 hover:bg-brand-lime/25 dark:hover:bg-brand-lime/25 border border-slate-200 dark:border-white/10 text-xs font-semibold rounded-full text-brand-text-dark dark:text-white transition-all cursor-pointer">Siapa saja anggota tim?</button>
        </div>
        <button id="close-suggestions-btn" class="text-brand-text-gray hover:text-brand-text-dark dark:text-white/60 dark:hover:text-white shrink-0 w-6 h-6 rounded-full flex items-center justify-center bg-slate-100 dark:bg-white/10 cursor-pointer" title="Sembunyikan Saran">
            <i class="bi bi-x text-[10px]"></i>
        </button>
    </div>

    <!-- Chat Input Area -->
    <div class="p-4 bg-white border-t border-brand-border/50 flex gap-2 items-center dark:bg-brand-dark dark:border-white/15 shrink-0">
        <input type="text" id="chat-input" placeholder="Tanyakan sesuatu..." class="flex-1 px-4 py-2.5 bg-brand-light-gray dark:bg-white/5 border border-brand-border dark:border-white/10 rounded-full focus:outline-none focus:border-brand-lime text-sm text-brand-text-dark dark:text-white">
        <button id="send-chat-btn" class="w-10 h-10 rounded-full bg-brand-dark dark:bg-brand-lime dark:text-brand-dark text-white flex items-center justify-center hover:opacity-90 transition-all cursor-pointer">
            <i class="bi bi-send text-sm"></i>
        </button>
    </div>

    <!-- Resize Handle -->
    <div id="ai-chat-resize-handle" class="absolute bottom-1 right-1 w-4 h-4 cursor-se-resize z-50 flex items-end justify-end select-none">
        <svg class="w-3.5 h-3.5 text-slate-400 dark:text-white/30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
            <line x1="22" y1="6" x2="6" y2="22" />
            <line x1="22" y1="12" x2="12" y2="22" />
            <line x1="22" y1="18" x2="18" y2="22" />
        </svg>
    </div>

</div>

<!-- Styles and scripts inside the component -->
<style>
    /* CSS overrides for dark mode inside Chatbot */
    body.dark-mode #ai-chat-window {
        background-color: var(--color-brand-dark, #0f1c0f) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important;
    }

    body.dark-mode #chat-messages {
        background-color: rgba(0, 0, 0, 0.2) !important;
        color: #ffffff !important;
    }

    /* Typing Indicator Animation */
    .typing-dot {
        width: 6px;
        height: 6px;
        background-color: currentColor;
        border-radius: 50%;
        animation: typing-bounce 1.4s infinite ease-in-out both;
    }
    .typing-dot:nth-child(1) { animation-delay: -0.32s; }
    .typing-dot:nth-child(2) { animation-delay: -0.16s; }

    @keyframes typing-bounce {
        0%, 80%, 100% { transform: scale(0); }
        40% { transform: scale(1.0); }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chatWindow = document.getElementById('ai-chat-window');
        const chatHeader = document.getElementById('ai-chat-header');
        const openChatBtn = document.getElementById('open-chat-btn');
        const closeChatBtn = document.getElementById('close-chat-btn');
        const resetChatBtn = document.getElementById('reset-chat-btn');
        const sendChatBtn = document.getElementById('send-chat-btn');
        const chatInput = document.getElementById('chat-input');
        const chatMessages = document.getElementById('chat-messages');

        let chatHistory = []; // Keeps track of chat conversations for Gemini context
        let isDragging = false;
        let startX, startY;
        let initialX, initialY;

        // --- Suggestion Panel Controls ---
        const toggleSuggestionsBtn = document.getElementById('toggle-suggestions-btn');
        const closeSuggestionsBtn = document.getElementById('close-suggestions-btn');
        const chatSuggestions = document.getElementById('ai-chat-suggestions');

        if (closeSuggestionsBtn) {
            closeSuggestionsBtn.addEventListener('click', () => {
                chatSuggestions.style.display = 'none';
            });
        }

        if (toggleSuggestionsBtn) {
            toggleSuggestionsBtn.addEventListener('click', () => {
                if (chatSuggestions.style.display === 'none') {
                    chatSuggestions.style.display = 'flex';
                } else {
                    chatSuggestions.style.display = 'none';
                }
            });
        }

        // --- Resize Functionality ---
        const resizeHandle = document.getElementById('ai-chat-resize-handle');
        let startWidth, startHeight;

        if (resizeHandle) {
            resizeHandle.addEventListener('mousedown', initResize);
            resizeHandle.addEventListener('touchstart', initResize, { passive: true });
        }

        function initResize(e) {
            e.stopPropagation(); // Stop drag event when resizing
            
            const clientX = e.type === 'touchstart' ? e.touches[0].clientX : e.clientX;
            const clientY = e.type === 'touchstart' ? e.touches[0].clientY : e.clientY;
            
            startX = clientX;
            startY = clientY;
            
            const rect = chatWindow.getBoundingClientRect();
            startWidth = rect.width;
            startHeight = rect.height;
            
            // Set position parameters if not yet fixed
            if (chatWindow.style.left === '' || chatWindow.style.top === '') {
                chatWindow.style.left = rect.left + 'px';
                chatWindow.style.top = rect.top + 'px';
                chatWindow.style.right = 'auto';
                chatWindow.style.bottom = 'auto';
                chatWindow.style.margin = '0';
            }
            
            document.addEventListener('mousemove', startResizing);
            document.addEventListener('touchmove', startResizing, { passive: false });
            document.addEventListener('mouseup', stopResizing);
            document.addEventListener('touchend', stopResizing);
        }

        function startResizing(e) {
            if (e.cancelable) e.preventDefault();
            
            const clientX = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
            const clientY = e.type === 'touchmove' ? e.touches[0].clientY : e.clientY;
            
            const dx = clientX - startX;
            const dy = clientY - startY;
            
            let newWidth = startWidth + dx;
            let newHeight = startHeight + dy;
            
            // Boundary constraints
            const minWidth = 280;
            const maxWidth = window.innerWidth - chatWindow.getBoundingClientRect().left - 10;
            const minHeight = 350;
            const maxHeight = window.innerHeight - chatWindow.getBoundingClientRect().top - 10;
            
            newWidth = Math.max(minWidth, Math.min(newWidth, maxWidth));
            newHeight = Math.max(minHeight, Math.min(newHeight, maxHeight));
            
            chatWindow.style.width = newWidth + 'px';
            chatWindow.style.height = newHeight + 'px';
        }

        function stopResizing() {
            document.removeEventListener('mousemove', startResizing);
            document.removeEventListener('touchmove', startResizing);
            document.removeEventListener('mouseup', stopResizing);
            document.removeEventListener('touchend', stopResizing);
        }

        // --- Drag & Drop Functionality ---
        chatHeader.addEventListener('mousedown', dragStart);
        chatHeader.addEventListener('touchstart', dragStart, { passive: true });

        function dragStart(e) {
            // Do not drag if clicking on buttons
            if (e.target.closest('#close-chat-btn') || e.target.closest('#reset-chat-btn')) return;

            isDragging = true;
            const clientX = e.type === 'touchstart' ? e.touches[0].clientX : e.clientX;
            const clientY = e.type === 'touchstart' ? e.touches[0].clientY : e.clientY;

            const rect = chatWindow.getBoundingClientRect();
            startX = clientX;
            startY = clientY;
            initialX = rect.left;
            initialY = rect.top;

            // Fix elements width/height before changing absolute positions
            chatWindow.style.width = rect.width + 'px';
            chatWindow.style.height = rect.height + 'px';
            chatWindow.style.right = 'auto';
            chatWindow.style.bottom = 'auto';
            chatWindow.style.margin = '0';

            // Set position coordinates
            chatWindow.style.left = initialX + 'px';
            chatWindow.style.top = initialY + 'px';

            document.addEventListener('mousemove', dragMove);
            document.addEventListener('touchmove', dragMove, { passive: false });
            document.addEventListener('mouseup', dragEnd);
            document.addEventListener('touchend', dragEnd);

            chatHeader.style.cursor = 'grabbing';
        }

        function dragMove(e) {
            if (!isDragging) return;
            if (e.cancelable) e.preventDefault();

            const clientX = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
            const clientY = e.type === 'touchmove' ? e.touches[0].clientY : e.clientY;

            const dx = clientX - startX;
            const dy = clientY - startY;

            let newX = initialX + dx;
            let newY = initialY + dy;

            // Boundary constraints
            const rect = chatWindow.getBoundingClientRect();
            const maxX = window.innerWidth - rect.width;
            const maxY = window.innerHeight - rect.height;

            newX = Math.max(0, Math.min(newX, maxX));
            newY = Math.max(0, Math.min(newY, maxY));

            chatWindow.style.left = newX + 'px';
            chatWindow.style.top = newY + 'px';
        }

        function dragEnd() {
            isDragging = false;
            document.removeEventListener('mousemove', dragMove);
            document.removeEventListener('touchmove', dragMove);
            document.removeEventListener('mouseup', dragEnd);
            document.removeEventListener('touchend', dragEnd);
            chatHeader.style.cursor = 'grab';
        }

        // --- Chat Open/Close Logic ---
        if (openChatBtn) {
            openChatBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                // Close floating popup menu if it exists
                const iosPopupMenu = document.getElementById('ios-popup-menu');
                if (iosPopupMenu) {
                    iosPopupMenu.classList.add('pointer-events-none', 'scale-90', 'opacity-0');
                    iosPopupMenu.classList.remove('pointer-events-auto', 'scale-100', 'opacity-100');
                }
                const assistiveTouchBtn = document.getElementById('assistive-touch-btn');
                if (assistiveTouchBtn) {
                    assistiveTouchBtn.classList.remove('menu-open');
                }

                // Show chatbot window
                chatWindow.classList.remove('pointer-events-none', 'scale-90', 'opacity-0');
                chatWindow.classList.add('pointer-events-auto', 'scale-100', 'opacity-100');

                // Focus input field
                setTimeout(() => chatInput.focus(), 250);
            });
        }

        if (closeChatBtn) {
            closeChatBtn.addEventListener('click', () => {
                chatWindow.classList.add('pointer-events-none', 'scale-90', 'opacity-0');
                chatWindow.classList.remove('pointer-events-auto', 'scale-100', 'opacity-100');
            });
        }

        // --- Reset Conversation ---
        resetChatBtn.addEventListener('click', () => {
            if (confirm('Apakah Anda ingin mereset riwayat percakapan?')) {
                chatHistory = [];
                chatMessages.innerHTML = `
                    <div class="flex items-start gap-2.5 max-w-[85%]">
                        <div class="w-7 h-7 rounded-full bg-brand-dark flex items-center justify-center text-xs shrink-0 text-white">
                            <i class="bi bi-robot"></i>
                        </div>
                        <div class="bg-white border border-brand-border p-3.5 rounded-2xl rounded-tl-none leading-relaxed shadow-sm dark:bg-brand-dark dark:border-white/10 dark:text-white">
                            Halo! Riwayat percakapan telah direset. Ada yang bisa saya bantu kembali terkait inovasi zero-waste di Desa Rowokangkung?
                        </div>
                    </div>
                `;
            }
        });

        // --- Message Sending Logic ---
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        sendChatBtn.addEventListener('click', sendMessage);

        function sendMessage() {
            const text = chatInput.value.trim();
            if (!text) return;

            appendMessage(text, true);
            chatInput.value = '';

            // Show typing indicator
            const typingIndicator = showTypingIndicator();

            // Call Laravel backend API
            fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    message: text,
                    history: chatHistory
                })
            })
            .then(res => res.json())
            .then(data => {
                // Remove typing indicator
                typingIndicator.remove();

                if (data.status === 'success') {
                    appendMessage(data.reply, false);
                    // Push to local history
                    chatHistory.push({ role: 'user', text: text });
                    chatHistory.push({ role: 'model', text: data.reply });
                } else {
                    appendMessage(data.reply || 'Maaf, terjadi masalah saat memproses permintaan Anda.', false);
                }
            })
            .catch(err => {
                console.error(err);
                typingIndicator.remove();
                appendMessage('Gagal menghubungi server. Pastikan koneksi internet Anda aktif.', false);
            });
        }

        window.sendQuickQuestion = function (question) {
            chatInput.value = question;
            sendMessage();
        };

        // --- Helper: Render Message ---
        function appendMessage(text, isUser) {
            const wrapper = document.createElement('div');
            wrapper.className = isUser ? 'flex items-start justify-end gap-2.5' : 'flex items-start gap-2.5 max-w-[85%]';

            let contentHtml = '';
            if (isUser) {
                contentHtml = `<div class="bg-brand-lime text-brand-dark p-3.5 rounded-2xl rounded-tr-none leading-relaxed shadow-sm">${escapeHtml(text)}</div>`;
            } else {
                const parsedContent = formatMarkdown(text);
                contentHtml = `
                    <div class="w-7 h-7 rounded-full bg-brand-dark flex items-center justify-center text-xs shrink-0 text-white">
                        <i class="bi bi-robot"></i>
                    </div>
                    <div class="bg-white border border-brand-border p-3.5 rounded-2xl rounded-tl-none leading-relaxed shadow-sm dark:bg-brand-dark dark:border-white/10 dark:text-white">
                        ${parsedContent}
                    </div>
                `;
            }

            wrapper.innerHTML = contentHtml;
            chatMessages.appendChild(wrapper);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // --- Helper: Typing Indicator ---
        function showTypingIndicator() {
            const wrapper = document.createElement('div');
            wrapper.id = 'typing-indicator';
            wrapper.className = 'flex items-start gap-2.5 max-w-[85%]';
            wrapper.innerHTML = `
                <div class="w-7 h-7 rounded-full bg-brand-dark flex items-center justify-center text-xs shrink-0 text-white">
                    <i class="bi bi-robot"></i>
                </div>
                <div class="bg-white border border-brand-border p-3.5 rounded-2xl rounded-tl-none leading-relaxed shadow-sm dark:bg-brand-dark dark:border-white/10 dark:text-white flex items-center gap-1">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            `;
            chatMessages.appendChild(wrapper);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            return wrapper;
        }

        // --- Helper: Escape HTML Utility (Prevent XSS for user text) ---
        function escapeHtml(unsafe) {
            return unsafe
                 .replace(/&/g, "&amp;")
                 .replace(/</g, "&lt;")
                 .replace(/>/g, "&gt;")
                 .replace(/"/g, "&quot;")
                 .replace(/'/g, "&#039;");
        }

        // --- Helper: Markdown Parser for AI response ---
        function formatMarkdown(text) {
            if (!text) return '';

            // Temporary markers for line breaks and lists
            let html = text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;");

            // Allow rendering of simple markup like <code>, <strong>, <br> for errors
            html = html
                .replace(/&lt;code&gt;/g, '<code>').replace(/&lt;\/code&gt;/g, '</code>')
                .replace(/&lt;strong&gt;/g, '<strong>').replace(/&lt;\/strong&gt;/g, '</strong>')
                .replace(/&lt;br&gt;/g, '<br>');

            // Format markdown code block: ``` ... ```
            html = html.replace(/```([^`]+)```/g, '<pre class="bg-slate-100 dark:bg-black/20 p-2.5 rounded-lg font-mono text-xs overflow-x-auto my-2">$1</pre>');

            // Format inline code: `code`
            html = html.replace(/`([^`]+)`/g, '<code class="bg-slate-100 dark:bg-black/25 px-1.5 py-0.5 rounded font-mono text-xs text-rose-500">$1</code>');

            // Bold: **text**
            html = html.replace(/\*\*([^*]+)\*\*/g, '<strong class="font-bold">$1</strong>');

            // Italic: *text*
            html = html.replace(/\*([^*]+)\*/g, '<em class="italic">$1</em>');

            // Split into lines to parse lists and paragraphs properly
            const lines = html.split('\n');
            let inList = false;
            let formattedLines = [];

            for (let line of lines) {
                let trimmed = line.trim();

                // Bullet points
                if (trimmed.startsWith('- ') || trimmed.startsWith('* ') || trimmed.startsWith('• ')) {
                    if (!inList) {
                        formattedLines.push('<ul class="list-disc pl-5 space-y-1 my-1.5">');
                        inList = true;
                    }
                    const content = trimmed.replace(/^[-*•]\s+/, '');
                    formattedLines.push(`<li>${content}</li>`);
                } else {
                    if (inList) {
                        formattedLines.push('</ul>');
                        inList = false;
                    }
                    if (trimmed !== '') {
                        formattedLines.push(`<p class="mb-2 last:mb-0">${line}</p>`);
                    } else {
                        formattedLines.push('<div class="h-2"></div>');
                    }
                }
            }

            if (inList) {
                formattedLines.push('</ul>');
            }

            return formattedLines.join('\n');
        }
    });
</script>

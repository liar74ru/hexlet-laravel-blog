@if(session()->has('success') || session()->has('error') || session()->has('warning') || session()->has('info') || $errors->any())
    <div class="flash-messages" id="flash-messages">
        @if(session()->has('success'))
            <div class="flash-message success">
                <button class="flash-close" onclick="closeFlash(this)">×</button>
                <div class="flash-title">
                    <span class="flash-icon">✅</span>
                    Успех!
                </div>
                <div class="flash-content">{{ session('success') }}</div>
            </div>
        @endif

        {{-- Блок для ошибок валидации --}}
        @if($errors->any())
            <div class="flash-message error">
                <button class="flash-close" onclick="closeFlash(this)">×</button>
                <div class="flash-title">
                    <span class="flash-icon">❌</span>
                    Ошибки валидации!
                </div>
                <div class="flash-content">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- Блок для обычных ошибок (не валидация) --}}
        @if(session()->has('error') && !$errors->any())
            <div class="flash-message error">
                <button class="flash-close" onclick="closeFlash(this)">×</button>
                <div class="flash-title">
                    <span class="flash-icon">❌</span>
                    Ошибка!
                </div>
                <div class="flash-content">{{ session('error') }}</div>
            </div>
        @endif

        @if(session()->has('warning'))
            <div class="flash-message warning">
                <button class="flash-close" onclick="closeFlash(this)">×</button>
                <div class="flash-title">
                    <span class="flash-icon">⚠️</span>
                    Внимание!
                </div>
                <div class="flash-content">{{ session('warning') }}</div>
            </div>
        @endif

        @if(session()->has('info'))
            <div class="flash-message info">
                <button class="flash-close" onclick="closeFlash(this)">×</button>
                <div class="flash-title">
                    <span class="flash-icon">ℹ️</span>
                    Информация
                </div>
                <div class="flash-content">{{ session('info') }}</div>
            </div>
        @endif
    </div>

    <script>
        function closeFlash(button) {
            const flashMessage = button.closest('.flash-message');
            flashMessage.classList.add('hiding');
            setTimeout(() => {
                flashMessage.remove();
                if (!document.querySelector('#flash-messages .flash-message')) {
                    document.querySelector('#flash-messages').remove();
                }
            }, 300);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const flashMessages = document.querySelectorAll('.flash-message');
            flashMessages.forEach(message => {
                setTimeout(() => {
                    if (message.parentNode) {
                        const closeBtn = message.querySelector('.flash-close');
                        if (closeBtn) closeBtn.click();
                    }
                }, 5000);
            });
        });
    </script>
@endif
<x-guest-layout>


        <div class="mb-4 text-sm text-text">
            {{ __('Забыли пароль? Ничего. Впишите свой email и мы отправим вам инструкции для создания нового пароля') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Получить инструкции') }}
                </x-button>
            </div>
        </form>

</x-guest-layout>

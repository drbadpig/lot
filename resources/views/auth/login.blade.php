<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Email')"/>

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                     autofocus/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Пароль')"/>

            <x-input id="password" class="block mt-1 w-full"
                     type="password"
                     name="password"
                     required autocomplete="current-password"/>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-graphics shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       name="remember">
                <span class="ml-2 text-sm text-text">{{ __('Запомнить') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('register'))
                <a class="text-sm text-active hover:text-activeLight" href="{{ route('register') }}">
                    {{ __('Создать аккаунт') }}
                </a>
            @endif

            @if (Route::has('password.request'))
                <a class="text-sm text-active hover:text-activeLight" href="{{ route('password.request') }}">
                    {{ __('Забыли пароль?') }}
                </a>
            @endif
        </div>

        <x-button class="w-full mt-4 justify-center">
            {{ __('Войти') }}
        </x-button>
    </form>
</x-guest-layout>
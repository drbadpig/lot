<x-guest-layout>


        <div class="mb-4 text-sm text-text">
            {{ __('Спасибо, что присоединились! Перед тем, как начать, не могли бы вы подтвердить ваш аккаунт по ссылке, которую мы только что отправили вам на почту? Если вы не получили письмо - мы с радостью отправим ещё.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Новая ссылка с верификацией была отправлена вам на email адрес, указанный при регистрации') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Отправить ссылку ещё раз') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Выйти') }}
                </button>
            </form>
        </div>
</x-guest-layout>

<x-app-layout title="Настройки">
    <!-- Title -->
    <h1 class="hidden">Настройки аккаунта</h1>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl uppercase mb-6">Настройки</h1>

        <div
            class="w-full rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>
            <form class="mb-4" method="post" enctype="multipart/form-data"
                  action="{{ route('settings.image') }}">
                @csrf
                <div class="flex text-lg">
                    <div class="w-[200px]">
                        <label for="image" class="">Фото профиля</label>
                    </div>
                    <div class="w-[400px] mb-4 flex flex-col">
                        <img class="max-w-[150px] mb-4" src="{{ asset(Auth::user()->image) }}" alt="profile photo">
                        <input type="file" name="image" id="image">
                    </div>

                </div>
                <x-button class="px-12">
                    {{ __('Сохранить') }}
                </x-button>
            </form>
            <form class="mb-4" method="post" action="{{ route('settings.personal') }}">
                @csrf

                <div class="flex text-lg items-center mb-4">
                    <div class="w-[200px]">
                        <label for="username" class="">Логин</label>
                    </div>

                    <div class="w-[400px]">
                        <x-input class="w-[400px]" id="username" :value="Auth::user()->username" name="username"
                                 type="text" required/>
                    </div>
                </div>
                <div class="flex text-lg items-center mb-4">
                    <div class="w-[200px]">
                        <label for="email" class="">Почта</label>
                    </div>

                    <div class="w-[400px]">
                        <x-input class="w-[400px]" id="email" :value="Auth::user()->email" name="email" type="email"
                                 required/>
                    </div>
                </div>
{{--                <div class="flex text-lg items-start mb-4">--}}
{{--                    <div class="w-[200px]">--}}
{{--                        <span class="">Riot Games</span>--}}
{{--                    </div>--}}
{{--                    <div class="w-[400px]">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <span class="mr-4">RGID8302848</span>--}}
{{--                            <a class="text-active hover:text-activeLight" href="#">Отвязать</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <x-button class="px-12">
                    {{ __('Сохранить') }}
                </x-button>
            </form>
            <form class="mb-4" method="post" action="{{ route('settings.password') }}">
                @csrf
                <div class="flex text-lg items-center mb-4">
                    <div class="w-[200px]">
                        <label for="current_password" class="">Старый пароль</label>
                    </div>

                    <div class="w-[400px]">
                        <x-input class="w-[400px]" id="current_password" name="current_password" type="password"
                                 required/>
                    </div>
                </div>
                <div class="flex text-lg items-center mb-4">
                    <div class="w-[200px]">
                        <label for="password" class="">Новый пароль</label>
                    </div>

                    <div class="w-[400px]">
                        <x-input class="w-[400px]" id="password" name="password" type="password"
                                 required autocomplete="new-password"/>
                    </div>
                </div>
                <div class="flex text-lg items-center mb-4">
                    <div class="w-[200px]">
                        <label for="password_confirmation" class="">Повторите</label>
                    </div>

                    <div class="w-[400px]">
                        <x-input class="w-[400px]" id="password_confirmation" name="password_confirmation"
                                 type="password"
                                 required/>
                    </div>
                </div>
                <x-button class="px-12">
                    {{ __('Сохранить') }}
                </x-button>
            </form>
        </div>
    </div>
</x-app-layout>

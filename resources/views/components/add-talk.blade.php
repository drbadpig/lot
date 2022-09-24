
<div
    class="relative justify-between items-center rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
    @if(\Illuminate\Support\Facades\Auth::check())
    <a href="{{ route('talk.create') }}" class="text-lg text-active hover:text-activeLight">Добавить обсуждение</a>
    <p class="mt-3">Любые ваши мысли, идеи, вопросы и так далее вы можете обсудить здесь с другими
        пользователями платформы!</p>
    <p class="mt-3">Нажмите на текст выше, чтобы создать обсуждение</p>
    @else
        <a href="{{ route('login') }}" class="text-lg text-active hover:text-activeLight">Войдите в аккаунт</a>
        <p class="mt-3">Чтобы обсудить любые ваши мысли, идеи, вопросы и так далее по игре с другими пользователями платформы!</p>
        <p class="mt-3">Нажмите на текст выше, чтобы войти в аккаунт</p>
        <p class="mt-3">Или <a href="{{ route('register') }}" class="text-active hover:text-activeLight">создайте новый, если вы ещё не с нами</a></p>
    @endif
</div>


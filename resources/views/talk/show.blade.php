<x-app-layout title="Обсуждение">
    <x-banner/>

    <div class="container mx-auto p-8">
        <h1 class="hidden">leagueoftalks Новости</h1>

        <div class="w-full">

            <div class="w-8/12">
                <div class="mb-12">
                    <div
                        class="flex flex-col rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 mb-3">
                        <div class="border-b border-slate-50/[0.06] p-4">
                            <div class="flex justify-between">
                                <div class="flex">
                                    <a href="/user/1">
                                        <img class="min-w-12 min-h-12 w-12 h-12" src="{{ asset('avatar.png') }}"
                                             alt="ss">
                                    </a>
                                    <a href="/user/1" class="ml-3">
                                        Username
                                    </a>
                                </div>
                                <span class="font-medium text-sm">28 августа</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h2 class="text-3xl uppercase mb-3">Волибира удаляют из игры :(</h2>
                            <p class="mb-3">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
                            <p class="mb-3">"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>
                            <img class="mb-3" src="{{ asset('backgrounds/bg-tf-graves.jpg') }}" alt="gay">
                            <p class="mb-3">
                                "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
                            </p>
                            <div class="flex justify-between mt-4">
                                <div class="flex items-center">
                                    <x-icons.heart-icon class="h-6 w-6 text-red-600 mr-2"/>
                                    <span class="text-slate-400">210</span>
                                </div>
                                <a href="#comment" class="flex items-center text-slate-400">
                                    <x-icons.reply-icon class="h-6 w-6 mr-2"/>
                                    <span>Ответить</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-2xl uppercase mb-3">Комментарии</h2>
                    <div
                        class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <img src="{{ asset('oval.jpg') }}" class="h-16 w-16 mr-4" alt="sss">
                        <div class="flex flex-col flex-auto">
                            <div class="flex justify-between border-b border-slate-50/[0.06] mb-2">
                                <a class="text-lg" href="/user/1">
                                    Username
                                </a>
                                <span class="font-medium text-sm">28 августа</span>
                            </div>
                            <div>
                                <p>ты тупой?</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <img src="{{ asset('avatar.png') }}" class="h-16 w-16 mr-4" alt="sss">
                        <div class="flex flex-col flex-auto">
                            <div class="flex justify-between border-b border-slate-50/[0.06] mb-2">
                                <a class="text-lg" href="/user/1">
                                    Username
                                </a>
                                <span class="font-medium text-sm">28 августа</span>
                            </div>
                            <div>
                                <p>откуда такая информация? я хочу умереть</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <img src="{{ asset('backgrounds/bg-tf-graves.jpg') }}" class="h-16 w-16 mr-4" alt="sss">
                        <div class="flex flex-col flex-auto">
                            <div class="flex justify-between border-b border-slate-50/[0.06] mb-2">
                                <a class="text-lg" href="/user/1">
                                    Username
                                </a>
                                <span class="font-medium text-sm">28 августа</span>
                            </div>
                            <div>
                                <p>Малкольм Грейвз/Твистед Фэйт канон ☭☭☭</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <img src="{{ asset('backgrounds/bg-sg.jpg') }}" class="h-16 w-16 mr-4" alt="sss">
                        <div class="flex flex-col flex-auto">
                            <div class="flex justify-between border-b border-slate-50/[0.06] mb-2">
                                <a class="text-lg" href="/user/1">
                                    Username
                                </a>
                                <span class="font-medium text-sm">28 августа</span>
                            </div>
                            <div>
                                <p>Я считаю, что Лорем Ипсум устарел. Просто вдумайтесь: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laboru. Нихрена же непонтяно...</p>
                            </div>
                        </div>
                    </div>
                    <div id="comment"
                        class="flex rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 p-3 mb-3">
                        <a class="text-2xl text-slate-400" href="{{ route('login') }}">Войди в аккаунт, чтобы оставить комментарий</a>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
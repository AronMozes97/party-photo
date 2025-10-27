<header class="bg-gray">
    <nav aria-label="Global" class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">
        <div class="flex lg:flex-1">
            <a href="{{ route('dashboard') }}" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img src="{{ asset('/storage/images/logo/logo.png') }}" alt="" class="h-10 w-auto"/>
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" command="show-modal" commandfor="mobile-menu"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                <span class="sr-only">Open main menu</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                     aria-hidden="true" class="size-6">
                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </button>
        </div>

        <el-popover-group class="hidden lg:flex lg:gap-x-12">
            <a href="#" class="text-xl/6 font-semibold text-white">Features</a>
            @isAdmin
                <x-admin.menu/>
            @endisAdmin
        </el-popover-group>

        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <button popovertarget="navbar-profile-info"
                    class="flex items-center gap-x-1 text-xl/6 font-semibold text-yellow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                </svg>
            </button>

            <el-popover id="navbar-profile-info" anchor="bottom" popover
                        class="w-fit max-w-md overflow-hidden rounded-3xl bg-gray text-white font-bold outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(3)] backdrop:bg-transparent open:block data-closed:translate-y-1 data-closed:opacity-0 data-enter:duration-200 data-enter:ease-out data-leave:duration-150 data-leave:ease-in">
                <div class="p-4">
                    @if(auth()->user())
                        <div class="group flex items-center justify-center rounded-lg p-4 hover:bg-white/5">
                            <a href="{{ route('user.logout') }}" class="flex items-center text-sm/6 ">
                                Logout
                            </a>
                        </div>
                    @else
                        <div class="group flex items-center justify-center rounded-lg p-4 hover:bg-white/5">
                            <a href="{{ route('user.login') }}" class="flex items-center text-sm/6 ">
                                Login
                            </a>
                        </div>
                        <div class="group flex items-center justify-center rounded-lg p-4 hover:bg-white/5">
                            <a href="{{ route('user.register') }}" class="flex items-center text-sm/6 ">
                                Register
                            </a>
                        </div>
                    @endif
                </div>
            </el-popover>
        </div>
    </nav>
    <el-dialog>
        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
            <div tabindex="0" class="fixed inset-0 focus:outline-none">
                <el-dialog-panel
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-100/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img src="{{ asset('storage/images/logo/logo.png') }}"
                                 alt="" class="h-8 w-auto"/>
                        </a>
                        <button type="button" command="close" commandfor="mobile-menu"
                                class="-m-2.5 rounded-md p-2.5 text-gray-400">
                            <span class="sr-only">Close menu</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                 data-slot="icon" aria-hidden="true" class="size-6">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-white/10">
                            <div class="space-y-2 py-6">
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Features</a>
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Marketplace</a>
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Company</a>
                            </div>
                            <div class="py-6">
                                <div class="-mx-3">
                                    <button type="button" command="--toggle" commandfor="products"
                                            class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold text-white hover:bg-white/5">
                                        Profile
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                             class="size-5 flex-none in-aria-expanded:rotate-180">
                                            <path
                                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" fill-rule="evenodd"/>
                                        </svg>
                                    </button>
                                    <el-disclosure id="products" hidden class="mt-2 block space-y-2">
                                        <a href="#"
                                           class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-white hover:bg-white/5">Login</a>
                                        <a href="#"
                                           class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-white hover:bg-white/5">Register</a>
                                    </el-disclosure>
                                </div>
                            </div>
                        </div>
                    </div>
                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>
</header>

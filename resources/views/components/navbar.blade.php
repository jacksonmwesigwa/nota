<nav x-data="{ mobileMenuIsOpen: false }" @click.away="mobileMenuIsOpen = false"
    class="navigation boxed fixed left-0 top-0 w-full flex items-center justify-between py-4"
    aria-label="penguin ui menu">
    <!-- Brand Logo -->
    <a href="{{ route('index') }}" class="text-2xl font-bold text-neutral-900 dark:text-white">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Nota logo" class="w-11" />
    </a>
    <!-- Desktop Menu -->
    <ul class="hidden items-center gap-4 sm:flex">
        <li class="mr-3"><a href="{{ route('index') }}"
                class="{{ request()->is('/') ? 'font-bold text-black underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-white dark:hover:text-white' : 'font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white' }}"
                aria-current="page">Home</a></li>
        <li class="mr-3"><a href="{{ route('public') }}"
                class="{{ request()->is('public') ? 'font-bold text-black underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-white dark:hover:text-white' : 'font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white' }}">Public</a>
        </li>
        <li class="mr-5"><a href="{{ route('note.index') }}"
                class="{{ request()->is('notes') ? 'font-bold text-black underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-white dark:hover:text-white' : 'font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white' }}">My
                Notes</a>
        </li>
        <!-- User Pic -->
        <li x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }" @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false"
            class="relative flex items-center">
            <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
                @keydown.space.prevent="openWithKeyboard = true" @keydown.enter.prevent="openWithKeyboard = true"
                @keydown.down.prevent="openWithKeyboard = true"
                class="rounded-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:focus-visible:outline-white"
                aria-controls="userMenu">
                <img src="{{ asset('assets/images/user-icon.jpg') }}" alt="User Profile"
                    class="size-10 rounded-full object-cover" />
            </button>
            <!-- User Dropdown -->
            <ul x-cloak x-show="userDropDownIsOpen || openWithKeyboard" x-transition.opacity x-trap="openWithKeyboard"
                @click.outside="userDropDownIsOpen = false, openWithKeyboard = false"
                @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()"
                id="userMenu"
                class="absolute right-0 top-12 flex w-full min-w-[16rem] rounded-md flex-col overflow-hidden border border-neutral-300 bg-neutral-50 py-1.5 dark:border-[#29145e] dark:bg-[#0f0528]">
                @auth
                    <li class="border-b border-neutral-300 dark:border-neutral-700">
                        <div class="flex flex-col px-4 py-2">
                            <span
                                class="text-sm font-medium text-neutral-900 dark:text-white">{{ Auth::user()->name }}</span>
                            <p class="text-xs text-neutral-600 dark:text-neutral-300">{{ Auth::user()->email }}</p>
                        </div>
                    </li>
                    <li><a href="{{ route('note.index') }}"
                            class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-[#0f0528] dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">My
                            Notes</a>
                    </li>
                    <li><a href="{{ route('note.create') }}"
                            class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-[#0f0528] dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Write
                            Note</a>
                    </li>
                    <li><a href="{{ route('public') }}"
                            class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-[#0f0528] dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Public
                            Notes</a>
                    </li>
                    <form action="{{ route('session.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="block w-full text-start bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-[#0f0528] dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Sign
                            Out</button>
                    </form>
                @else
                    <li class="border-b border-neutral-300 dark:border-neutral-700">
                        <div class="flex flex-col px-4 py-2">
                            <span class="text-sm font-medium text-neutral-900 dark:text-white">Guest</span>
                            <p class="text-xs text-neutral-600 dark:text-neutral-300">Please signup or login</p>
                        </div>
                    </li>
                    <li><a href="{{ route('note.index') }}"
                            class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-[#0f0528] dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">My
                            Notes</a>
                    </li>
                    <li><a href="{{ route('note.create') }}"
                            class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-[#0f0528] dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Write
                            Note</a>
                    </li>
                    <li><a href="{{ route('user.create') }}"
                            class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-[#0f0528] dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Sign
                            Up</a></li>
                    <li><a href="{{ route('login') }}"
                            class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-[#0f0528] dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Login</a>
                    </li>

                @endauth

            </ul>
        </li>
    </ul>
    <!-- Mobile Menu Button -->
    <button @click="mobileMenuIsOpen = !mobileMenuIsOpen" :aria-expanded="mobileMenuIsOpen"
        :class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button"
        class="flex text-neutral-600 dark:text-neutral-300 sm:hidden" aria-label="mobile menu"
        aria-controls="mobileMenu">
        <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
    <!-- Mobile Menu -->
    <ul x-cloak x-show="mobileMenuIsOpen"
        x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0"
        x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full"
        class="mobile-nav navigation fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col px-8 pb-6 pt-10 dark:bg-[#0f0528] sm:hidden">

        @auth
            <li class="mb-4 border-none">
                <div class="flex items-center gap-2 py-2">
                    <img src="{{ asset('assets/images/user-icon.jpg') }}" alt="User Profile"
                        class="size-12 rounded-full object-cover" />
                    <div>
                        <span class="font-medium text-neutral-900 dark:text-white">{{ Auth::user()->name }}</span>
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </li>
            <li class="p-2"><a href="{{ route('index') }}"
                    class="{{ request()->is('/') ? 'w-full text-lg font-bold text-black focus:underline dark:text-white' : 'w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300' }}"
                    aria-current="page">Home</a>
            </li>
            <li class="p-2"><a href="{{ route('public') }}"
                    class="{{ request()->is('public') ? 'w-full text-lg font-bold text-black focus:underline dark:text-white' : 'w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300' }}">Public</a>
            </li>
            <li class="p-2"><a href="{{ route('note.index') }}"
                    class="{{ request()->is('notes') ? 'w-full text-lg font-bold text-black focus:underline dark:text-white' : 'w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300' }}">My
                    Notes</a>
            </li>
            <hr role="none" class="my-2 border-outline dark:border-neutral-700">
            <li class="p-2"><a href="{{ route('note.create') }}"
                    class="{{ request()->is('note/create') ? 'font-semibold w-full text-neutral-400 focus:underline dark:text-neutral-100' : 'w-full text-neutral-600 focus:underline dark:text-neutral-300' }}">Write
                    Note</a></li>
            <li class="p-2"><a href="{{ route('public') }}"
                    class="{{ request()->is('about') ? 'font-semibold w-full text-neutral-400 focus:underline dark:text-neutral-100' : 'w-full text-neutral-600 focus:underline dark:text-neutral-300' }}">About
                    Nota</a></li>
            <!-- CTA Button -->
            <form action="{{ route('session.destroy') }}" method="POST" class="mt-4 border-none">
                @csrf
                @method('DELETE')
                <button
                    class="rounded-md w-full bg-black px-4 py-2 block text-center font-medium tracking-wide text-neutral-100 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Sign
                    Out</button>
            </form>
        @else
            <li class="mb-4 border-none">
                <div class="flex items-center gap-2 py-2">
                    <img src="{{ asset('assets/images/user-icon.jpg') }}" alt="User Profile"
                        class="size-12 rounded-full object-cover" />
                    <div>
                        <span class="font-medium text-neutral-900 dark:text-white">Guest</span>
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">Please signup or login</p>
                    </div>
                </div>
            </li>
            <li class="p-2"><a href="{{ route('index') }}"
                    class="{{ request()->is('/') ? 'w-full text-lg font-bold text-black focus:underline dark:text-white' : 'w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300' }}"
                    aria-current="page">Home</a>
            </li>
            <li class="p-2"><a href="{{ route('public') }}"
                    class="{{ request()->is('public') ? 'w-full text-lg font-bold text-black focus:underline dark:text-white' : 'w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300' }}">Public</a>
            </li>
            <li class="p-2"><a href="{{ route('note.index') }}"
                    class="{{ request()->is('notes') ? 'w-full text-lg font-bold text-black focus:underline dark:text-white' : 'w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300' }}">My
                    Notes</a>
            </li>
            <hr role="none" class="my-2 border-outline dark:border-neutral-700">
            <li class="p-2"><a href="{{ route('note.create') }}"
                    class="{{ request()->is('note/create') ? 'font-semibold w-full text-neutral-400 focus:underline dark:text-neutral-100' : 'w-full text-neutral-600 focus:underline dark:text-neutral-300' }}">Write
                    Note</a></li>
            <li class="p-2"><a href="{{ route('user.create') }}"
                    class="{{ request()->is('register') ? 'font-semibold w-full text-neutral-400 focus:underline dark:text-neutral-100' : 'w-full text-neutral-600 focus:underline dark:text-neutral-300' }}">Sign
                    Up</a></li>
            <!-- CTA Button -->
            <li class="mt-4 w-full border-none"><a href="{{ route('login') }}"
                    class="rounded-md bg-black px-4 py-2 block text-center font-medium tracking-wide text-neutral-100 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Login
                </a></li>
        @endauth

    </ul>
</nav>

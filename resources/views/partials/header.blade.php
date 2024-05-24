<header x-data="{ open: false}" class="bg-white">
    <nav class="container flex items-center justify-between gap-x-6 py-4" aria-label="Global">
        <div class="flex gap-x-12">
            <a wire:navigate href="{{ route('home') }}">
                <x-logo class="h-8 text-primary-600" />
            </a>
            <a href="#" class="hidden lg:block text-sm font-semibold leading-6 text-gray-900">Link</a>
            <a href="#" class="hidden lg:block text-sm font-semibold leading-6 text-gray-900">Link</a>
        </div>
        <div class="flex flex-1 items-center justify-end gap-x-6">
            @auth
                <!-- Profile dropdown -->
                <div x-data="{ open: false }" @click.outside="open = false" class="hidden lg:block relative flex-shrink-0">
                    <div>
                        <button @click="open = !open" type="button" class="relative flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                    </div>

                    <div x-cloak x-show="open" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
                    >
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                        <form method="POST" action="{{ route('logout') }}" role="menuitem" tabindex="-1" id="user-menu-item-2">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700">
                                <span>Sign out</span>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="hidden lg:block text-sm font-semibold leading-6 text-gray-900">Sign in</a>
                <a href="{{ route('register') }}" class="hidden lg:block text-sm font-semibold leading-6 text-gray-900">Register</a>
            @endauth

            <a href="{{ route('filament.company.resources.job-listings.create') }}" class="btn btn-sm btn-outline-primary">Post a job</a>
        </div>
        <div class="flex lg:hidden">
            <button @click="open = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-cloak x-show="open" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center gap-x-6">
                <a wire:navigate href="{{ route('home') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <x-logo class="h-8 text-primary-600" />
                </a>
                <a href="{{ route('filament.company.resources.job-listings.create') }}" class="ml-auto btn btn-primary">Post a job</a>
                <button @click="open = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Link</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Link</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Link</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Link</a>
                    </div>
                    <div class="py-6">
                        @auth
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                    <span>Sign out</span>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Sign in</a>
                            <a href="{{ route('register') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

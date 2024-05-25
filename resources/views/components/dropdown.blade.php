<div x-data="{ open: false }" class="relative inline-block text-left">
    <div>
        <button @click="open = !open" type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-full px-4 py-2 text-sm border-primary-400 hover:border-white border-2 shadow-sm" :class="open ? 'bg-white text-gray-700' : 'text-primary-400 hover:text-white'">
            {{ $label ?? 'Options' }}
            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
        @click.outside="open = false"
        class="absolute left-0 z-10 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" tabindex="-1"
    >
        <div class="pl-8 py-6 space-y-2" role="none">
            {{ $slot }}
        </div>
    </div>
</div>

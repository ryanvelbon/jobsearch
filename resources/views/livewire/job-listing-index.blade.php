<div>
    <section class="py-6 bg-primary-900">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">
            <form id="search-form" method="GET">
                <div class="flex flex-row gap-2">
                    <div class="grow flex flex-col gap-2">
                        <label class="font-bold text-white">What</label>
                        <livewire:keyword-combobox />
                    </div>
                    <div class="grow flex flex-col gap-2 justify-end">
                        <input type="text" placeholder="Any classification">
                    </div>
                    <div class="grow flex flex-col gap-2">
                        <label class="font-bold text-white">Where</label>
                        <input type="text" placeholder="Enter suburb, city, or region">
                    </div>
                    <div class="flex flex-col justify-end">
                        <button type="submit" class="px-6 py-3.5 rounded-lg uppercase font-bold tracking-wide bg-secondary-500 hover:bg-secondary-400 text-white">Search</button>
                    </div>
                </div>
                <div class="mt-3">
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <div>
                            <button @click="open = !open" type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-full px-4 py-2 text-sm border-primary-400 hover:border-white border-2 shadow-sm" :class="open ? 'bg-white text-gray-700' : 'text-primary-400 hover:text-white'">
                                All work types
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
                                @foreach($options['workTypes'] as $option)
                                    <div class="flex items-center">
                                        <input wire:model.live="selectedWorkTypes" id="wt-{{ $option->name }}" type="checkbox" value="{{ $option->value }}" class="h-5 w-5 rounded border-gray-500 text-primary-600 focus:ring-primary-600 cursor-pointer">
                                        <label for="wt-{{ $option->name }}" class="pl-4 py-2 text-gray-600 text-lg cursor-pointer">{{ $option->value }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="container py-8 grid md:grid-cols-3 gap-8">
        <div class="col-span-2 max-w-2xl">
            <ul>
                @forelse($listings as $listing)
                    <a href="{{ route('listings.show', $listing) }}">
                        <li class="border border-gray-200 hover:border-gray-400 rounded-lg flex justify-between gap-4 px-4 py-6 mb-6 shadow-xl">
                            <div>
                                <p class="text-gray-700 text-sm">{{ $listing->company->name }}</p>
                                <p class="font-bold text-lg text-nowrap">{{ $listing->title }}</p>
                                <p class="text-gray-500 text-sm">{{ $listing->work_type }}</p>
                            </div>
                            <div class="flex flex-col justify-between items-end gap-4">
                                <div class="text-gray-700 text-sm">
                                    <span>Remote, EU</span>
                                    <span>·</span>
                                    <span>{{ $listing->published_at?->diffForHumans() }}</span>
                                </div>
                                <ul class="flex flex-row-reverse flex-wrap-reverse gap-1">
                                    @foreach($listing->tagsWithType('skill')->take(5) as $tag)
                                        <li class="bg-primary-100 text-primary-600 rounded-full px-2.5 py-1 text-xs">{{ $tag->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </a>
                @empty
                    <div>No results matched your search.</div>
                @endforelse
            </ul>
            {{ $listings->links() }}
        </div>
        <div class="text-gray-200">
            blank space
        </div>
    </section>
</div>

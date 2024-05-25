<div>
    <x-loading />
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
                                    <div class="flex items-center group">
                                        <input wire:model.live="selectedWorkTypes" id="wt-{{ $option->name }}" type="checkbox" value="{{ $option->value }}" class="h-5 w-5 rounded border-gray-500 group-hover:border-gray-700 text-primary-600 focus:ring-primary-600 cursor-pointer">
                                        <label for="wt-{{ $option->name }}" class="pl-4 py-2 select-none w-full text-gray-600 group-hover:text-gray-800 text-lg cursor-pointer">{{ $option->value }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="number" wire:model.live="nDays">
                </div>
            </form>
        </div>
    </section>
    @if($listings->isNotEmpty())
        <section class="container grid lg:grid-cols-2 gap-8 mb-4">
            <div>
                <div class="my-4 flex justify-between">
                    <span class="text-sm text-gray-600">{{ $listings->total() }} jobs</span>
                    <span class="text-sm text-gray-600">Sorted by <strong>date</strong></span>
                </div>
                <ul>
                    @forelse($listings as $listing)
                        {{-- <a href="{{ route('listings.show', $listing) }}"> --}}
                        <div wire:click="$set('listingId', {{ $listing->id }})" class="cursor-pointer select-none">
                            <li class="border rounded-lg flex justify-between gap-4 px-4 py-6 mb-6 shadow-xl
                                @if($listing->id === $listingId)
                                    border-primary-500 border-4
                                @else
                                    border-gray-200 hover:border-gray-400
                                @endif
                            ">
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
                        </div>
                        {{-- </a> --}}
                    @empty
                        <div>No results matched your search.</div>
                    @endforelse
                </ul>
                {{ $listings->links() }}
            </div>
            <div class="mt-4">
                <div
                    x-data="{ scrolled: false }"
                    @scroll.window="scrolled = window.scrollY > 260"
                    :class="scrolled ? 'fixed top-4' : ''"
                    class="h-144 rounded-xl border shadow-xl overflow-y-scroll"
                >
                @if($listingId)
                    <x-job-listing-preview :id="$listingId" />
                @else
                    <div class="h-full p-8 bg-gray-100 text-gray-600">
                        <p class="mt-12 mb-4 text-2xl font-semibold text-gray-700">&larr; Select a job</p>
                        <p class="text-gray-500">Details will be displayed here</p>
                    </div>
                @endif
                </div>
            </div>
        </section>
    @else
        <div class="flex flex-col items-center pt-32 pb-96">
            <h3 class="text-gray-700 font-semibold text-2xl mb-6">No matching search results</h3>
            <p class="text-gray-500">
                We couldn't find anything that matched your search.
                <br>
                Try adjusting the filters or check for spelling errors.
            </p>
        </div>
    @endif
</div>

<div>
    <section class="py-6 bg-primary-900">
        <div class="mx-auto max-w-5xl px-6 lg:px-8">
            <form id="search-form" method="GET">
                <div class="flex flex-row gap-2">
                    <div class="flex flex-col gap-2">
                        <label>What</label>
                        <input wire:model.live="search" type="text" placeholder="Enter keywords">
                    </div>
                    <div class="flex flex-col gap-2 justify-end">
                        <input type="text" placeholder="Any classification">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label>Where</label>
                        <input type="text" placeholder="Enter suburb, city, or region">
                    </div>
                    <div class="flex flex-col justify-end">
                        <button type="submit" class="px-6 py-3.5 rounded-lg uppercase font-bold tracking-wide bg-secondary-500 hover:bg-secondary-400 text-white">Search</button>
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
                        <li class="group p-4 mb-4 bg-white border border-1 border-gray-300 rounded-xl">
                            <h3 class="font-bold text-lg text-gray-800 group-hover:underline">{{ $listing->title }}</h3>
                            <p class="text-base text-gray-800">{{ $listing->company->name }}</p>
                            <p class="text-sm text-gray-600 my-4">{{ $listing->description }}</p>
                            <p class="text-xs text-gray-500">Posted {{ $listing->published_at?->diffForHumans() }}</p>
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

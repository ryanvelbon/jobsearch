<div>
    <section class="py-4 border border-b-1 border-gray-300">
        <div class="container">
            <div>
                <input type="text" wire:model.live="search" placeholder="search keywords">
            </div>
        </div>
    </section>
    <section class="container py-8 grid md:grid-cols-3 gap-8">
        <div class="col-span-2">
            <ul class="mx-auto max-w-2xl">
                @forelse($listings as $listing)
                    <a href="{{ route('listings.show', $listing) }}">
                        <li class="group p-4 mb-4 bg-white border border-1 border-gray-300 rounded-xl">
                            <h3 class="font-bold text-lg text-gray-800 group-hover:underline">{{ $listing->title }}</h3>
                            <p class="text-base text-gray-800">{{ $listing->company->name }}</p>
                            <p class="text-sm text-gray-600 my-4">{{ $listing->description }}</p>
                            <p class="text-xs text-gray-500">Posted {{ $listing->published_at->diffForHumans() }}</p>
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

<div class="bg-gray-200">
    <div class="container">
        <h1 class="text-4xl font-bold text-center py-6">Jobs</h1>
        <div class="mb-8">
            <input type="text" wire:model.live="search" placeholder="search keywords">
        </div>
        <ul>
            @forelse($listings as $listing)
                <a href="{{ route('listings.show', $listing) }}">
                    <li class="p-4 mb-4 bg-white">
                        <p class="text-xs text-gray-600">{{ $listing->company->name }}</p>
                        <h3 class="font-bold text-lg text-gray-800">{{ $listing->title }}</h3>
                        <span class="bg-gray-300 text-xs">{{ $listing->status }}</span>
                    </li>
                </a>
            @empty
                <div>No results matched your search.</div>
            @endforelse
        </ul>
        {{ $listings->links() }}
    </div>
</div>

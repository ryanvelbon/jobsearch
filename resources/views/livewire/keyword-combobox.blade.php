<div x-data="{}" class="relative">
    <input
        autofocus
        x-ref="search"
        wire:model.live.debounce.600ms="search"
        type="text"
        placeholder="Enter keywords"
    >
    <button
        x-show="$wire.search.length"
        @click="$wire.set('search', ''); $refs.search.focus();"
        type="button"
        class="absolute inset-y-0 right-0 flex items-center rounded-r-md pr-4 focus:outline-none"
    >
        <span class="text-gray-600">╳</span>
    </button>

    @if($results->isNotEmpty())
        <ul class="absolute z-10 mt-3 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" id="options" role="listbox">
            @foreach($results as $tag)
                <li @click="$wire.set('search', '{{ $tag->name }}')" class="relative cursor-pointer select-none py-2 pl-3 pr-9 text-gray-900 hover:bg-gray-100 hover:text-primary-600" id="option-0" role="option" tabindex="-1">
                    <span class="block truncate">{{ $tag->name }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>

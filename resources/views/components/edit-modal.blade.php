<div x-data="{ open: {{ isset($is_edit) && $is_edit ? 'true' : 'false' }}, working: false }" x-cloak wire:key="{{ $value }}">
    <span x-on:click="open = true">
        {{ $trigger }}
    </span>

    <div x-show="open"
        class="fixed z-50 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="open" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative bg-gray-100 rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                <button @click="open = false" type="button"
                    class="text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="w-full">
                <div class="mt-3 text-center">
                    <form>
                        <div class="bg-white px-4 pt-5 pb-1 sm:p-6 sm:pb-4">
                            <div class="">
                                <div class="mb-4">
                                    <label for="title"
                                        class="block text-gray-700 text-sm font-bold mb-2 text-left">Parent:</label>
                                    <select class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="parent_id" wire:model="parent_id">
                                        <option value="0">Select Parent Id</option>
                                        @if(!empty($all_pages))
                                            @foreach($all_pages as $page)
                                                <option value="{{ $page->id }}">{{ $page->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="title"
                                        class="block text-gray-700 text-sm font-bold mb-2 text-left">Title:</label>
                                    <input type="text"
                                        class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="title" placeholder="Enter Title" wire:model="title" value="">
                                    @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-4">
                                    <label for="slug"
                                        class="block text-gray-700 text-sm font-bold mb-2 text-left">Slug:</label>
                                    <input type="text"
                                        class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="slug" placeholder="Enter slug" wire:model="slug">
                                    @error('slug') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-4">
                                    <label for="content"
                                        class="block text-gray-700 text-sm font-bold mb-2 text-left">Content:</label>
                                    <textarea rows="5" 
                                        class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="content" wire:model="content"
                                        placeholder="Enter Content"></textarea>
                                    @error('content') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-2 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span>
                                <button wire:click.prevent="update()" type="button"
                                    class="rounded-md border border-transparent px-4 py-2 bg-green-500 text-base leading-6 font-bold text-white shadow-sm">
                                    Update
                                </button>
                            </span>
                            <span class="ml-2">
                                <button @click="open = false" type="button"
                                    class="rounded-md border border-gray-300 px-4 py-2 bg-gray-500 text-base leading-6 font-bold text-white shadow-sm mr-2">
                                    Cancel
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
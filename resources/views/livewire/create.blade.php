<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center pt-4 px-4 pb-20 text-center sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-1 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="title"
                                class="block text-gray-700 text-sm font-bold mb-2">Parent:</label>
                            <select class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="parent_id" wire:model="parent_id">
                                <option value="0">Select Parent Id</option>
                                @if(count($pages) > 0)
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="title"
                                class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text"
                                class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="title" placeholder="Enter Title" wire:model="title">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="slug"
                                class="block text-gray-700 text-sm font-bold mb-2">Slug:</label>
                            <input type="text"
                                class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="slug" placeholder="Enter slug" wire:model="slug">
                            @error('slug') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="content"
                                class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
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
                        <button wire:click.prevent="store()" type="button"
                            class="rounded-md border border-transparent px-4 py-2 bg-green-500 text-base leading-6 font-bold text-white shadow-sm">
                            Save
                        </button>
                    </span>
                    <span class="ml-2">
                        <button wire:click="closeCreatePageModal()" type="button"
                            class="rounded-md border border-gray-300 px-4 py-2 bg-gray-500 text-base leading-6 font-bold text-white shadow-sm mr-2">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
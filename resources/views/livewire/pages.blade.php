<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Pages
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        	<button wire:click="create()" class="my-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-green-500 text-base font-bold text-white shadow-sm hover:bg-green-500">Create Page</button>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('success'))
                    <div class="bg-success border-t-4 p-3 text-white mb-2" role="alert">
                      <div class="flex">
                        <div>
                          <p class="text-sm mb-0">{{ session('success') }}</p>
                        </div>
                      </div>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="bg-danger border-t-4 p-3 text-white mb-2" role="alert">
                      <div class="flex">
                        <div>
                          <p class="text-sm mb-0">{{ session('error') }}</p>
                        </div>
                      </div>
                    </div>
                @endif
                @if($is_create)
                    @include('livewire.create')
                @endif
                @if($is_edit)
                    @include('livewire.edit')
                @endif
                <livewire:pages-table />
                {{--<table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-center w-20">No.</th>
                            <th class="px-4 py-2 text-center">Parent</th>
                            <th class="px-4 py-2 text-center">Title</th>
                            <th class="px-4 py-2 text-center">Content</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @if(!empty($pages))
                            @foreach($pages as $page)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $i }}</td>
                                <td class="border px-4 py-2 text-center">
                                    @if($page->children != null)
                                        {{ $page->children->title }}
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">{{ $page->title }}</td>
                                <td class="border px-4 py-2 text-center">{{ $page->content }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <button wire:click="edit({{ $page->id }})"
                                    class="my-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-primary text-base font-bold text-white shadow-sm hover:bg-red-700">Edit</button>
                                    <button wire:click="delete({{ $page->id }})"
                                    class="my-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">Delete</button>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>--}}
            </div>
        </div>
    </div>
</div>
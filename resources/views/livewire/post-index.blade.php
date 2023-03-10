<div class="max-w-6xl mx-auto">
    <div class="flex justify-end m-2 p-2">
        <x-jet-button wire:click="showPostModal">Create</x-jet-button>
    </div>
    <div class="m-2 p-2">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-lef text-xs font-medium text-gray-500 dark:text-gray-200">Id
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-lef text-xs font-medium text-gray-500 dark:text-gray-200">
                                    Title</th>
                                <th scope="col"
                                    class="px-6 py-3 text-lef text-xs font-medium text-gray-500 dark:text-gray-200">
                                    Image</th>
                                <th scope="col" class="relative px-6 py-3">Edit</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr></tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img class="w-8 h-8 rounded-full" src="{{ Storage::url($post->image) }}" />
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm">Edit Delete</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-2 p-2">Pagination</div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <x-jet-dialog-modal wire:model="showingPostModal">
            <x-slot name="title"> Create Post </x-slot>
            <x-slot name="content">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form enctype="multipart/form-data">
                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium text-gray-700"> Post Title </label>
                            <div class="mt-1">
                                <input type="text" id="title" wire:model.lazy="title" name="title"
                                    class="block w-full appearance-none bg-white border border-gray-400">
                            </div>
                            @error('title')
                                <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="text" class="block text-sm font-medium text-gray-700"> Post Image </label>
                            @if ($newImage)
                                Photo Preview:
                                <img src="{{ $newImage->temporaryUrl() }}">
                            @endif
                            <div class="mt-1">
                                <input type="file" id="image" wire:model="newImage" name="image"
                                    class="block w-full appearance-none bg-white border border-gray-400">
                            </div>
                            @error('newImage')
                                <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="body" class="block text-sm font-medium text-gray-700"> Body </label>
                            <div class="mt-1">
                                <textarea id="body" name="body" rows="3" wire:model.lazy="body"
                                    class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400">
                                </textarea>
                            </div>
                            @error('body')
                                <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click="storePost">
                    Store
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>

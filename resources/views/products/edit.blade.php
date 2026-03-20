<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                                        @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded">
                            <ul class="list-disc">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        {{-- Title --}}
                        <div class="mb-4">
                            <label for="title"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                            <input type="text" name="title" id="title" value="{{ old("title" , $product->title) }}"
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm">
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label for="dec"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                            <textarea name="dec" id="dec" rows="4"
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm">{{ old("dec" , $product->dec) }}</textarea>
                        </div>

                        {{-- Price --}}
                        <div class="mb-4">
                            <label for="price"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price</label>
                            <input type="number" name="price" id="price"
                                value="{{ old("price" , $product->price) }}" step="0.01"
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm">
                        </div>

                        {{-- Category --}}
                        <div class="mb-4">
                            <label for="category_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old("category_id",$category->id) == $category->id ? "selected" : "" }}
                                        >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Current Image --}}
                            {{-- <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Current
                                    Image</label>
                                <img src="" alt="title" class="w-32 h-32 object-cover rounded border">
                            </div> --}}

                        {{-- Image Upload --}}
                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Product Image
                            </label>
                            <input type="file" name="image" id="image" accept=".jpg,.png"
                                class="w-full text-gray-700 dark:text-gray-300">

                        {{-- Submit --}}
                        <div class="flex items-center gap-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Product
                            </button>
                            {{-- <a href="" class="text-gray-500 hover:text-gray-700">Cancel</a> --}}
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

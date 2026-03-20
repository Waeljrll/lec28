<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Products
            </h2>
            @can('create_product')
                <a href="{{ route('products.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Add Product
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="w-full text-left text-gray-700 dark:text-gray-300">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-3">Image</th>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Price</th>
                                <th class="px-4 py-3">Category</th>
                                <th class="px-4 py-3">Created By</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr class="border-b dark:border-gray-700">
                                    @if ($product->image)
                                        <td class="px-4 py-3">
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                alt="{{ $product->title }}" class="w-16 h-16 object-cover rounded">
                                        </td>
                                    @else
                                        <td>No Image</td>
                                    @endif
                                    <td class="px-4 py-3 font-medium">{{ $product->title }}</td>
                                    <td class="px-4 py-3">${{ $product->price }}</td>
                                    {{-- <td class="px-4 py-3">{{ $product->category ? $product->category->name : '-' }}</td> --}}
                                    <td class="px-4 py-3">{{ $product->category?->name }}</td>
                                    <td class="px-4 py-3">{{ $product->createdBy?->name }}</td>
                                    <td class="px-4 py-3 flex gap-4">
                                        <a href="{{ route('products.edit', $product) }}"
                                            class="text-blue-500 hover:text-blue-700 mr-3">Edit</a>
                                            @can("delete_product",$product)
                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                class="inline" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700">Delete</button>
                                            </form>

                                            @endcan
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-gray-400">
                                        No products found. <a href="" class="text-blue-500">Create one!</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

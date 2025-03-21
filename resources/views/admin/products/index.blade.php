<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row  w-full justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class=" py-3 px-5 text-white bg-blue-700 rounded-full">Add
                Category</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @forelse ($products as $product)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-5">
                            <img src="{{ Storage::url($product->photo) }}" alt="" srcset=""
                                class="w-[40px] h-[40px]">
                            <div>
                                <h3 class="text-xl font-semibold text-indigo-950">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-base text-slate-500">Rp {{ $product->price }}</p>
                            </div>

                        </div>
                        <p class="text-base text-slate-500 ">{{ $product->category->name }}</p>


                        <div class="flex flex-row gap-x-5 items-center">
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                class
                            =" py-3 px-5 text-white bg-blue-700 rounded-full">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-3 px-3 text-white bg-red-700 rounded-full">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Belum ada data product yang ditambahkan oleh pemilik apotek</p>
                @endforelse


            </div>
        </div>
    </div>
</x-app-layout>

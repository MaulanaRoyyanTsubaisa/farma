<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row  w-full justify-between items-center">
             <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Categories') }}
        </h2>
        <a href="{{route('admin.categories.create')}}" class=" py-3 px-5 text-white bg-blue-700 rounded-full">Add Category</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @forelse ($categories as $category)
                    <div class="item-card flex flex-row justify-between items-center">
                        <img src="{{Storage::url($category->icon)}}" alt="" srcset="" class="w-[40px] h-[40px]">
                        <h3 class="text-xl font-semibold text-indigo-950">
                            {{$category->name}}
                        </h3>

                        <div class="flex flex-row gap-x-5 items-center">
                            <a href="{{route('admin.categories.edit', $category->id)}}" class
                            =" py-3 px-5 text-white bg-blue-700 rounded-full">Edit</a>
                            <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="py-3 px-3 text-white bg-red-700 rounded-full">Delete</button>
                        </div>
                    </div>
                @empty

                @endforelse


            </div>
        </div>
    </div>
</x-app-layout>s
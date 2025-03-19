<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row  w-full justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Details') }}
            </h2>

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-5">
                        <div>
                            <p class="text-base text-slate-500">Total Transaksi</p>
                            <h3 class="text-xl font-semibold text-indigo-950">
                                RP 100.000
                            </h3>
                        </div>

                    </div>
                    <div>
                        <p class="text-base text-slate-500">Date</p>
                        <h3 class="text-xl font-semibold text-indigo-950">
                            2021-10-10
                        </h3>
                    </div>

                    <span class="bg-yellow-500 rounded-full px-3 py-1">
                        <p class="text-white font-bold text-sm">Pending</p>
                    </span>


                </div>
                <hr class="my-3">
                <h3 class="text-xl font-semibold text-indigo-950">
                    list of items
                </h3>

                <div class="grid-cols-4 grid gap-x-10">
                    <div class="flex flex-col gap-y-5 col-span-2">
                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-5">
                                <img src="#" alt="" srcset="" class="w-[40px] h-[40px]">
                                <div>
                                    <h3 class="text-xl font-semibold text-indigo-950">
                                        XXXX
                                    </h3>
                                    <p class="text-base text-slate-500">Rp 1111</p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500 ">vitamins</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-5 col-span-2">
                        <img src="#" alt="" srcset="" class=" bg-red-400 w-[400px] h-[400px]">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>s

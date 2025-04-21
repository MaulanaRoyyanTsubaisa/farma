<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row  w-full justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ Auth::user()->hasRole('owner') ? __('Apotek Orders') : __('My Transactions') }}
            </h2>

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @forelse ($product_transactions as $transaction)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-5">
                            <a href="{{ route('product_transactions.show', $transaction) }}">
                                <div>
                                    <p class="text-base text-slate-500">Total Transaksi</p>
                                    <h3 class="text-xl font-semibold text-indigo-950">
                                        RP {{ $transaction->total_amount }}
                                    </h3>
                                </div>
                            </a>
                        </div>
                        <div class="hidden md:flex flex-col     ">
                            <p class="text-base text-slate-500">Date</p>
                            <h3 class="text-xl font-semibold text-indigo-950">
                                {{ $transaction->created_at }}
                            </h3>
                        </div>

                        @if ($transaction->is_paid)
                            <span class="bg-green-500 rounded-full px-3 py-1">
                                <p class="text-white font-bold text-sm">Success</p>
                            </span>
                        @else
                            <span class="bg-yellow-500 rounded-full px-3 py-1">
                                <p class="text-white font-bold text-sm">Pending</p>
                            </span>
                        @endif

                        <div class="hidden md:flex flex-row gap-x-5 items-center">
                            <a href="{{ route('product_transactions.show', $transaction) }}"
                                class=" py-3 px-5 text-white bg-blue-700 rounded-full">View Detail</a>
                        </div>
                    </div>

                    <hr class="my-3">
                @empty
                    <p>Belum tersedia transaksi</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

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
                                RP {{ $productTransaction->total_amount }}
                            </h3>
                        </div>

                    </div>
                    <div>
                        <p class="text-base text-slate-500">Date</p>
                        <h3 class="text-xl font-semibold text-indigo-950">
                            {{ $productTransaction->created_at }}
                        </h3>
                    </div>

                    @if ($productTransaction->is_paid)
                        <span class="bg-green-500 rounded-full px-3 py-1">
                            <p class="text-white font-bold text-sm">Success</p>
                        </span>
                    @else
                        <span class="bg-yellow-500 rounded-full px-3 py-1">
                            <p class="text-white font-bold text-sm">Pending</p>
                        </span>
                    @endif
                </div>

                <hr class="my-3">
                <h3 class="text-xl font-semibold text-indigo-950">
                    list of items
                </h3>

                <div class="grid-cols-4 grid gap-x-10">
                    <div class="flex flex-col gap-y-5 col-span-2">

                        @forelse ($productTransaction->transactionDetails as $detail)
                            <div class="item-card flex flex-row justify-between items-center">
                                <div class="flex flex-row items-center gap-x-5">
                                    <img src="{{ Storage::url($detail->product->photo) }}" alt="" srcset=""
                                        class="w-[40px] h-[40px]">
                                    <div>
                                        <h3 class="text-xl font-semibold text-indigo-950">
                                            {{ $detail->product->name }}
                                        </h3>
                                        <p class="text-base text-slate-500">Rp {{ $detail->product->price }}</p>
                                    </div>
                                </div>
                                <p class="text-base text-slate-500 ">{{ $detail->product->category->name }}</p>
                            </div>
                        @empty
                        @endforelse

                        <h3 class="text-xl font-semibold text-indigo-950">
                            Details of Delivery
                        </h3>
                        <div class="item-card flex flex-row justify-between items-center">
                            <p class="text-base text-slate-500 ">Address</p>
                            <h3 class="text-xl font-semibold text-indigo-950">
                                {{ $productTransaction->address }}
                            </h3>
                        </div>
                        <div class="item-card flex flex-row justify-between items-center">
                            <p class="text-base text-slate-500 ">City</p>
                            <h3 class="text-xl font-semibold text-indigo-950">
                                {{ $productTransaction->city }}
                            </h3>
                        </div>
                        <div class="item-card flex flex-row justify-between items-center">
                            <p class="text-base text-slate-500 ">Post Code</p>
                            <h3 class="text-xl font-semibold text-indigo-950">
                                {{ $productTransaction->post_code }}
                            </h3>
                        </div>
                        <div class="item-card flex flex-row justify-between items-center">
                            <p class="text-base text-slate-500 ">Phone Number</p>
                            <h3 class="text-xl font-semibold text-indigo-950">
                                {{ $productTransaction->phone_number }}
                            </h3>
                        </div>
                        <div class="item-card flex flex-col justify-between items-start">
                            <p class="text-base text-slate-500 ">Notes</p>
                            <h3 class="text-xl font-semibold text-indigo-950">
                                {{ $productTransaction->note }}
                            </h3>
                        </div>

                    </div>

                    <div class="flex flex-col gap-y-5 col-span-2 items-end">
                        <h3 class="text-lg font-semibold text-indigo-950">
                            Proof of Payment
                        </h3>
                        <img src="{{ Storage::url($productTransaction->proof) }}"
                            alt="{{ $productTransaction->proof }}" srcset="" class="  w-[300px] h-[400px]">
                    </div>
                </div>

                <hr class="my-3">
                @role('owner')
                    @if ($productTransaction->is_paid)
                        <form action="{{ route('product_transactions.update', $productTransaction) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="py-3 px-3 text-white bg-indigo-700 rounded-full">Contact Aadmin</button>
                        </form>
                    @else
                        <form action="{{ route('product_transactions.update', $productTransaction) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="py-3 px-3 text-white bg-indigo-700 rounded-full">Approve
                                Order</button>
                        </form>
                    @endif
                @endrole

                @role('buyer')
                    <a href="#" type="submit" class="w-fit py-3 px-3 text-white bg-indigo-700 rounded-full">contact
                        Admin</a>
                @endrole
            </div>
        </div>
    </div>
    </div>
</x-app-layout>s

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aau | {{ $order->no_order }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-50 antialiased" onload="window.print()">
    <div class=" p-3">
        <div class="rounded-md md:dark:bg-gray-800">
            <div class="pt-9 md:px-9 pb-6">
                <div class="flex items-center space-x-2 text-slate-700 ">
                    <div class="w-24 mr-2 select-none">
                        <img src="{{ asset('assets/img/Aau Store2.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="py-6 md:px-9">
                <div class="flex w-full">
                    <div class="grid grid-cols-2 gap-12">
                        <div class="text-sm font-light text-slate-500 dark:text-slate-400">
                            <p class="text-sm font-normal text-slate-700 dark:text-slate-300 ">Invoice Number</p>
                            <p>{{ $order->no_order }}</p>

                            <p class="mt-2 text-sm font-normal text-slate-700 dark:text-slate-300 ">
                                Date
                            </p>
                            <p> {{ date('H:i • d M Y', strtotime($order->created_at)) }}
                            </p>
                        </div>
                        <div class="text-sm font-light text-slate-500 dark:text-slate-400">
                            <p class="text-sm font-normal text-slate-700 dark:text-slate-300 ">Kasir</p>
                            <p>{{ $order->nama_kasir }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-6 md:px-9">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase border-b-2 border-gray-500 bg-white dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Product
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Qty
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price/Qty
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderProduct as $item)
                                <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 w-1/2 font-semibold text-gray-800">
                                        {{ $item->listProduct->nama_product }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->qty }}
                                    </td>
                                    <td class="px-6 py-4 truncate">
                                        Rp. {{ number_format($item->listProduct->harga_product) }}
                                    </td>
                                    <td class="px-6 py-4 truncate">
                                        Rp. {{ number_format($item->total) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-8 flex justify-end">
                    <div class="w-64 grid grid-cols-2 gap-1">
                        <div>
                            <p class="mb-3 font-semibold text-left text-gray-500 dark:text-gray-200">Total
                                Pembelian
                            </p>
                            <p class="mb-3 font-semibold text-left text-gray-500 dark:text-gray-200">Pembayaran
                            </p>
                            <p class="mb-3 font-semibold text-left text-gray-500 dark:text-gray-200">Kembalian
                            </p>
                        </div>
                        <div>
                            <p class="mb-3 font-semibold text-end text-gray-600 dark:text-gray-50">
                                Rp. {{ number_format($order->grand_total) }}
                            </p>

                            <p class="mb-3 font-semibold text-end text-gray-600 dark:text-gray-50">
                                Rp. {{ number_format($order->pembayaran) }}
                            </p>
                            <p class="mb-3 font-semibold text-end text-gray-600 dark:text-gray-50">
                                Rp. {{ number_format($order->kembalian) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="{{ asset('/assets/js/script.js') }}"></script>
</body>

</html>

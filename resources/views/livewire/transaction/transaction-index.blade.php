<div>
    @if (session()->has('message'))
        <div id="alert-message"
            class="z-50 fixed flex items-center w-full max-w-sm p-4  border border-green-200 text-gray-500 bg-white rounded-lg shadow top-5 right-5 dark:text-gray-400  space-x dark:bg-gray-800 dark:border-green-700"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 capitalize text-sm font-normal">{{ session('message') }}</div>
        </div>
    @endif
    @if (session()->has('error'))
        <div id="alert-message"
            class="z-50 fixed flex items-center w-full max-w-xs p-4  border border-red-200 text-gray-500 bg-white rounded-lg shadow top-5 right-5 dark:text-gray-400  space-x dark:bg-gray-800 dark:border-red-700"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>

                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 capitalize text-sm font-normal">{{ session('error') }}</div>
        </div>
    @endif

    <div
        class="w-full md:bg-white md:p-6 md:border md:border-gray-200 md:rounded-lg md:shadow dark:bg-gray-900 md:dark:bg-gray-800 md:dark:border-gray-700">
        {{-- ============= Form for Add Product to Cart ============= --}}
        <form wire:submit.prevent="submit" class="mb-10" action="">
            <div class="grid grid-cols-12 gap-1">
                <div class="| col-span-12 md:col-span-2">
                    <h5 class="text-xl font-bold dark:text-white">Product</h5>
                </div>
                <div class="| col-span-9 md:col-span-8">
                    <select wire:model="product_id" id="product_id" name="product_id"
                        class="border capitalize text-sm rounded-lg block w-[110%] sm:w-full p-2.5 @error('product_id') {{ implode(' ', ['bg-red-50', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500', 'dark:bg-red-100', 'dark:border-red-400', 'dark:placeholder-red-700', 'dark:text-red-900']) }} @else {{ implode(' ', ['bg-gray-50', 'border-gray-300', 'text-gray-900', 'focus:ring-primary-600', 'focus:border-primary-600', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500']) }} @enderror"
                        required>
                        <option value="">-- Choose Produk --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nama_product }}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                            Produk sudah ada di dalam keranjang.
                        @enderror
                </div>
                <div class="col-span-2 flex justify-center">
                    <button type="submit"
                        class="text-gray-900 h-fit bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>

                </div>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md rounded-sm sm:rounded-lg">
            {{-- ============= Table for Cart ============= --}}
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                {{-- ============= Table Head for Cart ============= --}}
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 columns-2 md:columns-1">
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
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>

                {{-- ============= Table Body for Cart ============= --}}

                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 max-w-[15rem] font-medium text-gray-900 dark:text-white">
                                {{ $transaction->product->nama_product }}
                            </th>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    @if ($transaction->qty > 1)
                                        <button wire:click="decrement({{ $transaction->id }})"
                                            wire:loading.attr="disabled"
                                            class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 disabled:cursor-not-allowed"
                                            type="button">
                                            <span class="sr-only">Quantity button</span>
                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    @endif
                                    <div>
                                        <input type="number" value="{{ number_format($transaction->qty) }}" readonly
                                            class=" bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:placeholder:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="{{ $transaction->qty }}" required>

                                    </div>
                                    <button wire:click="increment({{ $transaction->id }})" wire:loading.attr="disabled"
                                        class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 disabled:cursor-not-allowed"
                                        type="button">
                                        <span class="sr-only">Quantity button</span>
                                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white truncate">
                                Rp. {{ number_format($transaction->product->harga_product) }}

                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white truncate">
                                Rp. {{ number_format($transaction->product->harga_product * $transaction->qty) }}

                            </td>
                            <td class="px-6 py-4">
                                <button wire:click="deleteTransaction({{ $transaction->id }})"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-12 py-8">

                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ============= Cart Info ============= --}}
        <div class="flex justify-end mt-8 p-5 md:py-0">
            <div class="md:w-64 grid grid-cols-2 gap-1">
                <div>
                    <p class="mb-3 font-semibold text-left text-gray-500 dark:text-gray-200">Total Pembelian</p>
                    <p class="mb-3 font-semibold text-left text-gray-500 dark:text-gray-200">Pembayaran</p>
                    <p class="mb-3 font-semibold text-left text-gray-500 dark:text-gray-200">Kembalian</p>
                </div>

                <div>
                    <p class="mb-3 font-semibold text-end text-gray-600 dark:text-gray-50">Rp.
                        {{ number_format($transactions->sum('total')) }}</p>
                    <div class="flex justify-end mb-2">
                        <input wire:model="pembayaran" type="text" id="first_product" name="pembayaran"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            class="border capitalize text-sm rounded-lg block w-5/6 px-2.5 py-1 @error('pembayaran') {{ implode(' ', ['bg-red-50', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500', 'dark:bg-red-100', 'dark:border-red-400', 'dark:placeholder-red-700', 'dark:text-red-900']) }} @else {{ implode(' ', ['bg-gray-50', 'border-gray-300', 'text-gray-900', 'focus:ring-primary-600', 'focus:border-primary-600', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500']) }} @enderror"
                            placeholder="@error('pembayaran')Required @else 0 @enderror" required>
                    </div>
                    <p class="mb-3 font-semibold text-end text-gray-600 dark:text-gray-50">
                    <p class="mb-3 font-semibold text-end text-gray-600 dark:text-gray-50">
                        @if (!$pembayaran == '')
                            Rp. {{ number_format($pembayaran - $transactions->sum('total')) }}
                        @endif
                    </p>
                    </p>
                </div>
                <div class="col-span-2 w-full">
                    <button type="button" wire:click="saveBill"
                        class="py-2.5 w-full mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Checkout</button>
                </div>

            </div>
        </div>

    </div>

    @if (session()->has('message') || session()->has('error'))
        <script id="scripts-alert">
            setTimeout(() => {
                const box = document.getElementById('alert-message');
                const alert = document.getElementById('scripts-alert');
                if (box) {
                    box.style.opacity = '0';
                    box.style.transition = '.8s'
                }
                if (alert) {
                    alert.remove();
                }
            }, 5000);
        </script>
    @endif
</div>

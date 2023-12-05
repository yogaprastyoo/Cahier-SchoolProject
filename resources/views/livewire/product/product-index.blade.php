<div>
    @if (session()->has('success'))
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
            <div class="ml-3 capitalize text-sm font-normal">{{ session('success') }}</div>
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
    <h1
        class="mb-16 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Page <br> <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
            Products</span>
    </h1>

    <div class="flex items-start justify-between pb-4">
        <div class="flex w-full justify-between">
            <button type="button" data-modal-target="tambah-produk-modal" data-modal-toggle="tambah-produk-modal"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Add Product
            </button>
            <div id="InputSearch">
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="search" type="search" id="search"
                        class="block p-2 pl-10 text-sm w-36 text-gray-900 border border-gray-300 rounded-lg  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 sm:max-w-md sm:w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for items">
                </div>
            </div>
        </div>
    </div>

    <div class="relative rounded-sm overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs truncate text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 columns-2 md:columns-1">
                        Nama Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            {{ $loop->iteration }}
                        </td>
                        <th scope="row" class="px-6 py-4 max-w-[15rem] font-medium text-gray-900 dark:text-white">
                            {{ $product->nama_product }}
                        </th>
                        <td class="px-6 py-4 capitalize">
                            {{ $product->kode_product }}
                        </td>
                        <td class="px-6 py-4 truncate">
                            Rp. {{ number_format($product->harga_product) }}
                        </td>
                        <td class="px-6 py-4">
                            <button wire:click="selectProductId({{ $product->id }})" data-modal-target="delete-modal"
                                data-modal-toggle="delete-modal"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            <button wire:click="selectProductId({{ $product->id }})" data-modal-target="edit-modal"
                                data-modal-toggle="edit-modal"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div wire:ignore.self id="delete-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="delete-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                        you sure you want to delete this product?</h3>
                    <button wire:click="deleteProduct()" data-modal-hide="delete-modal" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="delete-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self id="edit-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            {{-- ============= Modal Content ============= --}}
            <div
                class="relative bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <button type="button" wire:click="closeModal()"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="edit-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                {{-- ============= Form for Update Product ============= --}}
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Form Update Produk
                    </h1>


                    <form wire:submit.prevent="updateProduct" class="space-y-4 md:space-y-6" action=""
                        method="post">
                        @csrf
                        {{-- ============= Input Nama Produk ============= --}}
                        <div>
                            <label for="nama_product"
                                class="block mb-2 text-sm font-medium @error('nama_product') {{ implode(' ', ['text-red-700', 'dark:text-red-500']) }} @else {{ implode(' ', ['text-gray-900', 'dark:text-white']) }} @enderror">
                                Nama Produk <span class="text-red-400">*</span>
                            </label>
                            <input wire:model="nama_product" type="text" name="nama_product" id="nama_product"
                                required
                                class="rounded-lg block w-full p-2.5 sm:text-sm  @error('nama_product') {{ implode(' ', ['bg-red-50', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500', 'dark:bg-red-100', 'dark:border-red-400', 'dark:placeholder-red-700', 'dark:text-red-900']) }} @else {{ implode(' ', ['bg-gray-50', 'border-gray-300', 'text-gray-900', 'focus:ring-primary-600', 'focus:border-primary-600', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500']) }} @enderror"
                                placeholder="Nama Produk">
                            @error('nama_product')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                        class="font-medium">Oops!</span>
                                    {{ $message }}</p>
                            @enderror
                        </div>


                        <div class="space-y-4 sm:space-y-0 sm:grid grid-cols-2 gap-2 ">
                            {{-- ============= Input Kode Produk ============= --}}
                            <div>
                                <label for="kode_product"
                                    class="block mb-2 text-sm font-medium @error('kode_product') {{ implode(' ', ['text-red-700', 'dark:text-red-500']) }} @else {{ implode(' ', ['text-gray-900', 'dark:text-white']) }} @enderror">
                                    Kode Produk <span class="text-red-400">*</span>
                                </label>
                                <input wire:model="kode_product" required type="text" name="kode_product"
                                    id="kode_product" value="{{ old('kode_product') }}"
                                    oninput="this.value = this.value.toUpperCase().replace(/[^0-9A-Z._]/g, '');"
                                    class=" rounded-lg block w-full p-2.5 sm:text-sm  @error('kode_product') {{ implode(' ', ['bg-red-50', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500', 'dark:bg-red-100', 'dark:border-red-400', 'dark:placeholder-red-700', 'dark:text-red-900']) }} @else {{ implode(' ', ['bg-gray-50', 'border-gray-300', 'text-gray-900', 'focus:ring-primary-600', 'focus:border-primary-600', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500']) }} @enderror"
                                    placeholder="FHS939">
                                @error('kode_product')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Oops!</span>
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            {{-- ============= Input Harga Produk ============= --}}
                            <div>
                                <label for="harga_product"
                                    class="block mb-2 text-sm font-medium @error('harga_product') {{ implode(' ', ['text-red-700', 'dark:text-red-500']) }} @else {{ implode(' ', ['text-gray-900', 'dark:text-white']) }} @enderror">
                                    Harga Produk <span class="text-red-400">*</span>
                                </label>
                                <input wire:model="harga_product" required type="text" name="harga_product"
                                    id="harga_product" value="{{ old('harga_product') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                    class="rounded-lg block w-full p-2.5 sm:text-sm  @error('harga_product') {{ implode(' ', ['bg-red-50', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500', 'dark:bg-red-100', 'dark:border-red-400', 'dark:placeholder-red-700', 'dark:text-red-900']) }} @else {{ implode(' ', ['bg-gray-50', 'border-gray-300', 'text-gray-900', 'focus:ring-primary-600', 'focus:border-primary-600', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500']) }} @enderror"
                                    placeholder="Harga Produk">
                                @error('harga_product')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Oops!</span>
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button required type="submit"
                            class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Update
                            Produk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @if (session()->has('success') || session()->has('error'))
        <script id="scripts-alert">
            setTimeout(() => {
                var box = document.getElementById('alert-message');
                var alert = document.getElementById('scripts-alert');
                if (box) {
                    box.style.opacity = '0';
                    box.style.transition = '.8s'
                }
                if (alert) {
                    alert.remove();
                }
            }, 7000);
        </script>
    @endif
</div>

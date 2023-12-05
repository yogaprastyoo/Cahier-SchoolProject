<div wire:ignore.self id="tambah-produk-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        {{-- ============= Modal Content ============= --}}
        <div
            class="relative bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="tambah-produk-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            {{-- ============= Form for Add Product ============= --}}
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Form Tambah Produk
                </h1>


                <form wire:submit.prevent="submit" class="space-y-4 md:space-y-6" action="" method="post">
                    @csrf
                    {{-- ============= Input Nama Produk ============= --}}
                    <div>
                        <label for="nama_product"
                            class="block mb-2 text-sm font-medium @error('nama_product') {{ implode(' ', ['text-red-700', 'dark:text-red-500']) }} @else {{ implode(' ', ['text-gray-900', 'dark:text-white']) }} @enderror">
                            Nama Produk <span class="text-red-400">*</span>
                        </label>
                        <input wire:model="nama_product" required type="text" name="nama_product" id="nama_product"
                            class="rounded-lg block w-full p-2.5 sm:text-sm  @error('nama_product') {{ implode(' ', ['bg-red-50', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500', 'dark:bg-red-100', 'dark:border-red-400', 'dark:placeholder-red-700', 'dark:text-red-900']) }} @else {{ implode(' ', ['bg-gray-50', 'border-gray-300', 'text-gray-900', 'focus:ring-primary-600', 'focus:border-primary-600', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500']) }} @enderror"
                            placeholder="Nama Produk">
                        @error('nama_product')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
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
                        class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Tambahkan
                        Produk</button>
                </form>
            </div>
        </div>
    </div>
</div>

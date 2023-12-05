<x-app-layout>
    @section('title', 'Products')

    {{-- ============= Livewire Component ============= --}}
    {{-- Table Product --}}
    @livewire('product.product-index')

    {{-- Form Tambah Product --}}
    @livewire('product.product-create')

</x-app-layout>

<x-guest-layout>
    @section('title', 'Login')

    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Sign in to your account
    </h1>

    {{-- ============= Notification Error ============= --}}
    @if (session('status'))
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
            {{ session('message') }}</p>
    @endif

    <form class="space-y-4 md:space-y-6" action="login" method="post">
        @csrf

        {{-- ============= Input Username ============= --}}
        <div>
            <label for="username"
                class="block mb-2 text-sm font-medium @error('username') {{ implode(' ', ['text-red-700', 'dark:text-red-500']) }} @else {{ implode(' ', ['text-gray-900', 'dark:text-white']) }} @enderror">
                Username</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}"
                oninput="this.value = this.value.toLowerCase().replace(/[^0-9a-z._]/g, '');"
                class="lowercase border rounded-lg block w-full p-2.5 sm:text-sm @error('username') {{ implode(' ', ['bg-red-50', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500', 'dark:bg-red-100', 'dark:border-red-400', 'dark:placeholder-red-700', 'dark:text-red-900']) }} @else {{ implode(' ', ['bg-gray-50', 'border-gray-300', 'text-gray-900', 'focus:ring-primary-600', 'focus:border-primary-600', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500']) }} @enderror"
                placeholder="@username">
            @error('username')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                    {{ $message }}</p>
            @enderror
        </div>

        {{-- ============= Input Password ============= --}}
        <div>
            <label for="password"
                class="block mb-2 text-sm font-medium @error('username') {{ implode(' ', ['text-red-700', 'dark:text-red-500']) }} @else {{ implode(' ', ['text-gray-900', 'dark:text-white']) }} @enderror">
                Password
                {{-- <span class="text-red-400">*</span> --}}
            </label>
            <input type="password" name="password" id="password" placeholder="Password"
                class="rounded-lg block w-full p-2.5 sm:text-sm @error('password') {{ implode(' ', ['bg-red-50', 'border', 'border-red-500', 'text-red-900', 'placeholder-red-700', 'focus:ring-red-500', 'focus:border-red-500', 'dark:bg-red-100', 'dark:border-red-400', 'dark:placeholder-red-700', 'dark:text-red-900']) }} @else {{ implode(' ', ['bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'focus:ring-primary-600', 'focus:border-primary-600', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500', 'dark:focus:border-blue-500']) }} @enderror">
            @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                    {{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class=" w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
            in</button>

    </form>
</x-guest-layout>

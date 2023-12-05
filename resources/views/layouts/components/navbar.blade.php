<nav class="fixed top-0 z-40 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 ">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="flex ml-2 md:mr-24">
                    <div class="w-16 mr-2 select-none">
                        <div id="logo">
                            <svg class="dark:text-[#f6f6f6] text-[#222831] fill-current" id="Layer_1"
                                data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 1015.71 594.97"><text transform="translate(0 447.27) scale(0.99 1)"
                                    fill="currentColor"
                                    style="font-size:520.0802001953125px;font-family:DancingScript-Bold, Dancing Script;font-weight:700">
                                    <tspan style="letter-spacing:-0.050994051735148996em">A</tspan>
                                    <tspan x="301.65" y="0">au</tspan>
                                </text><text transform="translate(754.47 339.89) scale(0.99 1)" fill="currentColor"
                                    style="font-size:130.02005004882812px;font-family:Calibri-Light, Calibri;font-weight:300">
                                    <tspan style="letter-spacing:-0.012203053223418189em">s</tspan>
                                    <tspan x="48.69" y="0" style="letter-spacing:-0.009771589152043798em">
                                        t</tspan>
                                    <tspan x="90.15" y="0">o</tspan>
                                    <tspan x="157.95" y="0" style="letter-spacing:-0.014642139439216955em">
                                        r</tspan>
                                    <tspan x="200.87" y="0"
                                        style="letter-spacing:-0.0000076221444243711364em">e</tspan>
                                </text></svg>
                        </div>
                    </div>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ml-3">
                    <div>
                        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                            data-dropdown-placement="left-end" data-dropdown-offset-distance="-100"
                            data-dropdown-offset-skidding="40"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150"
                            type="button">
                            {{ Auth::user()->username }}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>

                    <div id="dropdownAvatar"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <p class="text-sm text-gray-900 dark:text-white capitalize" role="none">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownUserAvatarButton">
                            <li>
                                <a href="{{ route('home') }}"
                                    class="flex items-center px-4 py-2 hover:bg-gray-100 transition dark:hover:bg-gray-600 dark:hover:text-white {{ Request::routeIs('home') ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('invoices') }}"
                                    class="flex items-center px-4 py-2 hover:bg-gray-100 transition dark:hover:bg-gray-600 dark:hover:text-white {{ Request::routeIs('invoices') || Request::routeIs('invoice-show') ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8V488c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488V24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96zM80 352c0 8.8 7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96z" />
                                    </svg>
                                    Invoices
                                </a>
                            </li>
                            <li>
                                <div id="theme-toggle" class="">
                                    <button id="theme-toggle-dark-icon"
                                        class="w-full hidden flex items-center px-4 py-2 hover:bg-gray-100 transition dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512">
                                            <path
                                                d="M223.5 32C100 32 0 132.3 0 256S100 480 223.5 480c60.6 0 115.5-24.2 155.8-63.4c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6c-96.9 0-175.5-78.8-175.5-176c0-65.8 36-123.1 89.3-153.3c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z" />
                                        </svg>
                                        Dark Mode
                                    </button>
                                    <button id="theme-toggle-light-icon"
                                        class="w-full hidden flex items-center px-4 py-2 hover:bg-gray-100 transition dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z" />
                                        </svg>
                                        Light Mode
                                    </button>
                                </div>
                            </li>
                        </ul>
                        <div class="py-2">
                            <form action="{{ route('login.destroy') }}" method="post">
                                @csrf
                                <button
                                    class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

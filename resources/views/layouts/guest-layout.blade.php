<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aau | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="dark:bg-gray-900 antialiased">

    <div class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="flex items-center rounded-full mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <div class="w-32 mr-2 select-none">
                    <svg class="dark:text-[#f6f6f6] text-[#222831] fill-current" id="Layer_1" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1015.71 594.97"><text
                            transform="translate(0 447.27) scale(0.99 1)" fill="currentColor"
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
                            <tspan x="200.87" y="0" style="letter-spacing:-0.0000076221444243711364em">
                                e</tspan>
                        </text></svg>
                </div>
            </div>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

</body>

</html>

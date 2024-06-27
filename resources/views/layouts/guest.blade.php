<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="/vendor/Bootstrap-5.3.3/bootstrap.min.css" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="/vendor/DataTables/datatables.min.css" rel="stylesheet" />
        <script src="/vendor/Bootstrap-5.3.3/bootstrap.bundle.min.js"></script>

    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

            <div class="w-full mt-6 bg-dark2 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" style="width: 70vw; border-radius:20px;">
                <div class="row">
                    <div class="col-xl p-5">
                        {{ $slot }}
                    </div>
                    <div class="col-xl d-none d-xl-block">
                        <img src="/assets/img/img.jpeg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

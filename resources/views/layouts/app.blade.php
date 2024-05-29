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
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <link href="/vendor/Bootstrap-5.3.3/bootstrap.min.css" rel="stylesheet" />
        <link href="/vendor/DataTables/datatables.min.css" rel="stylesheet" />

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- <div class="min-h-screen" style="background-color: rgba(50,50,50,1)"> --}}
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-dark2 dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        
        <script src="/vendor/Bootstrap-5.3.3/bootstrap.bundle.min.js"></script>
        <script src="/vendor/jquery-3.7.1/jquery-3.7.1.min.js"></script>
        <script src="/vendor/DataTables/datatables.min.js"></script>
    
        @if (isset($script))
            {{ $script }}
        @endif
    </body>
</html>

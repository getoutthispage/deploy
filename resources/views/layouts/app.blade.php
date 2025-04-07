<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />
    <style>
        .mx-auto {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        <!-- @if (isset($header))
            <header class="bg-white shadow" style="display:flex;align-items: center;">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <i class="fas fa-home"></i>
                </div>
                @if(auth()->check() && auth()->user()->is_admin)
                    <div class="admin-console-link">
                        <a href="{{ route('admin.console') }}"><i class="fas fa-code"></i></a>
                    </div>
                @endif
            </header>
        @endif -->
        <main>
            @yield('content')
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>

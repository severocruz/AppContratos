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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        [x-cloak] {
            display: none;
        }

        
    </style>
    <body  class="font-sans antialiased ">
     
    @include('layouts.navigation')
    
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            
            {{-- @include('layouts.sidebar') --}}
            <!-- Page Heading -->

            <!-- Page Content -->
            <div x-data class="h-screen mx-auto  flex justify-start">
                @include('layouts.sidebar')  
                <div class="flex-row">
                    @if (isset($header))
                    <header class="bg-white dark:bg-gray-800 shadow h-16" >
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                    @endif    
                    <main >
                            {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
        <script  src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav x-data="{ open: false }" class="bg-white-500">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between flex-wrap p-6">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <a href="/dashboard"></a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link  href="/dashboard" :active="request()->routeIs('dashboard')">
                                    Dashboard
                                </x-jet-nav-link>
                            </div>
                            <div class="border-black -hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link  href="/order" :active="request()->routeIs('order')">
                                    Order
                                </x-jet-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link  href="{{ route('order-list') }}" :active="request()->routeIs('order-list')">
                                    List
                                </x-jet-nav-link>
                            </div>
                        </div>

                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="" />
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Manage Account
                                    </div>

                                    <x-jet-dropdown-link href="/user/profile">
                                        Profile
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="/my-orders">
                                        My Orders
                                    </x-jet-dropdown-link>

                                    <!-- Admin Management -->
                                    @if(Auth::user()->type == 'admin')
                                    
                                    <div class="border-t border-gray-100"></div>
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Admin routes
                                    </div>
                                    <x-jet-dropdown-link href="/admin/users">
                                        User management
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="/admin/orders">
                                        Order management
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="/admin/restaurants/list">
                                        Restaurant List
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="/admin/restaurants/add">
                                        Restaurant Add
                                    </x-jet-dropdown-link>
                                    @endif
                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="/user/api-tokens">
                                            API Tokens
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                     this.closest('form').submit();">
                                            Logout
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-jet-responsive-nav-link href="/dashboard" :active="request()->routeIs('dashboard')">
                            Dashboard
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link  href="/order" :active="request()->routeIs('order')">
                            Order
                        </x-jet-responsive-nav-link>
        
                        <x-jet-responsive-nav-link  href="/order-list" :active="request()->routeIs('order-list')">
                            List
                        </x-jet-responsive-nav-link>

                        <!-- Admin Menu -->
                        @if(Auth::user()->type == 'admin')
                        
                        <x-jet-responsive-nav-link  href="/admin/users" :active="request()->routeIs('admin-users')">
                            User management
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link  href="/admin/orders" :active="request()->routeIs('admin-orders')">
                            Order management
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link  href="/admin/restaurants/list" :active="request()->routeIs('admin-restaurants-list')">
                            Restaurants list
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link  href="/admin/restaurants/add" :active="request()->routeIs('admin-restaurants-form')">
                            Restaurants add
                        </x-jet-responsive-nav-link>
                        @endif
                        <!-- End Admin Menu -->
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="" />
                            </div>

                            <div class="ml-3">
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-jet-responsive-nav-link href="/user/profile" :active="request()->routeIs('profile.show')">
                                Profile
                            </x-jet-responsive-nav-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-responsive-nav-link href="/user/api-tokens" :active="request()->routeIs('api-tokens.index')">
                                    API Tokens
                                </x-jet-responsive-nav-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         this.closest('form').submit();">
                                    Logout
                                </x-jet-responsive-nav-link>
                            </form>

                                <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow text-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

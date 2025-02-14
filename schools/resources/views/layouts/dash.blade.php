<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', getCurrentLocale()) }}" class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="{{ getDirection() }}" data-theme="theme-default" data-assets-path="/dash/assets/"
    data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Techsup Business</title>
    <meta name="description" content="" />
    <!--  stylesheets headers -->
    @include('layouts.dash_share.stylesheets')
    <!--  stylesheets headers css push -->
    @stack('css')

    <style>
        .setDir {
            direction: {{ getDirection() }};
            dir: {{ getDirection() }};
        }
    </style>

    @livewireStyles

    {{-- scripts headers --}}
    @include('layouts.dash_share.scripts_header')
    <!--  scripts headers push -->
    @stack('js_header')
</head>

<body>


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.dash_share.asside')
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts.dash_share.nav')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">


                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4 setDir">
                            @yield('titel')
                        </h4>

                        <!-- messages -->
                        {{-- @livewire('share.success-message') --}}
                        <x-dash.success-message />

                        <!-- / messages -->

                        <!-- Content -->
                        @yield('content')
                        <!-- / Content -->

                    </div>

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!--  scripts footer -->
    @include('layouts.dash_share.scripts_footer')
    <!--   scripts footer push -->
    @stack('js')
    @livewireScripts
</body>
</html>

<!DOCTYPE html>
<html  lang="{{app()->getLocale()}}" dir="{{ getDirection() }}">

<head>
    <!-- ====== Head ======  -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Islam Salah">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta name="csrf" content="{{csrf_token()}}" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{env(('APP_Company'))}}</title>

    <!-- Primary Meta Tags -->
    <meta content="{{$settings['seo']['title']}}" name="title">
    <meta content="{{$settings['seo']['description']}}" name="description">
    <meta content="{{$settings['seo']['keywords']}}" name="keywords">
    <meta content="{{ asset('storage/icons/' . $settings['branding']['logo']) }}" property="og:image">
    <meta content="{{ asset('storage/icons/' . $settings['branding']['logo']) }}" property="twitter:image">
    <link href="{{ asset('storage/icons/' . $settings['branding']['favicon']) }}" />

    @include('layouts.frontend_share.stylesheets')
    @stack('css')
    @include('layouts.frontend_share.scripts_header')
    @stack('js_header')
    @livewireStyles

</head>

<body>
    <!-- ====== Components ======  -->
    <!-- ====== Header Start ====== -->
    @include('layouts.frontend_share.ud-header')
    <!-- ====== Header End ====== -->

    @yield('content')

    <!-- ====== Footer Start ====== -->
    @include('layouts.frontend_share.ud-footer')
    <!-- ====== Footer End ====== -->

    <!-- ====== JS ====== -->
    @include('layouts.frontend_share.scripts_footer')
    @stack('js')
    @livewireScripts
</body>

</html>

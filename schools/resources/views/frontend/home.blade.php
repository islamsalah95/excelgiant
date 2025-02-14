@extends('layouts.frontend')

@section('content')
    <!-- Content -->



    <!-- ======  content ====== -->
    <!-- start hero -->
    @include('layouts.frontend_share.home_sections.hero')
    <!-- end hero -->


    <!-- start about -->
    @include('layouts.frontend_share.home_sections.about')
    <!-- end about -->


    <!-- start slider -->
    @include('layouts.frontend_share.home_sections.slider')
    <!-- end slider -->


    <!-- start product -->
    @include('layouts.frontend_share.home_sections.product')
    <!-- end product -->


    <!-- start  card-pounter -->
    @include('layouts.frontend_share.home_sections.card-pounter')
    <!-- end card-pounter -->


    <!-- start infinite-bar -->
    @include('layouts.frontend_share.home_sections.infinite-bar')
    <!-- end infinite-bar -->


    <!-- start form -->
    @include('layouts.frontend_share.home_sections.form')
    <!-- end form -->


    <!-- Content -->
@endsection

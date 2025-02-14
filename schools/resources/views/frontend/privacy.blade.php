@extends('layouts.frontend')

@section('content')


<x-frontend.banner :title="__('frontend/privacy.privacy.title')" />


    

    <section class="overflow-hidden ud-about bg-white">
        <div class="container">
            {!! __('frontend/privacy.privacy.content') !!}
        </div>
    </section>
@endsection

@extends('layouts.frontend')

@section('content')


<x-frontend.banner :title="__('frontend/terms.terms.title')" />



    <section class="overflow-hidden ud-about bg-white">
        <div class="container">
            {!! __('frontend/terms.terms.content') !!}
        </div>
    </section>
@endsection

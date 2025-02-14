
@extends('errors.layout')

@section('content')
    <!-- Content -->

    <x-error :message="$message" :code="$code" />

    <!-- / Content -->
@endsection
   


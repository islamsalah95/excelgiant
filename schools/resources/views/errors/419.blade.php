
@extends('errors.layout')

@section('content')
    <!-- Content -->

    <x-error :message="$exception->getMessage() ?: 'You do not have permission to access this resource.'" :code="419" />

    <!-- / Content -->
@endsection
   


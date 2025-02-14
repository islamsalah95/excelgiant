@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('admins/index.main_titel') }}/</span>{{ __('admins/index.sub_titel') }}
@endsection

@section('content')
    <!-- Content -->
     @livewire('admins.index')
    <!-- / Content -->
@endsection



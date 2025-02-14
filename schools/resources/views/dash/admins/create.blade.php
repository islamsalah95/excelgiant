@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('admins/create.main_titel') }}/</span>{{ __('admins/create.sub_titel') }}
@endsection

@section('content')
    <!-- Content -->



    @livewire('admins.create')
    <!-- / Content -->
@endsection

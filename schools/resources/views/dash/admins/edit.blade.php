@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('services/edit.main_titel') }}/</span>{{ __('services/edit.sub_titel') }}
@endsection

@section('content')
    <!-- Content -->

        @livewire('admins.edit',['admin'=>$admin])

    <!-- / Content -->
@endsection

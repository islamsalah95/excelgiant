@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('contacts/index.main_titel') }}/</span>{{ __('contacts/index.sub_titel') }}
@endsection

@section('content')
    <!-- Content -->
    <livewire:contacts.index />
    <!-- / Content -->
@endsection



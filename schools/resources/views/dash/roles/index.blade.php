@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('roles/index.main_titel') }}/</span>{{ __('roles/index.sub_titel') }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ router('roles.create') }}" class="btn btn-primary mb-3">{{ __('roles/index.add') }}</a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                </div>


                <livewire:role.tabel>


            </div>
        </div>
    </div>
</div>
@endsection

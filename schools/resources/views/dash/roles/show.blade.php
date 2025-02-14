@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('roles/show.title.main') }}/</span>{{ __('roles/show.title.sub') }}
@endsection

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>{{ __('roles/show.header') }}
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ router('roles.index') }}">{{ __('roles/show.buttons.back') }}</a>
                    </div>
                </h2>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>{{ __('roles/show.labels.name') }}</strong>
                        <p class="text-muted">{{ $role->name }}</p>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('roles/show.labels.permissions') }}</strong>
                        <p class="text-muted">
                            @if (!empty($rolePermissions))
                                @foreach ($rolePermissions as $v)
                                    <span class="badge bg-primary">{{ $v->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">{{ __('roles/show.messages.no_permissions') }}</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection

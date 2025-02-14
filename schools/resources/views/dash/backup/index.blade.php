@extends('layouts.dash')

@section('content')

<div class="card">

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="table-responsive text-nowrap">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group">
                        <a href="{{ route('backups.create') }}"
                            class="btn btn-secondary create-new btn-primary" tabindex="0"
                            aria-controls="DataTables_Table_0" type="button">
                            <span><i class="ti ti-plus me-sm-1"></i> <span
                                    class="d-none d-sm-inline-block">{{ __('backups/index.add_record') }}</span></span>
                        </a>
                    </div>

                    <div class="btn-group" style="width: 10px;">
                    </div>

                </div>
            </div>
        </div>

        <div id="myTabel">
            <table class="datatables-basic table dataTable no-footer dtr-column collapsed">
                <thead>
                    <tr>
                        <th scope="col">{{ __('backups/index.filename') }}</th>
                        <th scope="col">{{ __('backups/index.date_created') }}</th>
                        <th scope="col">{{ __('backups/index.action') }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($sqlFiles as $file)
                    <tr>
                        <td>{{ $file->getFilename() }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp($file->getCTime())->toDateTimeString() }}</td>
                        <td>
                            <form action="{{ route('backups.destroy', ['backup' => $file->getFilename()]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> {{ __('backups/index.delete') }}
                                </button>
                            </form>

                            <!-- Form to trigger backup creation for this file -->
                            <form action="{{ route('backups.retrive') }}" method="POST">
                                @csrf
                                <!-- Hidden input to send the filename for backup creation -->
                                <input type="hidden" name="backup_name" value="{{ $file->getFilename() }}">
                                <button type="submit" class="btn btn-success">
                                    <i class="ti ti-save"></i> {{ __('backups/index.retrive') }}
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div style="width: 1%;"></div>
        <div style="width: 1%;"></div>
    </div>
</div>

@endsection

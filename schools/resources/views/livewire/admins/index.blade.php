<!-- Content -->
<div class="card">

    <div class="table-responsive text-nowrap">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group">
                        <button onclick="printDiv('admins')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">{{ __('admins/index.print') }}</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button onclick="exportToExcel('admins')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">{{ __('admins/index.export') }}</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <a href="{{ router('admins.create') }}"
                            class="btn btn-secondary create-new btn-primary" tabindex="0"
                            aria-controls="DataTables_Table_0" type="button">
                            <span><i class="ti ti-plus me-sm-1"></i> <span
                                    class="d-none d-sm-inline-block">{{ __('admins/index.add_record') }}</span></span>
                        </a>
                    </div>

                    <div class="btn-group" style="width: 10px;">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label>{{ __('admins/index.show') }}
                            <select wire:model.live="select" name="DataTables_Table_0_length"
                                aria-controls="DataTables_Table_0" class="form-select">
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select> {{ __('admins/index.entries') }}
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                        <label>{{ __('admins/index.search') }}:
                            <input type="search" wire:model.live="search" class="form-control" placeholder=""
                                aria-controls="DataTables_Table_0">
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div id="myTabel">
            <table class="datatables-basic table dataTable no-footer dtr-column collapsed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('admins/index.name') }}</th>
                        <th>{{ __('admins/index.email') }}</th>
                        <th>{{ __('admins/index.last_seen') }}</th>
                        <th>{{ __('admins/index.role') }}</th>
                        <th>{{ __('admins/index.status') }}</th>
                        <th>{{ __('admins/index.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($admins as $admin)
                        <tr>
                            <th>{{ $admin['id'] }}</th>
                            <th>
                                <div>
                                    <strong></strong> {{$admin['name'] }}
                                </div>
                            </th>
                            <th>{{ $admin['email'] }}</th>
                            <th>{{ $admin['last_seen']  }}</th>
                            <th>
                                @forelse ($admin->getRoleNames() as $index => $role)
                                    <span>{{ $role }}{{ !$loop->last ? ',' : '' }}</span>
                                @empty
                                    <span>No roles assigned</span>
                                @endforelse
                            </th>
                            
                            <td>
                                @if ($admin['status'] == 1)
                                    <span class="badge bg-label-primary me-1">
                                        <i class="fas fa-check-circle"></i>
                                        {{ __('admins/index.status_active') }}
                                    </span>
                                @else
                                    <span class="badge bg-label-primary me-1">
                                        <i class="fas fa-times-circle"></i>
                                        {{ __('admins/index.status_inactive') }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ router('admins.edit', ['admin' => $admin['id']]) }}">
                                            <i class="ti ti-pencil"></i> {{ __('admins/index.edit') }}
                                        </a>
                                        <button class="dropdown-item text-danger" type="button"
                                            wire:click="delete({{ $admin['id'] }})"
                                            wire:confirm="{{ __('admins/index.delete_confirm') }}">
                                            <i class="ti ti-trash"></i> {{ __('admins/index.delete') }}
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $admins->links() }}

        <div style="width: 1%;"></div>
        <div style="width: 1%;"></div>
    </div>
</div>
<!-- / Content -->




@script
<script>
        $wire.on('del', (data) => {
            const message = data.message; 
            Swal.fire({
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 2000
            });
        });
</script>
@endscript
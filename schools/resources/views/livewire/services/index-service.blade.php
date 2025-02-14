<!-- Content -->
<div class="card">

    <div class="table-responsive text-nowrap">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group">
                        <button onclick="printDiv('services')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">{{ __('services/index.print') }}</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button onclick="exportToExcel('services')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">{{ __('services/index.export') }}</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <a href="{{ router('services.create') }}" class="btn btn-secondary create-new btn-primary"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button">
                            <span><i class="ti ti-plus me-sm-1"></i> <span
                                    class="d-none d-sm-inline-block">{{ __('services/index.add_record') }}</span></span>
                        </a>
                    </div>

                    <div class="btn-group" style="width: 10px;">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label>{{ __('services/index.show') }}
                            <select wire:model.live="select" name="DataTables_Table_0_length"
                                aria-controls="DataTables_Table_0" class="form-select">
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select> {{ __('services/index.entries') }}
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                        <label>{{ __('services/index.search') }}:
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
                        <th>{{ __('services/index.name') }}</th>
                        <th>{{ __('services/index.status') }}</th>
                        <th>{{ __('services/index.slug') }}</th>
                        <th>{{ __('services/index.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($servics as $service)
                        <tr>
                            <th>{{ $service['id'] }}</th>
                            <th>
                                <div>
                                    <strong>Arabic:</strong> {{ json_decode($service['name'], true)['ar'] }}
                                </div>
                                <div>
                                    <strong>English:</strong> {{ json_decode($service['name'], true)['en'] }}
                                </div>
                            </th>
                            <td>
                                @if ($service['status'] == 1)
                                    <span class="badge bg-label-primary me-1">
                                        <i class="fas fa-check-circle"></i>
                                        {{ __('services/index.status_active') }}
                                    </span>
                                @else
                                    <span class="badge bg-label-primary me-1">
                                        <i class="fas fa-times-circle"></i>
                                        {{ __('services/index.status_inactive') }}
                                    </span>
                                @endif
                            </td>
                            <th>
                                <div>
                                    <strong>Arabic:</strong> {{ json_decode($service['slug'], true)['ar'] }}
                                </div>
                                <div>
                                    <strong>English:</strong> {{ json_decode($service['slug'], true)['en'] }}
                                </div>
                            </th>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ router('services.edit', ['service' => $service['id']]) }}">
                                            <i class="ti ti-pencil"></i> {{ __('services/index.edit') }}
                                        </a>

                                        <a class="dropdown-item"
                                            href="{{ router('sub_services.create', [
                                                'service' => $service['id'],
                                            ]) }}">
                                            <i class="ti ti-plus"></i> {{ __('services/index.create_sub_services') }}
                                        </a>

                                        <a class="dropdown-item"
                                            href="{{ router('sub_services.dash.index', [
                                                'service' => $service['id'],
                                            ]) }}">
                                            <i class="ti ti-list"></i> {{ __('services/index.index_sub_services') }}
                                        </a>


                                        <a class="dropdown-item"
                                            href="{{ route('pricing-plans.create', [
                                                'id' => $service['id'],
                                                'model' => 'Services',
                                            ]) }}">
                                            <i class="fas fa-cogs"></i> {{ __('services/index.assign_plan') }}
                                        </a>

                                        <a class="dropdown-item"
                                            href="{{ route('pricing-plans.index', [
                                                'id' => $service['id'],
                                                'model' => 'Services',
                                            ]) }}">
                                            <i class="fas fa-eye"></i> {{ __('services/index.plans_view') }}
                                        </a>


                                        <button class="dropdown-item text-danger" type="button"
                                            wire:click="delete({{ $service['id'] }})"
                                            wire:confirm="{{ __('services/index.delete_confirm') }}">
                                            <i class="ti ti-trash"></i> {{ __('services/index.delete') }}
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $servics->links() }}

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

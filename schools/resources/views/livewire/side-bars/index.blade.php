<!-- Content -->
<div class="card">

    <div class="table-responsive text-nowrap">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group">
                        <button onclick="printDiv('side_bar')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">{{ __('side_bar/index.print') }}</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button onclick="exportToExcel('side_bar')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">{{ __('side_bar/index.export') }}</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <a href="{{ router('side_bar.create') }}"
                            class="btn btn-secondary create-new btn-primary" tabindex="0"
                            aria-controls="DataTables_Table_0" type="button">
                            <span><i class="ti ti-plus me-sm-1"></i> <span
                                    class="d-none d-sm-inline-block">{{ __('side_bar/index.add_record') }}</span></span>
                        </a>
                    </div>

                    <div class="btn-group" style="width: 10px;">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label>{{ __('side_bar/index.show') }}
                            <select wire:model.live="select" name="DataTables_Table_0_length"
                                aria-controls="DataTables_Table_0" class="form-select">
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select> {{ __('side_bar/index.entries') }}
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                        <label>{{ __('side_bar/index.search') }}:
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
                        <th>{{ __('side_bar/index.name') }}</th>
                        <th>{{ __('side_bar/index.desc') }}</th>
                        <th>{{ __('side_bar/index.status') }}</th>
                        <th>{{ __('side_bar/index.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($sidebars as $sidebar)
                        <tr>
                            <th>{{ $sidebar['id'] }}</th>
                            <th>
                                <div>
                                    <strong>Arabic:</strong> {{ json_decode($sidebar['name'], true)['ar'] }}
                                </div>
                                <div>
                                    <strong>English:</strong> {{ json_decode($sidebar['name'], true)['en'] }}
                                </div>
                            </th>


                            <th>
                                @if ($sidebar->blog && $sidebar->blog->desc)
                                    <div>
                                        <strong>Arabic:</strong>
                                        {{ Illuminate\Support\Str::limit(json_decode($sidebar->blog->desc, true)['ar'] ?? '', 10, '...') }}
                                    </div>
                                    <div>
                                        <strong>English:</strong>
                                        {{ Illuminate\Support\Str::limit(json_decode($sidebar->blog->desc, true)['en'] ?? '', 10, '...') }}
                                    </div>
                                @else
                                    <div>No description available</div>
                                @endif
                            </th>

                            <th>
                                <div>
                                    {{ $sidebar['type'] }}
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
                                            href="{{   route('side_bar.edit',[ 'side_bar' => $sidebar['id'] ]  )  }}"
                                            >
                                            <i class="ti ti-pencil"></i> {{ __('side_bar/index.edit') }}
                                        </a>

                                        <button class="dropdown-item text-danger" type="button"
                                            wire:click="delete({{ $sidebar['id'] }})"
                                            wire:confirm="{{ __('side_bar/index.delete_confirm') }}">
                                            <i class="ti ti-trash"></i> {{ __('side_bar/index.delete') }}
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $sidebars->links() }}

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

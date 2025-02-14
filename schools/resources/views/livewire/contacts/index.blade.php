<!-- Content -->
<div class="card">

    <div class="table-responsive text-nowrap">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group">
                        <button onclick="printDiv('contacts')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">{{ __('contacts/index.print') }}</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button onclick="exportToExcel('contacts')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">{{ __('contacts/index.export') }}</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>


                    <div class="btn-group" style="width: 10px;">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label>{{ __('contacts/index.show') }}
                            <select wire:model.live="select" name="DataTables_Table_0_length"
                                aria-controls="DataTables_Table_0" class="form-select">
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select> {{ __('contacts/index.entries') }}
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                        <label>{{ __('contacts/index.search') }}:
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
                        <th>{{ __('contacts/index.name') }}</th>
                        <th>{{ __('contacts/index.contacts') }}</th>
                        <th>{{ __('contacts/index.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($contacts as $contact)
                        <tr>
                            <!-- Name Column -->
                            <td>
                                <i class="ti ti-user text-primary"></i> {{ $contact->name }}
                            </td>
                
                            <!-- Email & Phone Column -->
                            <td>
                                <i class="ti ti-mail text-secondary"></i> {{ $contact->email }} <br>
                                <i class="ti ti-phone text-success"></i> {{ $contact->phone }}
                            </td>
                
                            <!-- Actions Column -->
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Delete Contact -->
                                        <button class="dropdown-item text-danger" type="button"
                                            wire:click="delete({{ $contact->id }})"
                                            wire:confirm="{{ __('contacts/index.delete_confirm') }}">
                                            <i class="ti ti-trash"></i> {{ __('contacts/index.delete') }}
                                        </button>
                
                                        <!-- Reply Contact -->
                                        <a class="dropdown-item text-dark" type="button"
                                            href="{{ route('contacts.show', ['contact' => $contact->id, 'slug' => 'replay']) }}">
                                            <i class="ti ti-mail-forward"></i> {{ __('contacts/index.replay') }}
                                        </a>
                
                                        <!-- Show Message in Modal -->
                                        <button class="dropdown-item text-dark" type="button"
                                            data-bs-toggle="modal" data-bs-target="#messageModal{{ $contact->id }}">
                                            <i class="ti ti-message-circle"></i> {{ __('contacts/index.show') }}
                                        </button>
                
                                        <!-- Redirect Contact -->
                                        <a class="dropdown-item text-dark" type="button"
                                            href="{{ route('contacts.show', ['contact' => $contact->id, 'slug' => 'redirect']) }}">
                                            <i class="ti ti-send"></i> {{ __('contacts/index.redirect') }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                
                        <!-- Message Modal -->
                        <div class="modal fade" id="messageModal{{ $contact->id }}" tabindex="-1" aria-labelledby="messageModalLabel{{ $contact->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="messageModalLabel{{ $contact->id }}">
                                            <i class="ti ti-message-circle"></i> {{ __('contacts/index.message') }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $contact->message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                
                    @endforeach
                </tbody>
                
            </table>
        </div>
        

        {{ $contacts->links() }}

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

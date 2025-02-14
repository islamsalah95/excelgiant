<div class="card-body">
    <div class="table-responsive text-nowrap" id="myTabel">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group" style="width: 10px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label>
                            <select wire:model.live="select" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                        <label>@lang('services/index.search')
                            <input type="search" wire:model.live="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0">
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped" id="categoriesTable">
            <thead>
                <tr>
                    <th>@lang('services/index.name')</th>
                    <th>@lang('services/index.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $role)
                <tr>
                    <td>{{ $role->name ?? '' }}</td>
                    <td>
                        <form action="{{ router('roles.destroy', ['role' => $role->id]) }}" method="POST" style="display: flex; align-items: center; gap: 0.5rem;">
                            <a class="btn btn-info" href="{{ router('roles.show', ['role' => $role->id]) }}">@lang('services/index.show')</a>
                            @can('role-edit')
                                <a class="btn btn-primary" href="{{ router('roles.edit', ['role' => $role->id]) }}">@lang('services/index.edit')</a>
                            @endcan
                            @csrf
                            @method('DELETE')
                            @can('role-delete')
                                <button type="submit" class="btn btn-danger">@lang('services/index.delete')</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $data->links() }}
    </div>
</div>

<div class="card-body">
    <div class="d-flex justify-content-between mb-3">
        <div class="dataTables_length">
            <label>Show
                <select wire:model.live="select" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                    <option value="5">5</option>
                    <option value="7">7</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                </select> entries
            </label>
        </div>
        <div class="dataTables_filter">
            <label>Search:
                <input type="search" wire:model.live="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0">
            </label>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    @foreach ($customAttributes as $attribute)
                        <th>{{ $attribute }}</th>
                    @endforeach
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dataItems as $item)
                    <tr>
                        @foreach ($customAttributes as $attribute)
                            @if($attribute === 'image')
                                <td>
                                    @if (!empty($item->getFirstMediaUrl('produts')))
                                        <img src="{{ $item->getFirstMediaUrl('produts') }}" alt="{{ $item->name }}" style="max-width: 50%;">
                                    @endif
                                </td>
                            @elseif($attribute === 'category')
                                <td>${{ $item->{$attribute} }}</td>
                            @elseif($attribute === 'price')
                                <td>${{ $item->{$attribute} }}</td>
                            @elseif($attribute === 'categoryProduct')
                                <td>{{ $item->categoryProduct->name }}</td>
                            @else
                                <td>{{ $item->{$attribute} }}</td>
                            @endif
                        @endforeach
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('products.show', $item->id) }}" class="btn btn-info btn-sm me-2">View</a>
                                <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                <form action="{{ route('products.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($customAttributes) + 1 }}" class="text-center">No Items found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $dataItems->links() }}
</div>
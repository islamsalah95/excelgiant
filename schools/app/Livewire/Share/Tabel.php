<?php

namespace App\Livewire\Share;

use Livewire\Component;
use Livewire\WithPagination;

class Tabel extends Component
{
    use WithPagination;

    public $customAttributes;
    public $query;
    public $yourModel;
    public $select;
    public $search;

    public function mount($customAttributes, $query, $yourModel, $select = 10)
    {
        $this->customAttributes = $customAttributes;
        $this->query = $query;
        $this->yourModel = $yourModel;
        $this->select = $select;
    }

    public function render()
    {
        $dataItems = $this->executeQuery();

        return view('livewire.share.tabel', [
            'customAttributes' => $this->customAttributes,
            'dataItems' => $dataItems,
        ]);
    }


    protected function executeQuery()
    {
        $modelClass = "\\App\\Models\\" . $this->yourModel;
        $model = app($modelClass);
        
        $queryBuilder = $model::query();
    
        foreach ($this->query as $key => $value) {
            if ($key == "where") {
                $queryBuilder->where($value['column'], $value['operator'], $value['value']);
            } elseif ($key == "with") {
                $queryBuilder->with($value);
            }
        }
    
        // Apply the search condition if it's set
        if (!empty($this->search)) {
            $queryBuilder->where('name', 'like', "%{$this->search}%");
        }
    
        return $queryBuilder->paginate($this->select);
    }
    
    
}


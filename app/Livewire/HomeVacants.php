<?php

namespace App\Livewire;

use App\Models\Vacant;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class HomeVacants extends Component
{

    use WithPagination;

    public $title;
    public $category_id;
    public $salary_id;

    #[On('lookData')]
    public function lookData($title, $category_id, $salary_id)
    {
        $this->title = $title;
        $this->category_id = $category_id;
        $this->salary_id = $salary_id;
        $this->resetPage();
    }

    public function render()
    {
        #$vacants = Vacant::where('published', 1)->paginate(2);

        // $vacants = Vacant::when($this->title, function(Builder $query) {
        //     $query->where('title', 'LIKE', "%" . $this->title . "%");
        // })->when($this->category_id, function(Builder $query){
        //     $query->where('category_id', $this->category_id);
        // })->when($this->salary_id, function(Builder $query){
        //     $query->where('salary_id', $this->salary_id);
        // })->paginate(10);

        // $vacants = Vacant::when($this->title, fn(Builder $query) => 
        //     $query->where('title', 'LIKE', "%" . $this->title . "%")
        // )->when($this->title, fn(Builder $query) => 
        //     $query->orwhere('enterprise', 'LIKE', "%" . $this->title . "%")
        // )->when($this->category_id, fn(Builder $query) =>
        //     $query->where('category_id', $this->category_id)
        // )->when($this->salary_id, fn(Builder $query) =>
        //     $query->where('salary_id', $this->salary_id)
        // )->paginate(1);

        $vacants = Vacant::when($this->title, function (Builder $query) {
            $query->where(function (Builder $query) {
                $query->where('title', 'LIKE', "%{$this->title}%")
                    ->orWhere('enterprise', 'LIKE', "%{$this->title}%");
            });
        })
        ->when($this->category_id, fn(Builder $query) =>
            $query->where('category_id', $this->category_id)
        )
        ->when($this->salary_id, fn(Builder $query) =>
            $query->where('salary_id', $this->salary_id)
        )
        ->paginate(10);

        return view('livewire.home-vacants', [
            'vacants' => $vacants
        ]);
    }
}

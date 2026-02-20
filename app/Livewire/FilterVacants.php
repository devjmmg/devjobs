<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FilterVacants extends Component
{

    public $title;
    public $category_id;
    public $salary_id;

    public function readDataForm()
    {
        $this->dispatch('lookData', $this->title, $this->category_id, $this->salary_id);
    }

    public function render()
    {
        $categories = Category::all();
        $salaries = Salary::all();
        return view('livewire.filter-vacants', [
            'categories' => $categories,
            'salaries' => $salaries,
        ]);
    }
}

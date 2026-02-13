<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{

    public $title = '';
    public $salary_id = '';
    public $category_id = '';
    public $enterprise = '';
    public $last_day = '';
    public $description = '';
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string|max:255',
        'salary_id' => 'required|numeric',
        'category_id' => 'required|numeric',
        'enterprise' => 'required|string|max:255',
        'last_day' => 'required|date',
        'description' => 'required|string',
        'image' => 'required|image|max:2048'
    ];

    protected $messages = [
        'title.required' => 'El título es obligatorio',
        'title.string' => 'El título debe ser texto',
        'title.max' => 'El título no debe superar 255 caracteres',

        'salary_id.required' => 'Debes seleccionar un salario',
        'category_id.required' => 'Debes seleccionar una categoría',
        'enterprise.required' => 'La empresa es obligatoria',

        'last_day.required' => 'La fecha es obligatoria',
        'last_day.date' => 'Debe ser una fecha válida',

        'description.required' => 'La descripción es obligatoria',

        'image.required' => 'La imagen es obligatoria',
        'image.image' => 'El archivo debe ser una imagen',
        'image.max' => 'La imagen no debe pesar más de 2MB',
    ];

    public function crearVacante()
    {
        $data = $this->validate();

        //Almacenar imagen
        $img = $this->image->store('public/vacants');
        $nameImg = str_replace('public/vacants/', '', $img);

        Vacant::create([
            'title' => $data['title'],
            'salary_id' => $data['salary_id'],
            'category_id' => $data['category_id'],
            'enterprise' => $data['enterprise'],
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $nameImg,
            'user_id' => auth()->user()->id,
        ]);

        //Crear mensaje
        session()->flash('message', 'Vacante creada correctamente');
        
        return redirect()->route('vacants.index');
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        return view('livewire.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}

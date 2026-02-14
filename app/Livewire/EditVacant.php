<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVacant extends Component
{

    use WithFileUploads;

    public Vacant $vacant;

    public $published = '';
    public $title = '';
    public $salary_id = '';
    public $category_id = '';
    public $enterprise = '';
    public $last_day = '';
    public $description = '';
    public $image;
    public $image_current;

    protected $rules = [
        'published' => 'required|boolean',
        'title' => 'required|string|max:255',
        'salary_id' => 'required|numeric',
        'category_id' => 'required|numeric',
        'enterprise' => 'required|string|max:255',
        'last_day' => 'required|date',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048'
    ];

    protected $messages = [

        'published.required' => 'Selecciona si la vacante estará publicada',
        'published.boolean' => 'El valor de publicación no es válido',


        'title.required' => 'El título es obligatorio',
        'title.string' => 'El título debe ser texto',
        'title.max' => 'El título no debe superar 255 caracteres',

        'salary_id.required' => 'Debes seleccionar un salario',
        'category_id.required' => 'Debes seleccionar una categoría',
        'enterprise.required' => 'La empresa es obligatoria',

        'last_day.required' => 'La fecha es obligatoria',
        'last_day.date' => 'Debe ser una fecha válida',

        'description.required' => 'La descripción es obligatoria',

        'image.image' => 'El archivo debe ser una imagen',
        'image.max' => 'La imagen no debe pesar más de 2MB',
    ];
    
    public function mount(Vacant $vacant)
    {

        $this->vacant = $vacant;

        $this->published = $vacant->published ? '1' : '0';
        $this->title = $vacant->title;
        $this->salary_id = $vacant->salary_id;
        $this->category_id = $vacant->category_id;
        $this->enterprise = $vacant->enterprise;
        $this->last_day = Carbon::parse($vacant->last_day)->format('Y-m-d');
        $this->description = $vacant->description;
        $this->image_current = $vacant->image;
    }

    public function editVacant()
    {

        $data = $this->validate();

        if ($this->image) {
            if ( $this->image_current) {
                Storage::disk('public')->delete('vacants/' .  $this->image_current);
            }
            $path = $this->image->store('vacants', 'public');
            $data['image'] = basename($path);
        }

        if (!$this->image) {
            unset($data['image']);
        }

        // $this->vacant->update([
        //     'published' => $data['published'],
        //     'title' => $data['title'],
        //     'salary_id' => $data['salary_id'],
        //     'category_id' => $data['category_id'],
        //     'enterprise' => $data['enterprise'],
        //     'last_day' => $data['last_day'],
        //     'description' => $data['description'],
        //     'image' => $data['image'] ?? $this->image_current
        // ]);

        $this->vacant->update($data);

        session()->flash('message', 'Vacante editada correctamente');
        
        return redirect()->route('vacants.index');

    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        return view('livewire.edit-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}

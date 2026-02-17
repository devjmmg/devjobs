<?php

namespace App\Livewire;

use App\Models\Candidate;
use App\Models\Vacant;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacant extends Component
{

    use WithFileUploads;

    public $cv;
    public Vacant $vacant;
    public $hasApplied;

    public function mount(Vacant $vacant)
    {
        $this->vacant = $vacant;
        $this->hasApplied = $vacant->hasApplied(auth()->user()->id);
    }

    protected $rules = [
        'cv' => 'required|file|mimes:pdf|max:1024'
    ];

    protected $messages = [
        'cv.required' => 'El curriculum vitae es obligatorio.',
        'cv.file' => 'Debes subir un archivo válido.',
        'cv.mimes' => 'El CV debe estar en formato PDF.',
        'cv.max' => 'El CV no debe pesar más de 1MB.',
    ];

    public function applyVacant()
    {

        $this->validate();

        $cv = $this->cv->store('cv','public');
        $cvname = basename($cv);

        $this->vacant->candidates()->create([
            'cv' => $cvname,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'Postulación enviada correctamente. ¡Buena suerte!');

        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.apply-vacant');
    }
}

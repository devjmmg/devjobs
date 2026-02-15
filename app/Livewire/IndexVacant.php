<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class IndexVacant extends Component
{
    #[On('deleteVacant')]
    public function deleteVacant(Vacant $vacant)
    {
        if ($vacant->image && Storage::disk('public')->exists('vacants/' . $vacant->image)) {
            Storage::disk('public')->delete('vacants/' . $vacant->image);
        }
        $vacant->delete();
    }

    public function render()
    {
        $vacants = Vacant::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.index-vacant',[
            'vacants' => $vacants 
        ]);
    }
}


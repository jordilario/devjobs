<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function postularme(){

        $datos = $this->validate();
        
        $cvToUpload = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cvToUpload);

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        session()->flash('mensaje', 'Se envió correctamente tu información. Mucha suerte!');

        return redirect()->back();

    }


    public function render()
    {
        return view('livewire.postular-vacante');
    }
}

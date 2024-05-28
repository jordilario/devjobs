<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion_puesto;
    public $imagen ;


    protected $rules = [
        'titulo'  => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa'  => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion_puesto' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    use WithFileUploads;

    public function crearVacante(){
        $datos = $this->validate();

        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        Vacante::create([
            'titulo'  => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa'  => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion_puesto' => $datos['descripcion_puesto'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id
        ]);

        

        session()->flash('message', 'La vacante se publicó correctamente.');

        return redirect()->route('vacantes.index');

    }


    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}

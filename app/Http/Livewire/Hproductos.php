<?php

namespace App\Http\Livewire;

use App\Models\Productos;
use Livewire\Component;

class Hproductos extends Component
{
    public $titulo, $descripcion, $valor, $activo, $img;

    public function crear()
    {
        $this->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'activo' => 'required',
            // 'img' => 'required',
        ],[
            'titulo.required' => 'El campo Titulo es obligatorio',
            'titulo.string' => 'El campo Titulo recibe solo cadena de texto',
            'titulo.max' => 'El campo Titulo debe contener maximo 100 caracteres',
            'descripcion.required' => 'El campo Descripcion es obligatorio',
            'descripcion.string' => 'El campo Descripcion recibe solo cadena de texto',
            'descripcion.max' => 'El campo Descripcion debe contener maximo 255 caracteres',
            'valor.required' => 'El campo Valor es obligatorio',
            'valor.string' => 'El campo Valor recibe solo numeros enteros',
            'activo.required' => 'El campo Activo es obligatorio',
        ]);
       
        $contenido = new Productos();
        $contenido->titulo = $this->titulo;
        $contenido->descripcion = $this->descripcion;
        $contenido->valor = $this->valor;
        $contenido->activo =  $this->activo;
        $contenido->save();
        $this->reset();
        // $msj = [''];
        $this->emit('ok', '!Registrado!', 'Se registro el Contenido', 'success');
        // $this->emitUp('algo');
        $this->emitUp('crear_producto');

    }

    public function render()
    {
        return view('livewire.hproductos');
    }
}

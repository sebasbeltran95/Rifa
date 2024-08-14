<?php

namespace App\Http\Livewire;

use App\Models\Productos as ModelsProductos;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;



class Productos extends Component
{
    use WithPagination; 
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $titulo, $descripcion, $valor, $activo, $files = [], $imagenes = [];
    public $idx, $titulox, $descripcionx, $valorx, $activox;
    public $idy, $descripciony;


    // protected $listeners = ['algo' => 'actualizar'];
    // protected $listeners = ['crear_producto'];
    protected $listeners = ['render', 'delete'];


    // public function crear_producto(){
    //     $this->render();
    // }


    public function getProductosProperty()
    {
        if($this->search == ""){
            return ModelsProductos::orderBy('id','DESC')->paginate(5);
           
        } else {
            return ModelsProductos::
            orWhere('titulo', 'LIKE', '%'.$this->search.'%')
            ->orWhere('descripcion', 'LIKE', '%'.$this->search.'%')
            ->orWhere('valor', 'LIKE', '%'.$this->search.'%')
            ->paginate(3);
        }
    }

    public function crear()
    {
        $this->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'activo' => 'required',
            // 'files.*' => 'min:1|dimensions:min_width=1500,min_height=1000',
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
            // 'files.*.min' => 'El campo Imagenes es obligatorio',
            // 'files.*.dimensions' => 'El tamaño de la imagen no es correcto, use imagenes de 1500px * 800px',
        ]);
       
        $d = new ModelsProductos();
        $d->titulo = $this->titulo;
        $d->descripcion = $this->descripcion;
        $d->valor = $this->valor;
        $d->activo =  $this->activo;
        $d->save();
       
        if (!is_dir('inventario/'.$d->id)) {
            File::makeDirectory('inventario/'.$d->id);
        }
        foreach ($this->files as $file) {
            $file->storeAs('inventario/'.$d->id, $file->getClientOriginalName(), 'real');
            array_push($this->imagenes, 'inventario/'.$d->id.'/'.$file->getClientOriginalName());
        }
        $f = ModelsProductos::find($d->id);
        $f->imagenes = json_encode($this->imagenes, true);
        $f->save();
        $this->reset();
        $msj = ['!Registrado!', 'Se registro la Compra', 'success'];
        $this->emit('ok', $msj);
    }

    public function cargarservicio($obj){
        $this->idy = $obj['id'];
        $this->descripciony = $obj['descripcion'];
    }
    public function datacliente($obj)
    {
        $this->idx = $obj['id'];
        $this->titulox =  $obj['titulo'];
        $this->descripcionx = $obj['descripcion'];
        $this->valorx = $obj['valor'];
        $this->activox = $obj['activo'];
    }

    public function actualizar()
    {
        $data = ModelsProductos::find($this->idx);
        $data->titulo = $this->titulox;
        $data->descripcion = $this->descripcionx;
        $data->valor = $this->valorx;
        $data->activo = $this->activox;
        $data->save();
        $msj = ['!Actualizado!', 'Se actualizo el Producto', 'success'];
        $this->emit('ok', $msj);
    }



    public function delete($post)
    {
        ModelsProductos::where('id',$post)->first()->delete();
    }


    public function render()
    {
        return view('livewire.productos')->extends('layouts.plantilla_back')->section('contenido');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Productos;
use Livewire\Component;

class Principal extends Component
{
    public function getProductosProperty()
    {
        return Productos::orderBy('id','DESC')->get();
    }






    public function render()
    {
        return view('livewire.principal')->extends('layouts.plantilla')->section('content');
    }
}

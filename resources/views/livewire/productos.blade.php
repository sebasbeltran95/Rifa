<div>
   @section('title', 'Productos')
   <div class="container-fluid">
       <div class="row text-center mb-3">
           <div class="col-md-12 d-flex justify-content-between align-items-center">
               <h1 class="display-1">Productos</h1>
               <button class="btn btn-primary rounded-circle abrir" data-toggle="modal" data-target="#modalCrearClientes">+</button>
           </div>
       </div>
       <div class="row">
           <div class="col-12">
               <div class="table-responsive">
                   <table class="table  table-hover table-bordered">
                       <thead>
                           <th colspan="6">
                               <div class="input-group input-group-sm">
                                   <input type="text" class="form-control"
                                   placeholder="Ingrese Seccion o titulo"
                                   wire:model="search">
                               </div>
                           </th>
                           <tr>
                               <th class="text-center">Titulo</th>
                               <th class="text-center">Descripcion</th>
                               <th class="text-center">Valor</th>
                               <th class="text-center">Imagen</th>
                               <th class="text-center">Activo</th>
                               <th class="text-center">Acciones</th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse ($this->productos as $c)
                           <tr>
                               <td class="text-center">{{ $c->titulo }}</td>
                               <td class="text-center">
                                    @if($c->descripcion != "")
                                        <button type="button" class="btn btn-primary" wire:click="cargarservicio({{$c}})" data-toggle="modal" data-target="#verObs"><i class="fab fa-sistrix"></i></button>
                                    @endif
                                </td>
                               <td class="text-center">${{ number_format($c->valor) }}</td>
                               <td class="text-cente">
                                    @foreach (json_decode($c->imagenes) as $img)
                                        <img src="{{ asset($img) }}" class="img-fluid mx-auto d-block" width="290px">
                                    @endforeach
                                </td>
                               @if($c->activo == 1)
                                   <td class="text-center"0>SI</td>
                               @else
                                   <td class="text-center"0>NO</td>
                               @endif
                               <td class="d-flex justify-content-center">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-sm btn-warning"
                                            wire:click="datacliente({{ $c }})" data-toggle="modal"
                                            data-target="#Modaleditar"><i class="fas fa-user-edit"></i></button>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            wire:click="$emit('deletePost',{{$c->id}})"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                           </tr>
                           @empty
                               <tr>
                                   <td colspan="6" class="text-center">No hay registros</td>
                           </tr>
                           @endforelse
                       </tbody>
                   </table>
                   {{ $this->productos->links() }}
               </div>
           </div>
       </div>

       {{-- Modal crear Cliente --}}
       <div class="modal fade" id="modalCrearClientes" tabindex="-1" wire:ignore.self>
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <div class="modal-header">
                       <h4 class="modal-title">Crear Producto</h4>
                       <button type="button" class="btn btn-danger btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times-circle"></i></button>
                   </div>
                   <div class="modal-body">
                    {{--  @livewire('hproductos')  --}}
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label class="@error('titulo') text-danger @enderror">Titulo</label>
                                        <input type="text" class="form-control @error('titulo') text-danger @enderror" wire:model="titulo">
                                        <i class="text-danger">
                                            @error('titulo') {{ $message }} @enderror
                                        </i>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="@error('descripcion') text-danger @enderror">Descripcion</label>
                                        <textarea class="form-control @error('descripcion') text-danger @enderror" wire:model="descripcion" rows="3"></textarea>
                                        <i class="text-danger">
                                            @error('descripcion') {{ $message }} @enderror
                                        </i>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="@error('valor') text-danger @enderror">Valor</label>
                                        <input type="number" class="form-control @error('valor') text-danger @enderror" wire:model="valor">
                                        <i class="text-danger">
                                            @error('valor') {{ $message }} @enderror
                                        </i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="@error('activo') text-danger @enderror">Activo</label>
                                        <select class="form-control @error('activo') text-danger @enderror" wire:model="activo">
                                            <option value="">Seleccione una opción...</option>
                                            <option value="1">SI</option>
                                            <option value="0">NO</option>
                                        </select>
                                        <i class="text-danger">
                                            @error('activo') {{ $message }} @enderror
                                        </i>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="@error('files') text-danger @enderror">Imagenes</label>
                                        <input type="file" class="form-control @error('files') text-danger @enderror" wire:model="files" multiple>
                                        <i class="text-danger"> 
                                             @error('files') {{ $message }} @enderror 
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="row d-flex justify-content-center mt-4">
                        @if (count($files) > 0)
                            @foreach ($files as $item)
                            <div class="col-2">
                                <img class="img-fluid" src="{{ $item->temporaryUrl() }}">
                            </div>
                            @endforeach
                        @endif
                    </div>
                   <div class="modal-footer">
                       <button class="btn btn-primary" wire:click='crear'>Registrar Contenido</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                   </div>
               </div>
           </div>
       </div>
       {{-- Fin modal crear Cliente --}}

        {{--  modal descripcion   --}}
        <div class="modal fade" id="verObs" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5">Descripcion</h5>
                        <button type="button" class="btn btn-danger btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times-circle"></i></button>
                    </div>
                    <div class="modal-body">
                        <p style="text-align: justify" >{{$descripciony}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 
        {{--  modal descripcion   --}}

        {{--  editar   --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="Modaleditar" tabindex="-1" wire:ignore.self>
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Producto</h4>
                                    <button type="button" class="btn btn-danger btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times-circle"></i></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group mb-2">
                                                    <label class="@error('titulo') text-danger @enderror">Titulo</label>
                                                    <input type="text" class="form-control @error('titulo') text-danger @enderror" wire:model="titulox">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label class="@error('descripcion') text-danger @enderror">Descripcion</label>
                                                    <textarea class="form-control @error('descripcion') text-danger @enderror" wire:model="descripcionx" rows="3"></textarea>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label class="@error('valor') text-danger @enderror">Valor</label>
                                                    <input type="number" class="form-control @error('valor') text-danger @enderror" wire:model="valorx">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="@error('activo') text-danger @enderror">Activo</label>
                                                    <select class="form-control @error('activo') text-danger @enderror" wire:model="activox">
                                                        <option value="">Seleccione una opción...</option>
                                                        <option value="1">SI</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" wire:click="actualizar">Editar
                                        Producto</button>
                                    <button type="button" class="btn btn-danger"
                                        data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  editar   --}}
   </div> 
</div>
@push('js')
<script>
    Livewire.on('ok', msj =>{
        Swal.fire(
            msj[0],
            msj[1],
            msj[2],
        )
    });
    livewire.on('deletePost', postId => {
        Swal.fire({
            title: "¿Estas Seguro?",
            text: "¿Desea Eliminar este registro?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "SI"
        }).then((result) => {
            if (result.isConfirmed) {
                livewire.emitTo('productos', 'delete', postId);

                Swal.fire({
                title: "!Eliminado!",
                text: "Se elimino la Venta",
                icon: "success"
                });
            }
        });
    });
</script>
@endpush
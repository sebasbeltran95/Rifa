<div>
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
                {{--  <div class="form-group mb-2">
                    <label class="@error('files') text-danger @enderror">Imagenes</label>
                    <input type="file" class="form-control @error('files') text-danger @enderror" wire:model="files" multiple>
                    <i class="text-danger">  @error('files') {{ $message }} @enderror </i>
                </div>  --}}
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
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary" wire:click='crear'>Registrar Producto</button>
            </div>
        </div>
    </div>
</div>
@push('js')
    {{--  Livewire.on('ok', msj =>{
        Swal.fire(
            msj[0],
            msj[1],
            msj[2],
        )
    });  --}}
    
    {{--  Livewire.on('ok', (msj) => {
        Swal.fire({
            title: "MUY BIEN",
            text: msj,
            icon: "success"
        });
        quill.setText('');
    });  --}}
@endpush
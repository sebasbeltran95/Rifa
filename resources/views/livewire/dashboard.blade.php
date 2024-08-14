<div>
@section('title', 'Dashboard')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              {{--  <h3>{{ $tcontenido }}</h3>  --}}
              <p>Contenido</p>
            </div>
            <div class="icon">
              <i class="las la-file-pdf"></i>
            </div>
            <a href="{{ route('productos') }}" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              {{--  <h3>{{ $tcontactos }}</h3>  --}}

              <p>Contactos</p>
            </div>
            <div class="icon">
              <i class="las la-id-card"></i>
            </div>
            <a href="{{ route('productos') }}" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

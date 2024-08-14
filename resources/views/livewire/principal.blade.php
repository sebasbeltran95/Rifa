<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-black text-center">
                <img src="{{ asset('img/logo1.png') }}" class="img-fluid" width="13%" id="icon" alt="User Icon" />
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 mb-5">
            @foreach ($this->productos  as $item)
                <div class="col-12">
                    <h1 class="fuente_titulo text-uppercase">{{$item->titulo}}</h1> <br>
                </div>
                <div class="col-12">
                  @foreach (json_decode($item->imagenes) as $img)
                    <img src="{{ asset($img) }}" class="img-fluid mx-auto d-block" width="700px">
                  @endforeach
                </div>
                <div class="col-12">
                    <p class="fuente_parrafo">
                        {{$item->descripcion}}
                    </p>
                </div>
                <div class="col-12">
                    <h2 class="text-center" style="color: #CF1414; font-size: 60px; font-weight: bold;">Valor</h2>
                    <p style="text-align: center; color: #CF1414;  font-size: 50px; font-weight: bold;">
                        ${{ number_format($item->valor) }}
                    </p>
                </div>
                <hr>
            @endforeach
        </div>
        <div class="row mt-5">
          <div class="col-12">
              <h2 class="fuente_titulo text-uppercase">
                Proximos eventos
              </h2>
          </div>
          <div class="col-12">

          </div>
        </div>
    </div>
    <footer class="bg-black text-white text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase">Footer Content</h5>
      
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                voluptatem veniam, est atque cumque eum delectus sint!
              </p>
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Links</h5>
      
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white">Link 1</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Link 2</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Link 3</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Link 4</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-0">Links</h5>
      
              <ul class="list-unstyled">
                <li>
                  <a href="#!" class="text-white">Link 1</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Link 2</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Link 3</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Link 4</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2020 Copyright:
          <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
      </footer>
</div>

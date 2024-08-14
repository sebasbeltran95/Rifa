<!DOCTYPE html>
<html lang="en">
    @include('layouts.comun.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
          </ul>
        </nav>
      
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <a href="{{ route('dashboard') }}" class="brand-link">
            <span class="brand-text font-weight-light">Epoxy</span>
          </a>
          <div class="sidebar">
            <nav class="mt-2 d-flex flex-column" style="height: 90vh;">
              <ul class="nav nav-pills nav-sidebar flex-column p-0" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                  <a class="nav-link @if (Request::is('dashboard')) active @endif" href="{{ route('dashboard') }}">
                    <i class="las la-tachometer-alt"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if (Request::is('productos')) active @endif" href="{{ route('productos') }}">
                    <i class="las la-box"></i>
                    <p>
                      Productos
                    </p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-pills nav-sidebar flex-column mt-auto p-0" data-widget="treeview" role="menu" data-accordion="false">
                <li class="text-center">
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="btn btn-danger w-100" type="submit">Salir</button>
                  </form>
                </li> 
              </ul>
            </nav>
          </div>
        </aside>
      
        <div class="content-wrapper">
          @yield('contenido')
        </div>
      </div>
    @include('layouts.comun.footer')
</body>
</html>
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <a href="{{ route('homepage') }}" class="logo me-auto me-lg-0"><img src={{ asset('assets/img/logo.png') }} alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Chi siamo</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Galleria</a></li>
          <li><a class="nav-link scrollto" href="#specials">Attività</a></li>
          @if($events->count() > 0)
            <li><a class="nav-link scrollto" href="#events">Eventi</a></li>
          @endif
          @if($menuItems->count() > 0)
            <li><a class="nav-link scrollto" href="#menu">Menù </a></li>
          @endif

          <li><a class="nav-link scrollto" href="#contact">Contatti</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #097B96">
    <div class="container-fluid" style="background-color: #097B96">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start" style="background-color: #097B96">
        <div>
          <a class="navbar-brand brand-logo" href="">
            <img src="{{ asset('dashboard/template/images/MCTN.png') }}" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="">
            <img src="{{ asset('dashboard/template/images/MCTN.png') }}" alt="logo" />
          </a>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav  ms-auto">
          <li class="nav-item">
            <a style="font-size: 120%; color: white; opacity: 0.6;" class="fw-bold nav-link active" aria-current="page" href="/">HOME</a>
          </li>
          <li class="nav-item dropdown">
            <a style="font-size: 120%; color: white; opacity: 1;" class="fw-bold nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              BUKU TAMU
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/pengajuan-tamu/create">Pengajuan</a></li>
              <li><a class="dropdown-item" href="/status">Status</a></li>
              <li><a class="dropdown-item" href="">Feedback</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a style="font-size: 120%; color: white; opacity: 0.6;" class="fw-bold nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PENGUMUMAN
            </a>
            {{-- <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="">Pengajuan</a></li>
              <li><a class="dropdown-item" href="">Status</a></li>
              <li><a class="dropdown-item" href="">Feedback</a></li>
            </ul> --}}
          </li>
          <li class="nav-item">
            <a style="font-size: 120%; color: white; opacity: 0.6;" class="fw-bold nav-link" href="#">REGISTRASI</a>
          </li>
          <li class="nav-item">
            <a style="font-size: 120%; color: white; opacity: 0.6;" class="fw-bold nav-link" href="#">FAQ</a>
          </li>
          <li class="nav-item ps-4">
            <a class="btn btn-light fw-bold"href="/login">LOGIN</a>
          </li>
        </ul>

      </div>
    </div>
    </nav>

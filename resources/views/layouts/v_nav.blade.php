<div class="sticky-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
       @if (Auth::check())
       <li class="nav-item">
        <a class="nav-link" href="{{ url('logout') }}">log out</a>
      </li>  
       @else
       <li class="nav-item">
        <a class="nav-link" href="/admin">Login</a>
      </li>
       @endif
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Kategori
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          @foreach ($kategori as $kg)
          @php
          $hitung=DB::table('artikel')->where('id_kategori',$kg->id_kategori)->count();

          @endphp
          <li><a class="dropdown-item" href="#">{{ $kg->nama_kategori }} <b style="color: green">{{ $hitung }}</b></a></li>
          @endforeach
        </ul>
      </div>
        </ul>
      </div>
    </div>
  </nav>
</div>
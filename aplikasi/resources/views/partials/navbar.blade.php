<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
      <a class="navbar-brand text-light" href="/"><b>Export & Import Data KTP</b></a>
      <div style="float: right">
      <div class="collapse navbar-collapse" id="navbarScroll">
        @auth
            <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hello, </i> {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item {{ Request::is('profile') ? 'active' : '' }}" href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a class="dropdown-item {{ Request::is('setting') ? 'active' : '' }}" href="#"><i class="fa fa-gear"></i> Setting</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item" href="/logout"><i class="fa fa-right-from-bracket"></i> Logout</button>
                    </form>
                </li>
                </ul>
            </li>
            </ul>
            @else
            <form class="d-flex" action="/" >
                <input class="form-control me-2" type="text" placeholder="Masukkan kata" name="cari" value="{{ request('cari') }}">
                <button class="btn btn-outline-light" type="submit">Cari</button>
            </form>
            @endauth
        </div>
      </div>
    </div>
  </nav>
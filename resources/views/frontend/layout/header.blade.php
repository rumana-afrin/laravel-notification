<div class="container-fluid p-0 sticky_nav">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="height:100px;">
        <div class="container">
            <div class="navbar-brand">
                <img src="{{ asset('assets/PosrWage_logo.png') }}" alt="" width="90" height="50">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-top: 17px;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-5">
                    <li class="nav-item">
                        <a class="nav-link redlinem" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu drop-item">
                            <div class="d-flex">
                                <div class="left-drop-item">
                                    <li><a class="dropdown-item" href="#">Food</a></li>
                                    <li><a class="dropdown-item" href="#">Health</a></li>
                                    <li><a class="dropdown-item" href="#">Diet</a></li>
                                </div>
                                <div class="right-drop-item border-start">
                                    <li><a class="dropdown-item" href="#">Diseases</a></li>
                                    <li><a class="dropdown-item" href="#">Design</a></li>
                                    <li><a class="dropdown-item" href="#">Business</a></li>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link redlinem" aria-current="page" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex me-5" action="">
                    <input type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
                    <button class="search-box btn btn-outline-success my-2 my-sm-0" type="submit"><i
                            class="bi bi-search"></i></button>
                </form>

                @if (Route::has('login'))
                    <div class="right-side d-flex">
                        @auth
                            <a class="nav-link redlinem" href="{{ url('web/dashboard') }}"aria-disabled="true">Dashboard</a>
                        @else
                            <a class="nav-link redlinem" href="{{ route('login') }}" aria-disabled="true">Login</a>
                            @if (Route::has('register'))
                                <a class="nav-link redlinem" href="{{ route('register') }}"
                                    aria-disabled="true">Registration</a>
                            @endif
                        @endauth
                    </div>
                @endif


            </div>

        </div>

    </nav>
</div>
<br>
<br>
<br>
{{-- <a class="nav-link redlinem" href="{{ route('login') }}" aria-disabled="true">Login</a>

<a class="nav-link redlinem" href="{{ route('register') }}" aria-disabled="true">Registration</a> --}}

{{-- <a class="" href="{{route('logout')}}">
    
    <span>Sign Out</span>
  </a> --}}
{{-- end top menu bar --}}

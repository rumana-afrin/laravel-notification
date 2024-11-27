<div class="container-fluid p-0 sticky_nav">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="height:100px;">
        <div class="container">
            <div class="navbar-brand">
                <img src="{{asset('assets/Bdcalling Black logo.png')}}" alt="" width="90" height="30">
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
                    <li class="nav-item">
                        <a class="nav-link redlinem" href="#">All Post</a>
                    </li>
                </ul>

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

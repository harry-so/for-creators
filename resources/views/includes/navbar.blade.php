<nav class="navbar navbar-expand-lg navbar-white fixed-top" id="banner">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="{{ url('/') }}"><span><img src="{{asset('img/core-img/logo.png')}}" alt="logo" style="width:50px;height:50px;"></span> For Creators</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/discover') }}">Discover</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Discover</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/auctions') }}">Live Auctions</a>
                        <a class="dropdown-item" href="{{ url('/discover') }}">Discover</a>
                        <a class="dropdown-item" href="{{ url('/item-details') }}">Item Details</a>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('/activity') }}">Activity</a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/sell') }}">Create Item</a>
                </li>

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/wallet-connect') }}">Wallet Connect</a>
                        <a class="dropdown-item" href="{{ url('/create-item') }}">Create Item</a>
                        <a class="dropdown-item" href="{{ url('/authors') }}">Authors</a>
                        <a class="dropdown-item" href="{{ url('/profile') }}">Author Profile</a>
                        <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                        <a class="dropdown-item" href="{{ url('/signup') }}">Sign Up</a>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact-us') }}">Contact</a>
                </li> -->

                @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="nav-link">
                                Logout
                            </a></form>
                    </li>
                    <li class="lh-55px"><a href="{{ url('/user/'.Auth::id()) }}" class="btn login-btn ml-50">My Page</a></li>
                @else
                    <li class="lh-55px"><a href="{{ route('login') }}" class="btn login-btn ml-50">LogIn</a></li>
                        @if (Route::has('register'))
                        <li class="lh-55px"><a href="{{ route('register') }}" class="btn login-btn ml-50">SignUp</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

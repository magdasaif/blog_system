<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'BlogSystem') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">My Posts
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('posts.create')}}">Add Post</a></li>
                        <li><a class="dropdown-item" href="{{route('posts.index')}}">Posts</a></li>
                    </ul>
                </div>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                
            </ul>
        </div>
    </div>
    <!-- start search part  -->
    <form class="form-inline my-2 my-lg-0" method="get" action="{{route('home')}}">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" value="{{Request()->search}}" aria-label="Search">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>
    <!-- end search part  -->
</nav>
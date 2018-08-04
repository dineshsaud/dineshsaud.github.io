<nav class="navbar navbar-expand-md navbar-light bg-info"  id="navigation">
    <script type="text/javascript" src="{{asset('js/mixed.js')}}"></script>
    <div class="container">
        {{-- <img src="{{  asset('images/img_3.jpg') }}" style="height: 20px; width: 20px;padding-right: 5px;" alt="websitelogo">  --}}
        <a class="navbar-brand text-white font-italic" href="{{ url('/') }}" style=" font-size:25px">
           {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto" id="nav-links">
                <li><a class="nav-link" href="{{route('home')}}">Home</a></li>
                <li><a class="nav-link" href="{{route('aboutus')}}">About Us</a></li>
                <li><a class="nav-link" href="{{route('guide')}}">User-Guidelines</a></li>
                <li><a class="nav-link" href="{{route('v.forum')}}">Forum</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else

                <a href="{{route('u.profile',['id'=>Auth::user()->id])}}" class="mt-2">
                   <img src="{{ Auth::user()->image ? "/".Auth::user()->image : asset('images/unknown.png') }}" style="height: 30px; width: 30px;border-radius: 50px;" alt="{{Auth::user()->name}}"></a>
                <div class="text-capitalize">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu  text-left navbar-dropdown" aria-labelledby="navbarDropdown" id="navbar-dropdown">
                            <ul id="dropdown-items" class="px-0 w-100 my-0 h-50" >
                                <li class="nav-link px-0">
                                    <a class="dropdown-item" href="{{route('u.profile',['id'=>Auth::user()->id])}}">
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <li class="nav-link px-0">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </div>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>
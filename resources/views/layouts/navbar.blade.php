
<nav class="navbar navbar-expand-md navbar-light bg-info" style="margin-bottom: 0;">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto" id="nav-links">
                <li><a class="nav-link" href="#">about us</a></li>
                <li><a class="nav-link" href="#">contact us</a></li>
                <li><a class="nav-link" href="#">shipping methods</a></li>
                <li><a class="nav-link" href="#">Home</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
            @if(session('auth') == null)
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link pr-0" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                <li>{{session('auth')['name']}}</li>
             @else
                <li class="nav-item"><a href="#" class="nav-link">{{session('auth')?session('auth')->name:'expired'}}</a></li>
                <li class="nav-item"><a href="#" class="nav-link" onclick="$('#logout-form').submit()">Logout</a></li>
                <form action="/logout" class="d-none" id="logout-form" method="POST">
                    @csrf
                </form>
            @endif
            </ul>
        </div>
    </div>
</nav>
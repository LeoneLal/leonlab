<div class="header">
    <div class="top-left">
        <img class="logo" src="images/logo.png" alt="logo" />
    </div>

    <div class="top-center">
        @include('partials.search')
    </div>

    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Mon compte</a>
        @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif @endauth
    </div>
    @endif
</div>

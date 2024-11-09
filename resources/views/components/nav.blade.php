<header>
    <div class="logo">
        <a href="/"><img src="{{ asset('assets/images/logo.png') }}" width="55" alt="Homes.ug logo"></a>
    </div>
    <nav>
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('public') }}">Public</a></li>
        <li><a href="{{ route('note.index') }}">My Notes</a></li>
        <li><a href="{{ route('note.create') }}">New Note</a></li>
    </nav>
    @auth
        <div class="auth-buttons">
            <a href="{{ route('note.create') }}" class="login-button">Write Note</a>
            <form action="{{ route('session.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="signup-button">Log Out</button>
            </form>
        </div>
    @else
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="login-button">Login</a>
            <a href="{{ route('user.create') }}" class="signup-button">Sign Up</a>
        </div>
    @endauth

</header>

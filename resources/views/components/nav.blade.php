<header>
    <div class="logo">
        <a href="/"><img src="{{ asset('assets/images/logo.png') }}" width="45" alt="Homes.ug logo"></a>
    </div>
    <nav class="desk-nav">
        <li><a href="/" class="login-button text-sm">Home</a></li>
        <li><a href="{{ route('public') }}" class="login-button text-sm">Public</a></li>
        <li><a href="{{ route('note.index') }}" class="login-button text-sm">My Notes</a></li>
    </nav>
    <div x-data="{ open: false }" class="mobile-nav" x-animation>
        <button x-on:click="open=!open" x-show="open" x-animation>
            <i class="fa-solid fa-x text-xl"></i>
        </button>
        <button x-on:click="open=!open" x-show="!open" x-animation>
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
        <nav x-show="open" class="mobile-menu absolute w-full left-0 top-[4rem] pl-[1rem] py-4">
            <li><a href="/" class="login-button text-sm">Home</a></li>
            <li><a href="{{ route('public') }}" class="login-button text-sm">Public</a></li>
            <li><a href="{{ route('note.index') }}" class="login-button text-sm">My Notes</a></li>
        </nav>
    </div>
    @auth
        <div class="auth-buttons">
            <a href="{{ route('note.create') }}" class="login-button text-sm">Write Note</a>
            <form action="{{ route('session.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="signup-button text-sm sm:text-sm">Log Out</button>
            </form>
        </div>
    @else
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="login-button text-sm">Login</a>
            <a href="{{ route('user.create') }}" class="signup-button text-sm">Sign Up</a>
        </div>
    @endauth

</header>

<nav class="navbar navbar-expand-lg custom_nav-container ">
    <a class="navbar-brand" href="index.html">
        ChocoLux
    </a>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/about"> About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/chocolates">Chocolates</a>
            </li>
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a
                            href="{{ route("cart.index") }}"
                            class="nav-link"
                        >
                            {{Auth::user()->name}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log out
                        </a>

                        <!-- Форма, которая будет отправлять POST-запрос -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a
                            href="{{ route('login') }}"
                            class="nav-link"
                        >
                            Log in
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a
                                href="{{ route('register') }}"
                                class="nav-link"
                            >
                                Register
                            </a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>
    </div>
</nav>

<nav id="nav">
    <ul>
        <li><a class="icon solid fa-home" href="/"><span>Főoldal</span></a></li>
        <li><a class="icon solid fa-database" href="/db"><span>Adatbázis</span></a></li>
        <li>
            <a class="icon solid fa-envelope" ><span>Kapcsolat</span></a>
            <ul>
                <li><a href="#">Üzenet küldése</a></li>
                @auth
                    <li><a href="#">Üzenetek megtekintése</a></li>
                @endauth
            </ul>
        </li>
        <li><a class="icon solid fa-chart-bar" href="/dbdiagram"><span>Diagram</span></a></li>
        @if (Auth::check() && Auth::user()->role==1)
            <li><a class="icon solid fa-table" href="#"><span>CRUD</span></a></li>
        @endif
        <li>
            @if(Auth::user() !== null)
                <a class="icon fa-user solid-back">
                    <span>{{ Auth::user()->name }}</span>
                </a>
            @else
                <a class="icon fa-user">
                    <span>Fiók</span>
                </a>
            @endif
            <ul>
                @guest
                    <li><a href="/login">Bejelentkezés</a></li>
                    <li><a href="/register">Regisztráció</a></li>
                @endguest
                @auth
                    <li>
                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Kijelentkezés</a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </li>
    </ul>
</nav>
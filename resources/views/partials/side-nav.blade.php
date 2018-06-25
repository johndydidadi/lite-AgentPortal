<nav class="col-md-2 pt-5 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('get:dashboard:index')}}">
                    Dashboard
                </a>
                @if(Auth::user()->role=='Agent')
                    <a class="nav-link" href="{{ route('get:profile') }}">
                        Profile
                    </a>
                @endif
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Data Entry</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span class="fas fa-file-alt "></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                @if(Auth::user()->role == 'Admin')
                    <a class="nav-link" href="{{ route('users.index') }}">
                        Users
                    </a>
                    <a class="nav-link" href="{{ route('agents.index') }}">
                        Agents
                    </a>
                @endif
                <a class="nav-link" href="{{ route('clients.index') }}">
                    Clients
                </a>
            </li>
        </ul>
        @if(Auth::user()->role == 'Admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Maintain</span>
                <a class="d-flex align-items-center text-muted" href="#">
                    <span class="fas fa-cog"></span>
                </a>
            </h6>
            <ul class="nav flex-column mb-2">
                <a class="nav-link" href="{{ route('services.index') }}">
                    Services
                </a>
            </ul>
        @endif
    </div>
</nav>
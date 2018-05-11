<nav class="col-md-2 pt-5 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Payroll
                </a>
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
                <a class="nav-link" href="{{ route('departments.index') }}">
                <a class="nav-link" href="{{ route('departments.index')}}">
                    Departments
                </a>
                <a class="nav-link" href="{{ route('positions.index') }}">
                    Positions
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Maintain</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span class="fas fa-cog"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <a class="nav-link" href="{{ route('requirements.index') }}">
                Requirements
            </a>
            <a class="nav-link" href="">
                Pay Particulars
            </a>
            <a class="nav-link" href="">
                Users
            </a>
        </ul>
    </div>
</nav>
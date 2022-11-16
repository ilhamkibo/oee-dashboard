{{-- <nav class="navbar navbar-dark bg-dark navbar-expand">
    <div class="container-fluid">
        <ul class="nav navbar-nav ms-auto w-100 justify-content-start">
            <li class="nav-item">
                <a href="/dashboard?page=main-dashboard" class="nav-link me-auto">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="/dashboard?page=datalog" class="nav-link me-auto">Details Data</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fa-solid fa-maximize"></i>              
                </a>              
            </li>
            <li class="nav-item">
                <form action="/logout" method="post" class="action">
                    @csrf
                    <button type="submit" class="nav-link px-3 bg-dark border-0"><i class="fa-solid fa-power-off"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @yield('asta')
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">Dashboard OEE</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('datalog-*') ? 'active' : '' }}" id="myBtn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Details Data
                </a>
                <ul class="dropdown-menu">
                    <li>
                    <a class="dropdown-item" href="/datalog-performance"><i class="bi bi-layout-text-window-reverse"></i>Performance Data</a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="/datalog-quality"><i class="bi bi-layout-text-window-reverse"></i>Quality Data</a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="/datalog-availability"><i class="bi bi-layout-text-window-reverse"></i>Availability Data</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/admin*') ? 'active' : '' }}" href="/dashboard/admin">User Authorization</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fa-solid fa-maximize"></i>              
                </a>              
            </li>
            <li class="nav-item dropdown">
                <form action="/logout" method="post" class="action">
                    @csrf
                    <button type="submit" class="nav-link text-red bg-dark border-0"><i class="fa-solid fa-power-off"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

{{-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand me-0 px-3 fs-6" href="/dashboard">Dashboard OEE</a>
    <a class="navbar-brand me-0 px-3 fs-6" href="/dashboard/datalog">Details Data</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post" class="action">
                @csrf
                <button type="submit" class="nav-link px-3 bg-dark border-0">Logout <span data-feather="log-out"></span> </button>
            </form>
        </div>
    </div>
</header> --}}


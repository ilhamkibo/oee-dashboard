<div>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/datalog.css') }}">
    @endpush

    @section('asta')
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    @endsection
    
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky sidebar-sticky">
                <ul class="nav flex-column">
                    {{-- <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/datalog') ? 'active' : '' }}" aria-current="page" href="/dashboard/datalog">
                        <i class="fa-solid fa-table"></i>
                        OEE Data
                    </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('dashboard/datalog/performance') ? 'active' : '' }}" href="/dashboard/datalog/performance">
                            <i class="fa-solid fa-gauge"></i> Performance Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('dashboard/datalog/quality') ? 'active' : '' }}" href="/dashboard/datalog/quality">
                            <i class="fa-regular fa-circle-check"></i> Quality Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('dashboard/datalog/availability') ? 'active' : '' }}" href="/dashboard/datalog/availability">
                            <i class="fa-regular fa-clock"></i></i> Availability Data
                        </a>
                    </li>
                </ul>
            
                {{-- @can('admin') --}}
                {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>ADMINISTRATOR</span>
                </h6>
            
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                            <span data-feather="grid"></span>
                            User Authorization
                        </a>
                    </li>
                </ul> --}}
                {{-- @endcan --}}
                </div>                    
                
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
                        @if(Request::url()=='http://127.0.0.1:8000/dashboard/datalog/performance')
                            @include('livewire.datalog.performance-log')
                        @elseif (Request::url()=='http://127.0.0.1:8000/dashboard/datalog/quality')
                            @include('livewire.datalog.quality-log')
                        @elseif (Request::url()=='http://127.0.0.1:8000/dashboard/datalog/availability')
                            @include('livewire.datalog.availability-log')
                        @else 
                            @include('livewire.datalog.not_found')
                        @endif
            </main>
        </div>
    </div>
</div>

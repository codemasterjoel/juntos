<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="p-2">
            <img src="{{asset('assets/img/logo-ct.png')}}" class="my-4 w-95">
        </a>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="material-icons {{ in_array(request()->route()->getName(),['dashboard']) ? 'text-dark' : 'text-white' }}">dashboard</span>
                    </div>
                    <span class="nav-link-text ms-1"><b>INICIO</b></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'user-profile' ? 'active' : '' }}" href="{{ route('user-profile') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="material-icons {{ in_array(request()->route()->getName(),['user-profile']) ? 'text-dark' : 'text-white' }}">person</span>
                    </div>
                    <span class="nav-link-text ms-1"><b>PERFIL</b></span>
                </a>
            </li>
            @can('ver usuario')
                <li class="nav-item pb-2">
                    <a class="nav-link {{ Route::currentRouteName() == 'usuarios' ? 'active' : '' }}" href="{{ route('usuarios') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center {{ in_array(request()->route()->getName(),['user-management']) ? 'text-white' : 'text-dark' }}">manage_accounts</i> --}}
                            <span class="material-icons {{ in_array(request()->route()->getName(),['usuarios']) ? 'text-dark' : 'text-white' }}">manage_accounts</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>GESTIÓN DE USUARIOS</b></span>
                    </a>
                </li>
            @endcan
            @can('ver doctor')
                <li class="nav-item pb-2">
                    <a class="nav-link {{ Route::currentRouteName() == 'doctor' ? 'active' : '' }}" href="{{ route('doctor') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['doctor']) ? 'text-dark' : 'text-white' }}">psychology</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>ESPECIALISTAS</b></span>
                    </a>
                </li>
            @endcan
                <li class="nav-item pb-2">
                    <a class="nav-link {{ Route::currentRouteName() == 'paciente' ? 'active' : '' }}" href="{{ route('paciente') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['paciente']) ? 'text-dark' : 'text-white' }}">blind</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>PACIENTES</b></span>
                    </a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link {{ Route::currentRouteName() == 'citas' ? 'active' : '' }}" href="{{ route('citas') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['citas']) ? 'text-dark' : 'text-white' }}">calendar_month</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>CITAS</b></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class=" nav-link btn bg-gradient-danger active text-white" role="button" aria-pressed="true">Salir</a>
                </li>
        </ul>
    </div>
</aside>

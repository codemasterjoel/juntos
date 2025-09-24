<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
    <div class="container">
        <a class="navbar-brand d-flex flex-column font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ route('dashboard') }}">SIEMPRE JUNTOS</a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    {{-- <a class="nav-link text-white me-2" href="{{ auth()->user() ? route('sign-in') : route('login') }}"><i class="fas fa-key opacity-6  me-1"></i>INICIAR SESIÓN</a> --}}
                    <a href="{{ auth()->user() ? route('sign-in') : route('login') }}" class="text-info text-gradient font-weight-bold">INICIAR SESIÓN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

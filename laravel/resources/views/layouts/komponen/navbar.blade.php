{{-- navbar start --}}
<nav class="navbar navbar-expand-lg navbar-light py-3 px-3 text-light">
    <div class="container-fluid">
        <div class="me-auto d-inline-flex align-items-center">
            <i class="fas fa-solid fa-cube primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Entertech</h2>
        </div>
        @auth
        <div class="mx-2 d-flex align-items-center">
            <h6>
                Welcome back, {{ Auth::user()->muserName }}
            </h6>
        </div>
        @endauth
    </div>
</nav>
{{-- navbar end --}}

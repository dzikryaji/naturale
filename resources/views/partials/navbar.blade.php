<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5">
    <a href="index.html" class="navbar-brand d-flex d-lg-none">
        <h1 class="m-0 display-4 text-secondary"><span class="text-white">Natu</span>rale</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav py-0 me-auto">
            <a href="/" class="nav-item nav-link">Home</a>
        </div>
        @auth   
        <div class="navbar-nav py-0">
            <button class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
        </div>
        @else
        <div class="navbar-nav py-0">
            <a href="/login" class="nav-item nav-link">Login</a>
        </div>
        @endauth
    </div>
</nav>
<!-- Navbar End -->
<header id="header">
    <nav id="primary-header" class="navbar navbar-expand-lg py-4">
        <div class="container-fluid padding-side">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ Vite::asset('resources/images/main-logo.png') }}" class="logo img-fluid">
                </a>
                <button class="navbar-toggler border-0 d-flex d-lg-none order-3 p-2 shadow-none" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar"
                    aria-expanded="false">
                    <svg class="navbar-icon" width="60" height="60">
                        <use xlink:href="#navbar-icon"></use>
                    </svg>
                </button>
                <div class="header-bottom offcanvas offcanvas-end " id="bdNavbar"
                    aria-labelledby="bdNavbarOffcanvasLabel">
                    <div class="offcanvas-header px-4 pb-0">
                        <button type="button" class="btn-close btn-close-black mt-2" data-bs-dismiss="offcanvas"
                            aria-label="Close" data-bs-target="#bdNavbar"></button>
                    </div>
                    <div class="offcanvas-body align-items-center justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

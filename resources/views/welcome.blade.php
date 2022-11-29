<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>E-Library | Welcome</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('template/sneat/assets/img/favicon/lib.png') }}" />

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('template/sofland/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('template/sofland/css/style.css') }}" rel="stylesheet">
    </head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <img src="{{ asset('template/sneat/assets/img/favicon/lib.png') }}" alt="Logo" style="width: 30px; height: 30px;">
                <a href="/" class="navbar-brand p-0">
                    <h1 class="m-0">E-Library</h1>
                </a>
                <button class="navbar-toggler rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="{{ route('login') }}" class="nav-item nav-link" style="color: #5F61E6">Login</a>
                        <a href="{{ route('register') }}" class="nav-item nav-link" style="color: #5F61E6">Register</a>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-light rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Register</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Welcome To E-Library</h1>
                            <p class="text-white pb-3 animated slideInDown">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate eligendi vel est? Tempora ipsam tenetur saepe. Pariatur deleniti dignissimos quasi nobis libero? Officiis repellat.</p>
                            <div class="position-relative w-100 mt-3">
                                <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Find your book here" style="height: 58px;">
                                <button type="button" class="btn btn-primary rounded-pill py-2 px-3 shadow-none position-absolute top-0 end-0 m-2">Search Book</button>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="img-fluid rounded animated zoomIn" src="{{ asset('template/sofland/img/buku.png') }}" alt="library-pic1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/sofland/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/sofland/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/sofland/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/sofland/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template/sofland/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('template/sofland/js/main.js') }}"></script>
</body>

</html>

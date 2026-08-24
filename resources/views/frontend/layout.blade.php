<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paking Institute</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/color.css')}}">
    <link href="{{asset('frontend/css/nav.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/accordion.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/overlapping.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@400;600;700&display=swap"
        rel="stylesheet">
    <style>
        .accordion-card {
            flex: 1;
            cursor: pointer;
            transition: .5s;
        }

        .accordion-card.active {
            flex: 2.5;
        }

        .card-img-box {
            height: 520px;
            position: relative;
        }

        .card-img-box img {
            transition: .5s;
        }

        .accordion-card:hover img {
            transform: scale(1.05);
        }

        .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, .35), transparent);
        }

        .arrow-btn {
            opacity: 0;
            transition: .4s;
        }

        .accordion-card.active .arrow-btn {
            opacity: 1;
        }

        .arrow-btn:hover {
            background: #000;
            color: #fff;
        }

        .card-desc{
            max-height:0;
            opacity:0;
            transition:.4s;
        }

        .accordion-card.active .card-desc{
            max-height:80px;
            opacity:1;
        }

        @media(max-width:768px) {

            .accordion-wrapper {
                flex-direction: column;
                height: auto;
            }

            .card-img-box {
                height: 280px;
            }

            .card-title {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
@php
    $setting = \App\Models\Setting::first();

    $approach = \App\Models\Approach::first();
    $partnership = \App\Models\Partnership::first();
    $future = \App\Models\Future::first();

    $about = \App\Models\About::first();
    $leadership = \App\Models\Leadership::first();
    $career = \App\Models\Career::first();
@endphp
<!-- header 0 -->
<header>
    <nav class="navbar navbar-dark bg-[#363535] py-1">
        <div class="container d-flex justify-content-end align-items-center">

            <!-- Social Links & Newsletter in One Straight Line -->
            <ul class="navbar-nav flex-row align-items-center gap-3 mb-0">
                <li class="nav-item">
                    <a class="nav-link p-1 text-white d-flex align-items-center" href="{{$setting->twitter}}" target="_blank" aria-label="X (Twitter)">
                        <i class="bi bi-twitter-x" style="font-size: 1.1rem;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1 text-white d-flex align-items-center" href="{{$setting->linkedin}}" target="_blank" aria-label="LinkedIn">
                        <i class="bi bi-linkedin" style="font-size: 1.1rem;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1 text-white d-flex align-items-center" href="{{$setting->instagram}}" target="_blank" aria-label="Instagram">
                        <i class="bi bi-instagram" style="font-size: 1.1rem;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1 text-white d-flex align-items-center" href="{{$setting->facebook}}" target="_blank" aria-label="Facebook">
                        <i class="bi bi-facebook" style="font-size: 1.1rem;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1 text-white d-flex align-items-center" href="{{$setting->youtube}}" target="_blank" aria-label="YouTube">
                        <i class="bi bi-youtube" style="font-size: 1.1rem;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- Trigger Modal Button -->
                    <button type="button" class="btn text-light p-0 ms-2 border-0 shadow-none fw-normal" data-bs-toggle="modal"
                            data-bs-target="#newsletterModal">
                        NEWSLETTER
                    </button>
                </li>
            </ul>

        </div>
    </nav>
</header>


<!-- header 1 -->
<header id="stickyHeader" class="border-bottom position-relative transparent-header">
    <nav class="navbar navbar-expand-lg navbar-light py-3 position-static">
        <div class="container position-static">
                <!-- Brand Logo / Text -->
            <a class="navbar-brand me-auto d-flex align-items-center" href="{{ route('home') }}">

                @if($setting && !empty($setting->logo))

                    <img
                        src="{{ asset('images/setting/' . $setting->logo) }}"
                        alt="{{ $setting->name ?? 'Institute' }}"
                        class="me-2"
                        style="height: 40px;"
                    >
                @else

                    <small class="fw-bold tracking-tight text-uppercase d-none d-lg-inline">
                        {{ $setting->name ?? 'Peking Institute' }}
                    </small>

                @endif

            </a>


            <!-- Mobile Menu Toggle -->
            <!-- Search Icon Button (Mobile Only: Left of Menu Button) -->
            <button class="btn btn-link text-dark p-0 d-lg-none me-3" type="button" aria-label="Search" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-search"></i>
            </button>
            <button
                class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="text-uppercase">menu</span>

            </button>


            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="mainNavbar">

                <ul class="navbar-nav ms-auto gap-3 me-lg-4 align-items-lg-center py-3 py-lg-0">


                    <!-- =========================
                         WHAT WE DO
                    ========================== -->
                    <li class="nav-item dropdown position-static active">

                        <a
                            class="nav-link fw-bold text-uppercase small py-1 px-0 dropdown-toggle"
                            href="#"
                            id="whatWeDoMenuLink"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            WHAT WE DO

                        </a>


                        <div
                            class="dropdown-menu w-100 start-0 border-0 rounded-0 shadow-lg mt-4 py-5 bg-white"
                            aria-labelledby="whatWeDoMenuLink">

                            <div class="container-fluid px-lg-5">

                                <div class="row align-items-start">

                                    <!-- Left Title -->
                                    <div class="col-lg-3 mb-4 mb-lg-0">

                                        <h6 class="fw-bold text-uppercase small tracking-wider text-dark">
                                            WHAT WE DO
                                        </h6>

                                    </div>


                                    <!-- Cards -->
                                    <div class="col-lg-9">

                                        <div class="row g-4">


                                            <!-- APPROACH -->
                                            <div class="col-12 col-md-4">

                                                <a
                                                    href="{{ route('approach') }}"
                                                    class="text-decoration-none text-dark d-block mega-card">

                                                    <div class="ratio ratio-16x9 mb-3 d-none d-lg-block">

                                                        @if($approach && $approach->cover_image)

                                                            <img
                                                                src="{{ asset('images/approach/' . $approach->cover_image) }}"
                                                                class="img-fluid rounded-0 object-fit-cover"
                                                                alt="Approach">

                                                        @endif

                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between">

                                                        <span class="fw-bold small text-uppercase">
                                                            APPROACH
                                                        </span>

                                                        <box-icon
                                                            type="solid"
                                                            name="right-arrow-circle">
                                                        </box-icon>

                                                    </div>

                                                </a>

                                            </div>


                                            <!-- PARTNERSHIPS -->
                                            <div class="col-12 col-md-4">

                                                <a
                                                    href="{{ route('partnership') }}"
                                                    class="text-decoration-none text-dark d-block mega-card">

                                                    <div class="ratio ratio-16x9 mb-3 d-none d-lg-block">

                                                        @if($partnership && $partnership->cover_image)

                                                            <img
                                                                src="{{ asset('images/partnership/' . $partnership->cover_image) }}"
                                                                class="img-fluid rounded-0 object-fit-cover"
                                                                alt="Partnerships">

                                                        @endif

                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between">

                                                        <span class="fw-bold small text-uppercase">
                                                            PARTNERSHIPS
                                                        </span>

                                                        <box-icon
                                                            type="solid"
                                                            name="right-arrow-circle">
                                                        </box-icon>

                                                    </div>

                                                </a>

                                            </div>


                                            <!-- FUTURE OF BRITAIN -->
                                            <div class="col-12 col-md-4">

                                                <a
                                                    href="{{ route('future') }}"
                                                    class="text-decoration-none text-dark d-block mega-card">

                                                    <div class="ratio ratio-16x9 mb-3 d-none d-lg-block">

                                                        @if($future && $future->cover_image)

                                                            <img
                                                                src="{{ asset('images/future/' . $future->cover_image) }}"
                                                                class="img-fluid rounded-0 object-fit-cover"
                                                                alt="Future of Britain">

                                                        @endif

                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between">

                                                        <span class="fw-bold small text-uppercase">
                                                            FUTURE OF BRITAIN
                                                        </span>

                                                        <box-icon
                                                            type="solid"
                                                            name="right-arrow-circle">
                                                        </box-icon>

                                                    </div>

                                                </a>

                                            </div>


                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </li>


                    <!-- INSIGHTS -->
                    <li class="nav-item">

                        <a
                            class="nav-link fw-bold text-uppercase small py-1 px-0"
                            href="{{ route('insight') }}">

                            INSIGHTS

                        </a>

                    </li>


                    <!-- EXPERTS -->
                    <li class="nav-item">

                        <a
                            class="nav-link fw-bold text-uppercase small py-1 px-0"
                            href="{{ route('expert') }}">

                            EXPERTS

                        </a>

                    </li>


                    <!-- =========================
                         WHO WE ARE
                    ========================== -->
                    <li class="nav-item dropdown position-static">

                        <a
                            class="nav-link fw-bold text-uppercase small dropdown-toggle"
                            href="#"
                            id="whoWeAreMenuLink"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            WHO WE ARE

                        </a>


                        <div
                            class="dropdown-menu w-100 start-0 border-0 rounded-0 shadow-lg mt-4 py-5 bg-white"
                            aria-labelledby="whoWeAreMenuLink">

                            <div class="container-fluid px-lg-5">

                                <div class="row align-items-start">

                                    <!-- Left Title -->
                                    <div class="col-lg-3 mb-4 mb-lg-0">

                                        <h6 class="fw-bold text-uppercase small tracking-wider text-dark">
                                            WHO WE ARE
                                        </h6>

                                    </div>


                                    <!-- Cards -->
                                    <div class="col-lg-9">

                                        <div class="row g-4">


                                            <!-- ABOUT US -->
                                            <div class="col-12 col-md-4">

                                                <a
                                                    href="{{ route('aboutUs') }}"
                                                    class="text-decoration-none text-dark d-block mega-card">

                                                    <div class="ratio ratio-16x9 mb-3 d-none d-lg-block">

                                                        @if($about && $about->cover_image)

                                                            <img
                                                                src="{{ asset($about->cover_image) }}"
                                                                class="img-fluid rounded-0 object-fit-cover"
                                                                alt="About Us">

                                                        @endif

                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between">

                                                        <span class="fw-bold small text-uppercase">
                                                            ABOUT US
                                                        </span>

                                                        <box-icon
                                                            type="solid"
                                                            name="right-arrow-circle">
                                                        </box-icon>

                                                    </div>

                                                </a>

                                            </div>


                                            <!-- EXECUTIVE LEADERSHIP -->
                                            <div class="col-12 col-md-4">

                                                <a
                                                    href="{{ route('executiveLeadership') }}"
                                                    class="text-decoration-none text-dark d-block mega-card">

                                                    <div class="ratio ratio-16x9 mb-3 d-none d-lg-block">

                                                        @if($leadership && $leadership->cover_image)

                                                            <img
                                                                src="{{ asset($leadership->cover_image) }}"
                                                                class="img-fluid rounded-0 object-fit-cover"
                                                                alt="Executive Leadership">

                                                        @endif

                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between">

                                                        <span class="fw-bold small text-uppercase">
                                                            EXECUTIVE LEADERSHIP
                                                        </span>

                                                        <box-icon
                                                            type="solid"
                                                            name="right-arrow-circle">
                                                        </box-icon>

                                                    </div>

                                                </a>

                                            </div>


                                            <!-- CAREERS -->
                                            <div class="col-12 col-md-4">

                                                <a
                                                    href="{{ route('career') }}"
                                                    class="text-decoration-none text-dark d-block mega-card">

                                                    <div class="ratio ratio-16x9 mb-3 d-none d-lg-block">

                                                        @if($career && $career->cover_image)

                                                            <img
                                                                src="{{ asset($career->cover_image) }}"
                                                                class="img-fluid rounded-0 object-fit-cover"
                                                                alt="Careers">

                                                        @endif

                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between">

                                                        <span class="fw-bold small text-uppercase">
                                                            CAREERS
                                                        </span>

                                                        <box-icon
                                                            type="solid"
                                                            name="right-arrow-circle">
                                                        </box-icon>

                                                    </div>

                                                </a>

                                            </div>


                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </li>

                </ul>


                <!-- Search Icon Button (Desktop Only: Placed inside menu on right) -->
                <button class="btn btn-link text-dark p-0 ms-lg-3 d-none d-lg-block" type="button" aria-label="Search" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <box-icon name='search'></box-icon>
                </button>

            </div>

        </div>
    </nav>
</header>




@yield('content')

<footer class="text-white bg-black py-5">
    <div class="container-fluid px-md-5">
        <div class="row g-4 justify-content-between">

            <!-- Left Column: Newsletter Section -->
            <div class="col-lg-5 col-md-12 pe-lg-5">
                <h2 class="display-6 fw-bold mb-3" style="font-family: Georgia, serif;">Intelligence in your inbox.</h2>
                <p class="text-secondary small mb-4" style="max-width: 380px;">
                    Get the latest big ideas in strategy, policy and delivery in your inbox every month with our newsletter.
                </p>
                <div class="mb-5">
                    <button data-bs-toggle="modal"
                            data-bs-target="#newsletterModal" class="btn btn-outline-light rounded-pill px-4 py-2 text-uppercase fw-semibold btn-sm">
                        Sign Me Up <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </div>

                <!-- Social Media Icons -->
                <div class="d-flex gap-2">
                    <a href="{{$setting->twitter}}" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark fw-bold" style="width: 36px; height: 36px; font-size: 14px;"><i class="bi bi-twitter-x"></i></a>
                    <a href="{{$setting->instagram}}" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark" style="width: 36px; height: 36px;"><i class="bi bi-instagram"></i></a>
                    <a href="{{$setting->linkedin}}" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark" style="width: 36px; height: 36px;"><i class="bi bi-linkedin"></i></a>
                    <a href="{{$setting->youtube}}" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark" style="width: 36px; height: 36px;"><i class="bi bi-youtube"></i></a>
                    <a href="{{$setting->facebook}}" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark" style="width: 36px; height: 36px;"><i class="bi bi-facebook"></i></a>
                </div>
            </div>

            <!-- Right Side: Links Columns -->
            <div class="col-lg-6 col-md-12">
                <div class="row g-4">

                    <!-- Column 1: What we do -->
                    <div class="col-md-4 col-sm-6">
                        <h3 class="h4 mb-4" style="font-family: Georgia, serif;">What we do</h3>
                        <ul class="list-unstyled d-flex flex-column gap-3 small fw-bold">
                            <li><a href="{{ route('approach') }}" class="text-white text-decoration-none text-uppercase">Approach</a></li>
                            <li><a href="{{ route('partnership') }}" class="text-white text-decoration-none text-uppercase">Partnerships</a></li>
                            <li><a href="{{ route('future') }}" class="text-white text-decoration-none text-uppercase">Future of Britain</a></li>
                        </ul>
                    </div>

                    <!-- Column 2: Insights -->
                    <div class="col-md-4 col-sm-6">
                        <h3 class="h4 mb-4" style="font-family: Georgia, serif;">Insights</h3>
                        <ul class="list-unstyled d-flex flex-column gap-3 small fw-bold">
                            <li><a href="{{ route('insight') }}" class="text-white text-decoration-none text-uppercase">Insights</a></li>
                            <li><a href="{{ route('expert') }}" class="text-white text-decoration-none text-uppercase">Experts</a></li>
                            <li><a href="{{route('financialStatements')}}" class="text-white text-decoration-none text-uppercase">Financial Statements</a></li>
                            <li><a href="{{route('media')}}" class="text-white text-decoration-none text-uppercase">Media Centre</a></li>
                            <li><a href="{{route('contactus')}}" class="text-white text-decoration-none text-uppercase">Contact Us</a></li>

                        </ul>
                    </div>

                    <!-- Column 3: Who we are -->
                    <div class="col-md-4 col-sm-6">
                        <h3 class="h4 mb-4" style="font-family: Georgia, serif;">Who we are</h3>
                        <ul class="list-unstyled d-flex flex-column gap-3 small fw-bold">
                            <li><a href="{{ route('aboutUs') }}" class="text-white text-decoration-none text-uppercase">About Us</a></li>
                            <li><a href="{{ route('executiveLeadership') }}" class="text-white text-decoration-none text-uppercase">Leadership</a></li>
                            <li><a href="{{ route('career') }}" class="text-white text-decoration-none text-uppercase">Careers</a></li>


                        </ul>
                    </div>


                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Bottom Sub-Footer -->
<div class="bg-dark text-white py-4 border-top border-secondary border-opacity-25">
    <div class="container-fluid px-md-5">
        <div class="row g-4 align-items-start justify-content-between">

            <!-- Legal Text Left Column -->
            <div class="col-lg-5 col-md-12 text-secondary" style="font-size: 0.5rem; line-height: 1.4;">
                Tony Blair Institute, trading as Tony Blair Institute for Global Change, is a company limited by guarantee registered in England and Wales (registered company number: 10505963) whose registered office is One Bartholomew Close, London, EC1A 7BL.
            </div>

            <!-- Links Right Side -->
            <div class="col-lg-7 col-md-12">
                <div class="d-flex flex-wrap gap-x-4 gap-y-2 justify-content-lg-end text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                    <a href="{{route('cookies')}}" class="text-white text-decoration-none me-3 mb-2">Cookies</a>
                    <a href="{{route('terms')}}" class="text-white text-decoration-none me-3 mb-2">Terms of Use</a>
                    <a href="{{route('privacy')}}" class="text-white text-decoration-none me-3 mb-2">Privacy Policy</a>
                    <a href="{{route('accessibility')}}" class="text-white text-decoration-none me-3 mb-2">Accessibility</a>
                </div>
            </div>

        </div>
    </div>
</div>

<!--search Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-dark text-white border-0 rounded-0">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center p-4">
                <h6 class="text-uppercase fw-bold m-0 small text-white">
                    Tony Blair Institute for Global Change
                </h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Search Section -->
            <div class="flex-grow-1 d-flex align-items-center justify-content-center px-4 mb-4">
                <form class="w-100">
                    <div class="input-group">

                        <!-- Search Icon -->
                        <span class="input-group-text bg-transparent border-secondary border-end-0 rounded-start-pill text-white-50 ps-4">
                        <i class="bi bi-search fs-5"></i>
                    </span>

                        <!-- Search Input -->
                        <input type="search"
                               class="form-control bg-transparent text-white border-secondary border-start-0 border-end-0 py-3 shadow-none"
                               placeholder="SEARCH"
                               aria-label="Search"
                               autocomplete="off">

                        <!-- Arrow Button -->
                        <button type="submit" class="btn bg-transparent border-secondary border-start-0 rounded-end-pill text-white-50 pe-4">
                            <i class="bi bi-arrow-right fs-5"></i>
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Newsletter Modal -->
<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 p-4 p-md-5 rounded-0 position-relative">

            <!-- Close Button -->
            <button type="button" class="btn-close position-absolute top-0 end-0 m-4 shadow-none" data-bs-dismiss="modal"
                    aria-label="Close"></button>

            <div class="row">
                <div class="col-md-7 col-lg-6">
                    <h2 class="h3 fw-normal mb-4 fs-3" style="font-family: serif; color: #111;">
                        Be the first to know what we're doing – and how you can get more involved.
                    </h2>

                    <form>
                        <div class="mb-3">
                            <label for="firstName" class="form-label small mb-1"><span class="text-danger">*</span> First
                                Name</label>
                            <input type="text" class="form-control rounded-0 border-dark shadow-none" id="firstName" required>
                        </div>

                        <div class="mb-3">
                            <label for="lastName" class="form-label small mb-1"><span class="text-danger">*</span> Last Name</label>
                            <input type="text" class="form-control rounded-0 border-dark shadow-none" id="lastName" required>
                        </div>

                        <div class="mb-3">
                            <label for="emailInput" class="form-label small mb-1"><span class="text-danger">*</span> Email</label>
                            <input type="email" class="form-control rounded-0 border-dark shadow-none" id="emailInput" required>
                        </div>

                        <p class="text-muted extra-small mb-4" style="font-size: 0.75rem;">
                            By signing up, you agree to receive emails about our work. For full information on the use of your data
                            please see our <a href="#" class="text-dark">privacy policy</a>.
                        </p>

                        <button type="submit" class="btn btn-dark rounded-pill  px-4 py-2 text-uppercase  fw-bold"
                                style="font-size: 0.8rem;">
                            SIGN UP
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    const row1 = document.getElementById("row1Track");
    const row2 = document.getElementById("row2Track");

    let row1Offset = -500;
    let row2Offset = -300;

    let lastScroll = window.scrollY;

    function update(delta) {

        row1Offset += delta * 0.9;
        row2Offset -= delta * 0.9;

        const w1 = row1.scrollWidth / 2;
        const w2 = row2.scrollWidth / 2;

        if (row1Offset > 0) row1Offset -= w1;
        if (row1Offset < -w1) row1Offset += w1;

        if (row2Offset > 0) row2Offset -= w2;
        if (row2Offset < -w2) row2Offset += w2;

        row1.style.transform = `translateX(${row1Offset}px)`;
        row2.style.transform = `translateX(${row2Offset}px)`;

    }

    window.addEventListener("scroll", () => {

        const current = window.scrollY;
        update(current - lastScroll);
        lastScroll = current;

    });

    update(0);

</script>

<script>
    function activateCard(id) {

        document.querySelectorAll(".accordion-card").forEach(card => {
            card.classList.remove("active");
        });

        document.getElementById("card-" + id).classList.add("active");
    }

    activateCard(1);
</script>
<script src="{{asset('frontend/js/script.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/boxicons.js')}}"></script>
<script src="{{asset('frontend/js/video.js')}}"></script>

<script src="{{asset('frontend/js/topic-switcher.js')}}"></script>
<script src="{{asset('frontend/js/accordion.js')}}"></script>
<script src="{{asset('frontend/js/nav.js')}}"></script>
<script src="{{asset('frontend/js/video.js')}}"></script>
<script src="{{asset('frontend/js/utility-classes.js')}}"></script>

</body>

</html>

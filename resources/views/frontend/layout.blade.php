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

<!-- header 0 -->
<header>
    <nav class="navbar navbar-expand-lg navbar-black bg-dark py-1">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">My App</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><box-icon name='twitter' type='logo' color='white'
                                                               size='20px'></box-icon></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><box-icon name='linkedin' type='logo' color='white'
                                                               size='20px'></box-icon></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><box-icon name='instagram' type='logo' color='white'
                                                               size='20px'></box-icon></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><box-icon type='logo' name='facebook' color='white'
                                                               size='20px'></box-icon></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><box-icon name='youtube' type='logo' color='white'
                                                               size='20px'></box-icon></a>
                    </li>
                </ul>
                <button class="btn btn-dark" type="button">NEWSLETTER</button>
            </div>
        </div>
    </nav>
</header>

<!-- header 1 -->
<header class="bg-white border-bottom position-relative main-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 position-static">
        <div class="container  position-static">

            @php
                $setting = \App\Models\Setting::first();
            @endphp

            <!-- Brand Logo / Text -->
            <a class="navbar-brand me-auto d-flex align-items-center" href="{{route('home')}}">
                <span class="fw-bold tracking-tight text-uppercase small">
                      @if($setting && !empty($setting->logo))
                        <img src="{{ asset('images/setting/' . $setting->logo) }}"
                             alt="{{ $setting->name ?? 'Paking Institute' }}"
                             width="120">
                    @else
                        <span class="fw-bold fs-4 text-dark">
                            {{ $setting->name ?? 'Paking Institute' }}
                        </span>
                    @endif
                </span>
            </a>

            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-uppercase">menu</span>
            </button>

            <!-- Navigation Content -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto gap-3 me-lg-4 align-items-lg-center py-3 py-lg-0">

                    <!-- WHAT WE DO Mega Dropdown -->
                    <li class="nav-item dropdown position-static active">
                        <a class="nav-link fw-bold text-uppercase small text-dark py-1 px-0  dropdown-toggle" href="#"
                           id="whatWeDoMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            WHAT WE DO
                        </a>

                        <!-- Full-Width Mega Menu -->
                        <div class="dropdown-menu w-100 start-0 border-0 rounded-0 shadow-lg mt-0 py-5 bg-white"
                             aria-labelledby="whatWeDoMenuLink">

                            <div class="container-fluid px-lg-5">
                                <div class="row align-items-start">

                                    <!-- Left Sidebar Title -->
                                    <div class="col-lg-3 mb-4 mb-lg-0">
                                        <h6 class="fw-bold text-uppercase small tracking-wider">
                                            WHAT WE DO
                                        </h6>
                                    </div>

                                    <!-- Content Cards -->
                                    <div class="col-lg-9">
                                        <div class="row g-4">

                                            <!-- Card 1: Approach -->
                                            <div class="col-12 col-md-4">
                                                <a href="{{route('approach')}}" class="text-decoration-none text-dark d-block mega-card">

                                                    <div class="ratio ratio-16x9 mb-3 d-none d-lg-block">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=600&q=80"
                                                            class="img-fluid rounded-0 object-fit-cover" alt="Approach">
                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between">
                              <span class="fw-bold small text-uppercase">
                                APPROACH
                              </span>
                                                        <box-icon type='solid' name='right-arrow-circle'></box-icon>
                                                    </div>
                                                </a>
                                            </div>


                                            <!-- Card 2: Partnerships -->
                                            <div class="col-12 col-md-4">
                                                <a href="{{route('partnership')}}" class="text-decoration-none text-dark d-block mega-card">

                                                    <div class="ratio ratio-16x9 mb-3 d-none d-lg-block">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=600&q=80"
                                                            class="img-fluid rounded-0 object-fit-cover" alt="Partnerships">
                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between">
                              <span class="fw-bold small text-uppercase">
                                PARTNERSHIPS
                              </span>
                                                        <box-icon type='solid' name='right-arrow-circle'></box-icon>
                                                    </div>
                                                </a>
                                            </div>


                                            <!-- Card 3: Future of Britain -->
                                            <div class="col-12 col-md-4">
                                                <a href="{{route('future')}}" class="text-decoration-none text-dark d-block mega-card">

                                                    <div class="ratio ratio-16x9 mb-3 d-none d-lg-block">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?auto=format&fit=crop&w=600&q=80"
                                                            class="img-fluid rounded-0 object-fit-cover" alt="Future of Britain">
                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between">
                              <span class="fw-bold small text-uppercase">
                                FUTURE OF BRITAIN
                              </span>
                                                        <box-icon type='solid' name='right-arrow-circle'></box-icon>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-bold text-uppercase small text-dark py-1 px-0" href="{{route('insight')}}">INSIGHTS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-bold text-uppercase small text-dark py-1 px-0" href="{{route('expert')}}">EXPERTS</a>
                    </li>

                    <!-- Mega Dropdown Navigation Item -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link fw-bold text-uppercase small text-dark  dropdown-toggle" href="#" id="whoWeAreMenuLink"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            WHO WE ARE
                        </a>

                        <!-- Full-Width Mega Menu Container -->
                        <div class="dropdown-menu w-100 start-0 border-0 rounded-0 shadow-lg mt-0 py-5 bg-white"
                             aria-labelledby="whoWeAreMenuLink">
                            <div class="container-fluid px-lg-5">
                                <div class="row align-items-start">

                                    <!-- Left Sidebar Title -->
                                    <div class="col-lg-3 mb-4 mb-lg-0">
                                        <h6 class="fw-bold text-uppercase small tracking-wider">WHO WE ARE</h6>
                                    </div>

                                    <!-- 3 Content Cards Grid -->
                                    <div class="col-lg-9">
                                        <div class="row g-4">

                                            <!-- Card 1: About Us -->
                                            <div class="col-12 col-md-4">
                                                <a href="{{route('aboutUs')}}" class="text-decoration-none text-dark d-block mega-card">
                                                    <div class="ratio ratio-16x9 mb-3">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80"
                                                            class="img-fluid rounded-0 object-fit-cover" alt="About Us">
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="fw-bold small text-uppercase">ABOUT US</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                             class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>

                                            <!-- Card 2: Executive Leadership -->
                                            <div class="col-12 col-md-4">
                                                <a href="{{route('executiveLeadership')}}" class="text-decoration-none text-dark d-block mega-card">
                                                    <div class="ratio ratio-16x9 mb-3">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80"
                                                            class="img-fluid rounded-0 object-fit-cover" alt="Executive Leadership">
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="fw-bold small text-uppercase">EXECUTIVE LEADERSHIP</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                             class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>

                                            <!-- Card 3: Careers -->
                                            <div class="col-12 col-md-4">
                                                <a href="{{route('career')}}" class="text-decoration-none text-dark d-block mega-card">
                                                    <div class="ratio ratio-16x9 mb-3">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80"
                                                            class="img-fluid rounded-0 object-fit-cover" alt="Careers">
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="fw-bold small text-uppercase">CAREERS</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                             class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                                        </svg>
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

                <!-- Search Icon Button -->
                <button class="btn btn-link text-dark p-0 ms-lg-3" type="button" aria-label="Search">
                    <box-icon name='search'></box-icon>
                </button>
            </div>
        </div>
    </nav>
</header>



{{--<header class="bg-white border-bottom position-relative sticky-top">--}}
{{--    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 position-static">--}}
{{--        <div class="container  position-static">--}}
{{--            @php--}}
{{--                $setting = \App\Models\Setting::first();--}}
{{--            @endphp--}}

{{--            <!-- Brand Logo / Text -->--}}
{{--            <a class="navbar-brand me-auto d-flex align-items-center" href="{{route('home')}}">--}}
{{--                <span class="fw-bold tracking-tight text-uppercase small">--}}
{{--                      @if($setting && !empty($setting->logo))--}}
{{--                        <img src="{{ asset('images/setting/' . $setting->logo) }}"--}}
{{--                             alt="{{ $setting->name ?? 'Paking Institute' }}"--}}
{{--                             width="120">--}}
{{--                      @else--}}
{{--                        <span class="fw-bold fs-4 text-dark">--}}
{{--                            {{ $setting->name ?? 'Paking Institute' }}--}}
{{--                        </span>--}}
{{--                      @endif--}}
{{--                </span>--}}
{{--            </a>--}}

{{--            <!-- Mobile Menu Toggle Button -->--}}
{{--            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"--}}
{{--                    aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}

{{--            <!-- Navigation Content -->--}}
{{--            <div class="collapse navbar-collapse" id="mainNavbar">--}}
{{--                <ul class="navbar-nav ms-auto gap-lg-4 me-lg-4 align-items-lg-center py-3 py-lg-0">--}}

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link fw-bold text-uppercase small text-dark py-1 px-0" href="#">WHAT WE DO</a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link fw-bold text-uppercase small text-dark py-1 px-0" href="{{route('insight')}}">INSIGHTS</a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link fw-bold text-uppercase small text-dark py-1 px-0" href="{{route('expert')}}">EXPERTS</a>--}}
{{--                    </li>--}}

{{--                    <!-- Mega Dropdown Navigation Item -->--}}
{{--                    <li class="nav-item dropdown position-static">--}}
{{--                        <a class="nav-link fw-bold text-uppercase small text-dark  border-bottom border-2 border-dark dropdown-toggle"--}}
{{--                           href="#" id="whoWeAreMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            WHO WE ARE--}}
{{--                        </a>--}}

{{--                        <!-- Full-Width Mega Menu Container -->--}}
{{--                        <div class="dropdown-menu w-100 start-0 border-0 rounded-0 shadow-lg mt-0 py-5 bg-white"--}}
{{--                             aria-labelledby="whoWeAreMenuLink">--}}
{{--                            <div class="container-fluid px-lg-5">--}}
{{--                                <div class="row align-items-start">--}}

{{--                                    <!-- Left Sidebar Title -->--}}
{{--                                    <div class="col-lg-3 mb-4 mb-lg-0">--}}
{{--                                        <h6 class="fw-bold text-uppercase small tracking-wider">WHO WE ARE</h6>--}}
{{--                                    </div>--}}

{{--                                    <!-- 3 Content Cards Grid -->--}}
{{--                                    <div class="col-lg-9">--}}
{{--                                        <div class="row g-4">--}}

{{--                                            <!-- Card 1: About Us -->--}}
{{--                                            <div class="col-12 col-md-4">--}}
{{--                                                <a href="{{route('aboutUs')}}" class="text-decoration-none text-dark d-block mega-card">--}}
{{--                                                    <div class="ratio ratio-16x9 mb-3">--}}
{{--                                                        <img--}}
{{--                                                            src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80"--}}
{{--                                                            class="img-fluid rounded-0 object-fit-cover" alt="About Us">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                        <span class="fw-bold small text-uppercase">ABOUT US</span>--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"--}}
{{--                                                             class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">--}}
{{--                                                            <path--}}
{{--                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}

{{--                                            <!-- Card 2: Executive Leadership -->--}}
{{--                                            <div class="col-12 col-md-4">--}}
{{--                                                <a href="{{route('executiveLeadership')}}" class="text-decoration-none text-dark d-block mega-card">--}}
{{--                                                    <div class="ratio ratio-16x9 mb-3">--}}
{{--                                                        <img--}}
{{--                                                            src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80"--}}
{{--                                                            class="img-fluid rounded-0 object-fit-cover" alt="Executive Leadership">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                        <span class="fw-bold small text-uppercase">EXECUTIVE LEADERSHIP</span>--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"--}}
{{--                                                             class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">--}}
{{--                                                            <path--}}
{{--                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}

{{--                                            <!-- Card 3: Careers -->--}}
{{--                                            <div class="col-12 col-md-4">--}}
{{--                                                <a href="{{route('career')}}" class="text-decoration-none text-dark d-block mega-card">--}}
{{--                                                    <div class="ratio ratio-16x9 mb-3">--}}
{{--                                                        <img--}}
{{--                                                            src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80"--}}
{{--                                                            class="img-fluid rounded-0 object-fit-cover" alt="Careers">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                        <span class="fw-bold small text-uppercase">CAREERS</span>--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"--}}
{{--                                                             class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">--}}
{{--                                                            <path--}}
{{--                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                </ul>--}}

{{--                <!-- Search Icon Button -->--}}
{{--                <button class="btn btn-link text-dark p-0 ms-lg-3" type="button" aria-label="Search">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search"--}}
{{--                         viewBox="0 0 16 16">--}}
{{--                        <path--}}
{{--                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />--}}
{{--                    </svg>--}}
{{--                </button>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</header>--}}

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
                    <a href="#" class="btn btn-outline-light rounded-pill px-4 py-2 text-uppercase fw-semibold btn-sm">
                        Sign Me Up <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>

                <!-- Social Media Icons -->
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark fw-bold" style="width: 36px; height: 36px; font-size: 14px;">X</a>
                    <a href="#" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark" style="width: 36px; height: 36px;"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark" style="width: 36px; height: 36px;"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark" style="width: 36px; height: 36px;"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center text-dark" style="width: 36px; height: 36px;"><i class="bi bi-facebook"></i></a>
                </div>
            </div>

            <!-- Right Side: Links Columns -->
            <div class="col-lg-6 col-md-12">
                <div class="row g-4">

                    <!-- Column 1: What we do -->
                    <div class="col-md-4 col-sm-6">
                        <h3 class="h4 mb-4" style="font-family: Georgia, serif;">What we do</h3>
                        <ul class="list-unstyled d-flex flex-column gap-3 small fw-bold">
                            <li><a href="#" class="text-white text-decoration-none text-uppercase">Approach</a></li>
                            <li><a href="#" class="text-white text-decoration-none text-uppercase">Partnerships</a></li>
                            <li><a href="#" class="text-white text-decoration-none text-uppercase">Future of Britain</a></li>
                        </ul>
                    </div>

                    <!-- Column 2: Insights -->
                    <div class="col-md-4 col-sm-6">
                        <h3 class="h4 mb-4" style="font-family: Georgia, serif;">Insights</h3>
                        <ul class="list-unstyled d-flex flex-column gap-3 small fw-bold">
                            <li><a href="#" class="text-white text-decoration-none text-uppercase">Insights</a></li>
                            <li><a href="#" class="text-white text-decoration-none text-uppercase">Experts</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Who we are -->
                    <div class="col-md-4 col-sm-6">
                        <h3 class="h4 mb-4" style="font-family: Georgia, serif;">Who we are</h3>
                        <ul class="list-unstyled d-flex flex-column gap-3 small fw-bold">
                            <li><a href="#" class="text-white text-decoration-none text-uppercase">About Us</a></li>
                            <li><a href="#" class="text-white text-decoration-none text-uppercase">Leadership</a></li>
                            <li><a href="#" class="text-white text-decoration-none text-uppercase">Careers</a></li>
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
            <div class="col-lg-5 col-md-12 text-secondary" style="font-size: 0.75rem; line-height: 1.4;">
                Tony Blair Institute, trading as Tony Blair Institute for Global Change, is a company limited by guarantee registered in England and Wales (registered company number: 10505963) whose registered office is One Bartholomew Close, London, EC1A 7BL.
            </div>

            <!-- Links Right Side -->
            <div class="col-lg-7 col-md-12">
                <div class="d-flex flex-wrap gap-x-4 gap-y-2 justify-content-lg-end text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                    <a href="#" class="text-white text-decoration-none me-3 mb-2">Cookies</a>
                    <a href="#" class="text-white text-decoration-none me-3 mb-2">Terms of Use</a>
                    <a href="#" class="text-white text-decoration-none me-3 mb-2">Privacy Policy</a>
                    <a href="#" class="text-white text-decoration-none me-3 mb-2">Accessibility</a>
                    <a href="#" class="text-white text-decoration-none me-3 mb-2">Financial Statements</a>
                    <a href="#" class="text-white text-decoration-none mb-3 mb-2">Media Centre</a>
                    <div class="w-100"></div> <!-- Line break for second row of links -->
                    <a href="#" class="text-white text-decoration-none">Contact Us</a>
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

<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/boxicons.js')}}"></script>
<script src="{{asset('frontend/js/video.js')}}"></script>

<script src="{{asset('frontend/js/topic-switcher.js')}}"></script>
<script src="{{asset('frontend/js/accordion.js')}}"></script>
</body>

</html>

@extends('frontend.layout')
@section('content')

<!-- hero section muted-->
<section class="hero-section">
    <div class="card border-0  overflow-hidden position-relative vh-100">
        <video autoplay muted loop playsinline class="w-100 h-100 position-absolute top-0 start-0"
               style="object-fit: cover;">
            <source src="{{ asset('videos/slider/'.$slider->videos) }}" type="video/mp4">
        </video>

        <!-- Added 'text-white' to ensure full visibility -->
        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center text-white">
            <h5 class="card-title">WELCOME TO TBI</h5>
            <h1 class="card-text display-1 mb-2 fw-bold" style="max-width: 60rem;">
                {{$slider->title}}
            </h1>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row  g-5">

            <!-- Left Column -->
            <div class="col-md-5">
                <h6 class="text-uppercase text-dark fw-semibold">How We Work</h6>
            </div>

            <!-- Right Column -->
            <div class="col-md-7 ">
                <h1 class="fw-bold mb-5">
                    Here to turn bold ideas into reality
                </h1>

                <p class="fs-5 mb-0">
                    We help governments and leaders get things done. We do it by
                    advising on strategy, policy and delivery, unlocking the power
                    of technology across all three. As a not-for-profit, we can
                    work in the most challenging contexts and on the most
                    transformative projects because our focus is on leaders rather
                    than profits. And as a non-partisan organisation, we can bring
                    the best of our expertise to leaders who want to translate
                    their ambition into meaningful action for their people.
                </p>
            </div>

        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <div class="accordion-wrapper d-flex gap-4" style="height:520px;">
            <!-- Card 1 -->
            <div class="accordion-card active" id="card-1" onclick="activateCard(1)" onmouseenter="activateCard(1)">

                <div class="card-img-box  overflow-hidden rounded-4">

                    <img class="w-100 h-100 object-fit-cover"  src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1200&q=80"
                         alt="Insights">

                    <div class="card-overlay"></div>

                    <button class="position-absolute top-0 end-0 mt-3 me-3 btn btn-light rounded-circle d-flex align-items-center justify-content-center border-0 fs-4 arrow-btn"
                            style="width:48px; height:48px;">
                        →
                    </button>

                </div>

                <div class="pt-3">
                    <h2 class="font-serif display-6 mb-2">Insights</h2>
                    <p class="card-desc text-secondary overflow-hidden mb-0">
                        Discover the latest thinking from our experts.
                    </p>
                </div>

            </div>

            <!-- Card 2 -->
            <div class="accordion-card" id="card-2" onclick="activateCard(2)" onmouseenter="activateCard(2)">

                <div class="card-img-box overflow-hidden rounded-4">

                    <img class="w-100 h-100 object-fit-cover" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=1200&q=80"
                         alt="Partnerships">

                    <div class="card-overlay"></div>

                    <button
                        class="position-absolute top-0 end-0 mt-3 me-3
           btn btn-light rounded-circle
           d-flex align-items-center justify-content-center
           border-0 fs-4 arrow-btn"
                        style="width:48px; height:48px;">
                        →
                    </button>

                </div>

                <div class="pt-3">

                    <h2 class="font-serif display-6 mb-2">
                        Partnerships
                    </h2>

                    <p class="card-desc">
                        Join us to deliver meaningful change together.
                    </p>

                </div>

            </div>

            <!-- Card 3 -->
            <div class="accordion-card" id="card-3" onclick="activateCard(3)" onmouseenter="activateCard(3)">

                <div class="card-img-box overflow-hidden rounded-4">

                    <img class="w-100 h-100 object-fit-cover" src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1200&q=80"
                         alt="Approach">

                    <div class="card-overlay"></div>

                    <button
                        class="position-absolute top-0 end-0 mt-3 me-3
           btn btn-light rounded-circle
           d-flex align-items-center justify-content-center
           border-0 fs-4 arrow-btn"
                        style="width:48px; height:48px;">
                        →
                    </button>

                </div>

                <div class="pt-3">

                    <h2 class="font-serif display-6 mb-2">
                        Approach
                    </h2>

                    <p class="card-desc">
                        Learn about our unique methodology and values.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<div class="container">
    <div class="card text-white mt-5 overflow-hidden border-0 rounded-0 position-relative">
        <!-- Background Image -->
        <img src="{{ asset('images/insight/'.$latestInsight->cover_image) }}" class="card-img rounded-0" alt="Background Image"
             style="object-fit: cover; min-height: 550px;">

        <!-- Dark Overlay Gradient -->
        <div class="card-img-overlay d-flex flex-column justify-content-end p-4 p-md-5 bg-dark bg-opacity-50"
             style="background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.4) 60%, rgba(0,0,0,0.2) 100%);">



            <!-- Main Content Container -->
            <div class="col-12 col-lg-8 ps-md-3">
                <!-- Category Tag -->
                <small class="text-uppercase fw-semibold tracking-wider text-white-50 d-block mb-2"
                       style="letter-spacing: 1.5px; font-size: 0.75rem;">
                    {{ $latestInsight->type->type ?? 'N/A' }}
                </small>

                <!-- Headline -->
                <h1 class="display-4 fw-normal text-white mb-4"
                    style="font-family: 'Times New Roman', Georgia, serif; line-height: 1.15;">
                    {{ $latestInsight->title }}
                </h1>

                <!-- Date -->
                <p class="small text-uppercase text-white-50 fw-semibold mb-2"
                   style="letter-spacing: 1px; font-size: 0.75rem;">
                    {{ $latestInsight->date ? \Carbon\Carbon::parse($latestInsight->date)->format('d M Y') : 'N/A' }}
                </p>

                <!-- Subtitle / Essay snippet -->
                <p class="card-text text-white-50 small mb-0" style="font-size: 0.85rem;">
                    Governments must confidently embrace AI to drive innovation and accelerate economic growth – but they also
                    need to get the public on side.
                </p>
            </div>

        </div>
    </div>
</div>

<section class="py-5">
    <div class="container">

        <div class="card text-bg-white border-0">
            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center py-5">

                <h6 class="text-uppercase mt-5 mb-5">
                    About Us
                </h6>

                <h1 class="display-1 fw-bold animate__animated animate__flash animate__slower animate__infinite">
                    We are
                    policy experts.
                </h1>

                <a href="#" class="btn btn-light rounded-pill px-4">
                    Learn More
                </a>

            </div>
        </div>
</section>

<div id="heroSlider" class="carousel slide carousel-fade" data-bs-ride="false">

    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="4"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="5"></button>
    </div>


    <div class="carousel-inner container">

        <!-- Slide 1 -->
        <div class="carousel-item active position-relative">
            <img src="img/Climater_optimized.webp" class="d-block w-100 object-fit-cover" style="height:600px;" alt="">

            <div class="position-absolute top-0 start-0 w-100 h-100  bg-opacity-10"></div>

            <div
                class="carousel-caption top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                <p class="text-uppercase text-white-50 mb-2">Explore</p>
                <h1 class="display-1 fw-bold text-white">Climate & Energy</h1>
                <button class="btn btn-light mt-3 text-uppercase rounded-pill">See theme</button>
            </div>
        </div>


        <!-- Slide 2 -->
        <div class="carousel-item position-relative">
            <img src="img/" class="d-block w-100 object-fit-cover" style="height:600px;" alt="">

            <div class="position-absolute top-0 start-0 w-100 h-100  bg-opacity-10"></div>

            <div
                class="carousel-caption top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                <p class="text-uppercase text-white-50 mb-2">Explore</p>
                <h1 class="display-1 fw-bold text-white">Economic Prosperity</h1>
                <button class="btn btn-light mt-3 text-uppercase rounded-pill">See theme</button>
            </div>
        </div>


        <!-- Slide 3 -->
        <div class="carousel-item position-relative">
            <img src="img/GeopoliticsSecurity_optimized.webp" class="d-block w-100 object-fit-cover" style="height:600px;"
                 alt="">

            <div class="position-absolute top-0 start-0 w-100 h-100  bg-opacity-10"></div>

            <div
                class="carousel-caption top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                <p class="text-uppercase text-white-50 mb-2">Explore</p>
                <h1 class="display-1 fw-bold text-white">Geopolitics & Security</h1>
                <button class="btn btn-light mt-3 text-uppercase rounded-pill">See theme</button>
            </div>
        </div>


        <!-- Slide 4 -->
        <div class="carousel-item position-relative">
            <img src="img/PoliticsGovernance_optimized.webp" class="d-block w-100 object-fit-cover" style="height:600px;"
                 alt="">

            <div class="position-absolute top-0 start-0 w-100 h-100  bg-opacity-10"></div>

            <div
                class="carousel-caption top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                <p class="text-uppercase text-white-50 mb-2">Explore</p>
                <h1 class="display-1 fw-bold text-white">Politics & Governance</h1>
                <button class="btn btn-light mt-3 text-uppercase rounded-pill">See theme</button>
            </div>
        </div>


        <!-- Slide 5 -->
        <div class="carousel-item position-relative">
            <img src="img/Homepage_PublicServices_optimized.webp" class="d-block w-100 object-fit-cover"
                 style="height:600px;" alt="">

            <div class="position-absolute top-0 start-0 w-100 h-100 bg-opacity-10"></div>

            <div
                class="carousel-caption top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                <p class="text-uppercase text-white-50 mb-2">Explore</p>
                <h1 class="display-1 fw-bold text-white">Public Service</h1>
                <button class="btn btn-light mt-3 text-uppercase rounded-pill">See theme</button>
            </div>
        </div>


        <!-- Slide 6 -->
        <div class="carousel-item position-relative">
            <img src="img/Homepage_TechDigitalisation__1__optimized.webp" class="d-block w-100 object-fit-cover"
                 style="height:600px;" alt="">

            <div class="position-absolute top-0 start-0 w-100 h-100  bg-opacity-10"></div>

            <div
                class="carousel-caption top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center">
                <p class="text-uppercase text-white-50 mb-2">Explore</p>
                <h1 class="display-1 fw-bold text-white">Tech & Digitalisation</h1>
                <button class="btn btn-light mt-3 text-uppercase rounded-pill">See theme</button>
            </div>
        </div>

    </div>


    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>

<div class="container py-lg-5">
    <div class="row align-items-center justify-content-center g-4 g-lg-5">

        <div class="col-12 col-md-6 col-lg-5">
            <div class="w-100">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=800&auto=format&fit=crop"
                     alt="Woman holding microphone at conference" class="img-fluid w-100 object-fit-cover" />
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-5 ps-lg-5">
            <!-- Heading -->
            <h1 class="display-6 mb-4 text-dark fw-normal"
                style="font-family: 'Playfair Display', Georgia, serif; font-size: 2.25rem; line-height: 1.2;">
                TBI at UK Party Conferences 2025
            </h1>

            <!-- Tagline / Subtitle -->
            <p class="fw-bold text-dark fs-6 mb-3">
                It's time to build a new political coalition for transformation.
            </p>

            <!-- Description Paragraph -->
            <p class="text-dark opacity-75 fs-6 mb-4 fw-normal" style="line-height: 1.6;">
                We're advancing a bold agenda, built on innovation and powered by disruptive politics, that can transform how
                government delivers.
            </p>

            <!-- Call to Action Button -->
            <a href="#"
               class="btn btn-dark rounded-pill px-4 py-2 text-white d-inline-flex align-items-center gap-2 text-decoration-none shadow-sm"
               style="font-size: 0.8rem; font-weight: 700; letter-spacing: 0.8px;">
                <span class="text-uppercase">LEARN MORE</span>
                <i class="bi bi-arrow-right fs-6"></i>
            </a>
        </div>

    </div>
</div>

<section class=" py-5 overflow-hidden position-relative bg-light">

    <!-- Heading -->
    <div class="container text-center mt-5 pt-4 mb-5">
      <span class="text-uppercase fw-semibold text-secondary" style="font-size:.75rem;letter-spacing:3px;">
        NEWSLETTER
      </span>
    </div>

    <!-- Row 1 -->
    <div class="ticker-wrapper mb-4">
        <div class="ticker-track gap-4" id="row1Track">

            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=300&auto=format&fit=crop"
                 class="ticker-img">

            <span class="ticker-text">Practical Solutions</span>

            <img src="https://images.unsplash.com/photo-1518837695005-2083093ee35b?q=80&w=300&auto=format&fit=crop"
                 class="ticker-img">

            <span class="ticker-text">Radical Ideas</span>

            <!-- Duplicate -->
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=300&auto=format&fit=crop"
                 class="ticker-img">

            <span class="ticker-text">Practical Solutions</span>

            <img src="https://images.unsplash.com/photo-1518837695005-2083093ee35b?q=80&w=300&auto=format&fit=crop"
                 class="ticker-img">

            <span class="ticker-text">Radical Ideas</span>

        </div>
    </div>

    <!-- Row 2 -->
    <div class="ticker-wrapper mb-5">
        <div class="ticker-track gap-4" id="row2Track">

            @foreach($newsLetters as $newsLetter)
            <span class="ticker-text">Radical Ideas</span>

            <img src="{{ asset('images/news-letter/'.$newsLetter->image) }}"
                 class="ticker-img">
            @endforeach
            <span class="ticker-text"> {{ $newsLetter->title }}</span>

        </div>
    </div>

    <!-- Button -->
    <div class="container text-center">

        <a href="#" class="btn border-0 bg-transparent text-dark fw-semibold d-inline-flex align-items-center gap-2">

        <span style="letter-spacing:2px;font-size:.8rem;">
          SIGN UP
        </span>

            <span class="bg-dark text-white rounded-circle d-flex justify-content-center align-items-center"
                  style="width:28px;height:28px;">

          <i class="bi bi-arrow-right"></i>

        </span>

        </a>

    </div>

</section>
@endsection

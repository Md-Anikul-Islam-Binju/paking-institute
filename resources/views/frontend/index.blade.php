@extends('frontend.layout')
@section('content')

<!-- hero section muted-->
<section class="hero-section">
    <div class="overflow-hidden position-relative vh-100">
        <video id="heroVideo" autoplay muted loop playsinline class="w-100 h-100 position-absolute top-0 start-0"
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

        <!-- Play/Pause Controls at Bottom End -->
        <div class="position-absolute bottom-0 end-0 p-4">
            <button id="videoToggleBtn"
                    class="btn btn-outline-light rounded-circle p-3 d-flex align-items-center justify-content-center"
                    style="width: 50px; height: 50px; backdrop-filter: blur(5px); background: rgba(0,0,0,0.3);"
                    aria-label="Toggle Video Playback">
                <box-icon id="videoIcon" name='pause' color='white' size='24px'></box-icon>
            </button>
        </div>
    </div>
</section>

@if($howWork)
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
                    {{$howWork->how_we_work_title}}
                </h1>

                <p class="fs-5 mb-0">
                    {{$howWork->how_we_work_details}}
                </p>
            </div>

        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <div class="accordion-wrapper d-flex gap-2" style="height:520px;">
            <!-- Card 1 -->
          <a href="{{route('insight')}}" >
              <div class="accordion-card active" id="card-1" onclick="activateCard(1)" onmouseenter="activateCard(1)">

                  <div class="card-img-box  overflow-hidden rounded-4">

                      <img class="w-100 h-100 object-fit-cover"  src="{{ asset(
                                                        'images/how-work-menu/' .
                                                        $howWork->insight_logo
                                                    ) }}"
                           alt="Insights">

                      <div class="card-overlay"></div>

                      <a href="{{route('insight')}}" class="position-absolute top-0 end-0 mt-3 me-3 btn btn-light rounded-circle d-flex align-items-center justify-content-center border-0 fs-4 arrow-btn"
                         style="width:48px; height:48px;">
                          →
                      </a>

                  </div>

                  <div class="pt-3">
                      <h2 class="font-serif display-6 mb-2">Insights</h2>
                      <p class="card-desc text-secondary overflow-hidden mb-0">
                          {{ $howWork->insight_title}}
                      </p>
                  </div>

              </div>

          </a>
            <!-- Card 2 -->
            <a  href="{{route('partnership')}}">
                <div class="accordion-card" id="card-2" onclick="activateCard(2)" onmouseenter="activateCard(2)">

                    <div class="card-img-box overflow-hidden rounded-4">

                        <img class="w-100 h-100 object-fit-cover" src="{{ asset(
                                                        'images/how-work-menu/' .
                                                        $howWork->partnership_logo
                                                    ) }}"
                             alt="Partnerships">

                        <div class="card-overlay"></div>

                        <a  href="{{route('partnership')}}"
                            class="position-absolute top-0 end-0 mt-3 me-3
           btn btn-light rounded-circle
           d-flex align-items-center justify-content-center
           border-0 fs-4 arrow-btn"
                            style="width:48px; height:48px;">
                            →
                        </a>

                    </div>

                    <div class="pt-3">

                        <h2 class="font-serif display-6 mb-2">
                            Partnerships
                        </h2>

                        <p class="card-desc">
                            {{ $howWork->partnership_title}}
                        </p>

                    </div>

                </div>

            </a>
            <!-- Card 3 -->
         <a href="{{route('approach')}}">
             <div class="accordion-card" id="card-3" onclick="activateCard(3)" onmouseenter="activateCard(3)">

                 <div class="card-img-box overflow-hidden rounded-4">

                     <img class="w-100 h-100 object-fit-cover" src="{{ asset(
                                                        'images/how-work-menu/' .
                                                        $howWork->approach_logo
                                                    ) }}"
                          alt="Approach">

                     <div class="card-overlay"></div>

                     <a  href="{{route('approach')}}"
                         class="position-absolute top-0 end-0 mt-3 me-3
           btn btn-light rounded-circle
           d-flex align-items-center justify-content-center
           border-0 fs-4 arrow-btn"
                         style="width:48px; height:48px;">
                         →
                     </a>

                 </div>

                 <div class="pt-3">

                     <h2 class="font-serif display-6 mb-2">
                         Approach
                     </h2>

                     <p class="card-desc">
                         {{ $howWork->approach_title}}
                     </p>

                 </div>

             </div>
         </a>

        </div>

    </div>

</section>
@endif

<div class="container">
    <div class="mt-5">
        <p class="text-uppercase">Featured</p>
    </div>
    <div  class="card text-white mt-3 overflow-hidden border-0 rounded-0 position-relative">
        <a href="{{route('insight.details',$latestInsight->slug)}}">
            <!-- Background Image -->
            <img src="{{ asset('images/insight/'.$latestInsight->cover_image) }}" class="card-img rounded-0" alt="Background Image"
                 style="object-fit: cover; min-height: 550px;">

            <!-- Dark Overlay Gradient -->
            <div class="card-img-overlay overlay d-flex flex-column justify-content-end p-4 p-md-5">

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
        </a>

    </div>
</div>

<section class="py-5">
    <div class="container">

        <div class="card text-bg-white border-0">
            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center py-5">

                <h6 class="text-uppercase mt-5 mb-5">
                    About Us
                </h6>

                <h1 class="display-1 mb-5 fw-bold animate__animated animate__flash animate__slower animate__infinite">
                    We are policy experts.
                </h1>

                <a href="{{route('aboutUs')}}" class="btn btn-dark rounded-pill px-4">
                    Learn More <i class="bi bi-arrow-right"></i>
                </a>

            </div>
        </div>
    </div>
</section>

<section class="mb-4">

    <div class="container d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Explore</h1>

        <a class="text-decoration-none text-dark" href="{{ route('insight') }}">
            See all
            <i class="bi bi-arrow-right-circle-fill"></i>
        </a>
    </div>


    <div id="heroSlider"
         class="carousel slide position-relative"
         data-bs-ride="false">

        <div class="carousel-inner container">

            @foreach($insights as $key => $insight)

                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">

                    <div class="position-relative overflow-hidden">

                        <img
                            src="{{ asset('images/insight/' . $insight->cover_image) }}"
                            class="d-block w-100 object-fit-cover"
                            style="height:650px;"
                            alt="{{ $insight->type->type }}"
                        >

                        <div class="position-absolute top-0 start-0 w-100 h-100
                                d-flex flex-column justify-content-center
                                align-items-center text-center p-4">

                            <p class="text-uppercase text-white-50 mb-2 fw-semibold tracking-wider">
                                Explore
                            </p>

                            <h1 class="display-2 fw-bold text-white mb-3">
                                {{ $insight->type->type }}
                            </h1>

                            <a
                                href="{{ route('insight.details', $insight->slug) }}"
                                class="btn btn-light text-uppercase rounded-pill px-4 py-2 shadow-sm"
                            >
                                See theme
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


        <!-- Controls -->
        <div class="container position-absolute bottom-0 start-50 translate-middle-x
                pb-5 px-4 d-flex justify-content-end z-3">

            <div class="d-flex gap-2">

                <!-- Previous -->
                <button
                    class="btn btn-dark bg-opacity-50 border-0 rounded-circle p-3
                       d-flex align-items-center justify-content-center shadow"
                    type="button"
                    data-bs-target="#heroSlider"
                    data-bs-slide="prev"
                    aria-label="Previous Slide"
                >
                    <i class="bx bx-left-arrow-alt fs-5"></i>
                </button>


                <!-- Next -->
                <button
                    class="btn btn-dark bg-opacity-50 border-0 rounded-circle p-3
                       d-flex align-items-center justify-content-center shadow"
                    type="button"
                    data-bs-target="#heroSlider"
                    data-bs-slide="next"
                    aria-label="Next Slide"
                >
                    <i class="bx bx-right-arrow-alt fs-5"></i>
                </button>

            </div>

        </div>

    </div>

</section>

<section class="mt-5">
    <div class="container py-lg-5">
        <div class="row align-items-center justify-content-center g-4 g-lg-5">

            <div class="col-12 col-md-6 col-lg-5">
                <div class="w-100">
                    <img src="{{ asset($institute->image) }}"
                         alt="Woman holding microphone at conference" class="img-fluid w-100 h-100 object-fit-cover" />
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ps-lg-5">
                <!-- Heading -->
                <h1 class="display-6 mb-4 text-dark fw-normal"
                    style=" font-size: 2.25rem; line-height: 1.2;">
                    {{$institute->title}}
                </h1>

                <!-- Tagline / Subtitle -->
                <p class="fw-bold text-dark fs-6 mb-3">
                    {{$institute->remark}}
                </p>

                <!-- Description Paragraph -->
                <p class="text-dark opacity-75 fs-6 mb-4 fw-normal" style="line-height: 1.6;">
                    {{$institute->details}}
                </p>

                <!-- Call to Action Button -->
                <a href="{{route('conference')}}"
                   class="btn btn-dark rounded-pill px-4 py-2 text-white d-inline-flex align-items-center gap-2 text-decoration-none shadow-sm"
                   style="font-size: 0.8rem; font-weight: 700; letter-spacing: 0.8px;">
                    <span class="text-uppercase">LEARN MORE</span>
                    <i class="bi bi-arrow-right fs-6"></i>
                </a>
            </div>

        </div>
    </div>
</section>

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

            @foreach($newsLetters as $newsLetter)
                <img src="{{ asset('images/news-letter/'.$newsLetter->image) }}"
                     class="ticker-img">

                <span class="ticker-text">{{ $newsLetter->title }}</span>
            @endforeach


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

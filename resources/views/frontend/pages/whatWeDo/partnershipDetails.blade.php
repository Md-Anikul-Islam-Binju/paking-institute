@extends('frontend.layout')
@section('content')

<!-- Inspiring change -->
<section class="mb-5 py-5 bg-white">
    <div class="container">
        <div class="mt-3">
            <p class="fw-bold mb-5 text-uppercase tracking-wider">Inspiring change</p>
            <div class="row align-items-start">
                <div class="col-md-6 pe-md-5">
                    <h1 class="mb-4 display-2 font-serif fw-normal" style="font-family: 'Times New Roman', serif;">
                        {{ $involved->title }}
                    </h1>
                    <p class="text-secondary fs-6 lh-base">
                        {!!$involved->details !!}
                    </p>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <img  src="{{ asset('images/involved/'.$involved->image) }}"
                         alt="Smiling professional at global networking event"
                         class="img-fluid w-100 object-fit-cover h-[50rem]">
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="mt-5 mb-5">
            <h1 class="display-1 fw-bold mb-4">
                Become part of a community collaborating to accelerate transformational impact.
            </h1>
            <div class="text-center">
                <button class="btn btn-dark text-uppercase rounded-pill px-4 py-2">Reach out <i class="bi bi-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <div class="p-4">
            <h1>Key benefits</h1>
        </div>
        <div class="accordion-wrapper d-flex gap-4" style="height:520px;">
            <!-- Card 1 -->
                <div class="accordion-card active" id="card-1" onclick="activateCard(1)" onmouseenter="activateCard(1)">
                    <div class="card-img-box  overflow-hidden rounded-4">
                        <img class="w-100 h-100 object-fit-cover"  src="{{asset('frontend/img/a1.webp')}}"
                             alt="Insights">
                        <div class="card-overlay"></div>
                    </div>

                    <div class="pt-3">
                        <h4 class="font-serif  mb-2">Innovate with other changemakers</h4>
                    </div>
                </div>

            <!-- Card 2 -->
                <div class="accordion-card" id="card-2" onclick="activateCard(2)" onmouseenter="activateCard(2)">
                    <div class="card-img-box overflow-hidden rounded-4">
                        <img class="w-100 h-100 object-fit-cover" src="{{asset('frontend/img/a2.webp')}}" alt="Partnerships">
                        <div class="card-overlay"></div>
                    </div>
                    <div class="pt-3">
                        <h4 class="font-serif  mb-2">
                            Collaborate on exclusive events
                        </h4>
                    </div>
                </div>
            <!-- Card 3 -->
                <div class="accordion-card" id="card-3" onclick="activateCard(3)" onmouseenter="activateCard(3)">
                    <div class="card-img-box overflow-hidden rounded-4">
                        <img class="w-100 h-100 object-fit-cover" src="{{asset('frontend/img/a3.webp')}}"
                             alt="Approach">
                        <div class="card-overlay"></div>
                    </div>
                    <div class="pt-3">
                        <h4 class="font-serif  mb-2">
                            Contribute radical, practical solutions to real-world problems
                        </h4>
                    </div>
                </div>
        </div>

    </div>

</section>

<!-- Create with us -->
<section class="py-5 text-dark bg-white">
    <div class="container py-4">
        <div class="row g-4">

            <!-- Left Column: Badge / Label -->
            <div class="col-md-3">
                <h6 class=" text-dark-emphasis text-uppercase ">
                    Create with us
                </h6>
            </div>

            <!-- Right Column: Links List -->
            <div class="col-md-9">
                <div class="d-flex flex-column">

                    <!-- Item 1 -->
                    <a href="{{url('what-we-do/partnerships/deliver-change')}}" class="d-flex justify-content-between align-items-center text-black text-decoration-none py-4 border-bottom border-secondary">
                        <span class="display-5 font-serif">Turn bold ideas into reality</span>
                        <i class="bi bi-arrow-right fs-4"></i>
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- Explore -->
<section class="py-5 bg-dark text-white">
    <div class="container py-4">
        <div class="row g-4">

            <!-- Left Column: Badge / Label -->
            <div class="col-md-3">
          <span class="badge text-white-emphasis text-uppercase fw-normal rounded-1 px-2 py-1">
            EXPLORE
          </span>
            </div>

            <!-- Right Column: Links List -->
            <div class="col-md-9">
                <div class="d-flex flex-column">

                    <!-- Item 1 -->
                    <a href="#" class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-secondary">
                        <span class="display-5 font-serif">TBI at Party Conferences 2026</span>
                        <i class="bi bi-arrow-right fs-4"></i>
                    </a>

                    <!-- Item 2 -->
                    <a href="#" class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-secondary">
                        <span class="display-5 font-serif">Insinghts</span>
                        <i class="bi bi-arrow-right fs-4"></i>
                    </a>

                    <!-- Item 3 -->
                    <a href="#" class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-bottom border-secondary">
                        <span class="display-5 font-serif">Experts</span>
                        <i class="bi bi-arrow-right fs-4"></i>
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection

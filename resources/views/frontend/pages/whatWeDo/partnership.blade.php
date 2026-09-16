@extends('frontend.layout')
@section('content')

    <!-- Partnerships -->

    <section class="vision-section py-5 text-bg-dark">
        <br>
        <div class="container ">
            <div class="mt-5 mb-5">
                <small class="text-uppercase text-white fw-semibold">Partnerships</small>
                <h2 class="display-1 fw-bold mt-3">{{$partnership->title}}</h2>
                <h5>{!! $partnership->details  !!}</h5>
            </div>
            <!-- শুধুমাত্র এই ডাইভটিতেই ওভারল্যাপ ক্লাস থাকবে -->
            <div class="overlapping-image-wrapper ">
                <img
                    src="{{ asset('images/partnership/'.$partnership->cover_image) }}"
                    class="img-fluid w-100  shadow-lg  object-fit-cover"
                    alt="Hero Banner Image"
                >
            </div>
        </div>
    </section>

    <section class="py-5 bg-white text-dark">
        <div class="container">

            <!-- Header -->
            <div class="row py-5">
                <div class="col-lg-9">
                    <h1 class="display-4 fw-bold mb-4">
                        Join Us to Deliver<br>
                        Meaningful Insight Together
                    </h1>

                    <p class="lead">
                        Peking Institute works with a range of partners — academic
                        institutions, research organizations, businesses, and civil
                        society groups — who share our commitment to rigorous,
                        independent analysis of international affairs.
                    </p>
                </div>
            </div>

            <!-- Ways to Partner -->
            <div class="row py-5 border-top">

                <div class="col-lg-4">
                    <h2 class="fw-bold mb-4">
                        Ways to Partner
                    </h2>
                </div>

                <div class="col-lg-8">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <div class="border-top border-dark pt-3 h-100">
                                <h4 class="fw-bold">
                                    Research Collaboration
                                </h4>
                                <p class="mb-0">
                                    Joint research initiatives with academic and
                                    policy institutions.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border-top border-dark pt-3 h-100">
                                <h4 class="fw-bold">
                                    Institutional Partnerships
                                </h4>
                                <p class="mb-0">
                                    Sustained relationships with organizations engaged
                                    in diplomacy, economics, or international law.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border-top border-dark pt-3 h-100">
                                <h4 class="fw-bold">
                                    Corporate &amp; Business Partnerships
                                </h4>
                                <p class="mb-0">
                                    Support for enterprises navigating geopolitical
                                    and regulatory change.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border-top border-dark pt-3 h-100">
                                <h4 class="fw-bold">
                                    Event &amp; Dialogue Partnerships
                                </h4>
                                <p class="mb-0">
                                    Co-convened roundtables, policy dialogues,
                                    and public forums.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Closing Statement -->
            <div class="row py-5 border-top">
                <div class="col-lg-9">
                    <p class="fs-4 fw-semibold">
                        Partnership does not mean uniformity of view. It means a
                        shared commitment to serious, evidence-based engagement
                        with the questions that matter.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <section class="py-5">
        <div class="container py-5">
            <div class="mb-5">
                <h1 class="display-1 fw-bold">How to get involved</h1>
                <p class="lead w-md-75">
                    Whether you’re looking to connect with global changemakers or co-develop scalable technology solutions with governments, Paking Institute offers multiple ways to partner.
                </p>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
                @foreach($involveds as $involved)
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="{{ asset('images/involved/'.$involved->image) }}"  class="card-img-top h-[50rem]" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">  {{ $involved->title }}</h2>
                            <p class="card-text mb-4">
                                {!! $involved->details
                                            ? \Illuminate\Support\Str::limit(strip_tags($involved->details),50)
                                            : 'N/A' !!}
                            </p>
                            <a href="{{route('partnership.details',$involved->slug)}}" class="btn btn-outline-dark text-uppercase fw-semibold rounded-pill px-4 py-2">Join Our Network <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Explore -->
    <section class="py-5 bg-dark text-white">
        <div class="container py-4">
            <div class="row g-4">

                <!-- Left Column: Badge / Label -->
                <div class="col-md-3">
          <span class="badge text-secondary-emphasis text-uppercase fw-normal rounded-1 px-2 py-1">
            EXPLORE
          </span>
                </div>

                <!-- Right Column: Links List -->
                <div class="col-md-9">
                    <div class="d-flex flex-column">

                        <!-- Item 1 -->
                        <a href="#" class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-secondary">
                            <span class="display-5 font-serif">Insights</span>
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>

                        <!-- Item 2 -->
                        <a href="#" class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-secondary">
                            <span class="display-5 font-serif">Approach</span>
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>

                        <!-- Item 3 -->
                        <a href="#" class="d-flex justify-content-between align-items-center text-white text-decoration-none py-4 border-top border-bottom border-secondary">
                            <span class="display-5 font-serif">Partnerships</span>
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

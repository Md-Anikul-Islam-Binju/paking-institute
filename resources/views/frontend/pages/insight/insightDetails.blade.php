@extends('frontend.layout')
@section('content')

    <section class="bg-tech text-white py-5 position-relative hero-section min-vh-100">
        <div class="container pb-5 mt-5">
            <br>
            <!-- Category & Title -->
            <div class="d-flex flex-column align-items-start text-start mb-4">
                <p class="text-uppercase fw-bold mb-2 opacity-75 tracking-wider"> {{ $insightDetail->type->type ?? 'N/A' }}</p>
                <h1 class="display-2 fw-semibold">
                    {{ $insightDetail->title }}
                </h1>
            </div>

            <!-- Horizontal Divider Line -->
            <hr class="border-white opacity-50 my-4">

            <!-- Row 1: Document Info & Authors -->
            <div
                class="d-flex justify-content-between align-items-center mb-4 fs-6 fw-semibold text-uppercase flex-wrap gap-2">
                <div>
                    <span>  {{ $insightDetail->tag }}</span>
                    <span class="mx-1 opacity-50">|</span>
                    <span>   {{ $insightDetail->date ? \Carbon\Carbon::parse($insightDetail->date)->format('d M Y') : 'N/A' }}</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span
                        class="badge rounded-circle bg-white text-dark p-2 d-inline-flex justify-content-center align-items-center"
                        style="width: 32px; height: 32px;">BB</span>
                    <a href="#" class="text-white text-decoration-underline text-transform-none">By Multiple Experts
                        (9)</a>
                </div>
            </div>

            <!-- Row 2: Action Icons & Social Sharing Buttons -->
            <div class="d-flex justify-content-between align-items-center pb-5 flex-wrap gap-3">
                <!-- Left Action Buttons -->
                <div class="d-flex gap-2">
                    <a href="#"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;" title="Table of Contents">
                        <i class="bi bi-list-task fs-5"></i>
                    </a>
                    <a href="#"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;" title="Download PDF">
                        <i class="bi bi-download fs-5"></i>
                    </a>
                </div>

                <!-- Right Social Share Buttons -->
                <div class="d-flex gap-2">
                    <a href="#"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;" title="Email"><i class="bi bi-envelope fs-5"></i></a>
                    <a href="#"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;" title="LinkedIn"><i class="bi bi-linkedin fs-5"></i></a>
                    <a href="#"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;" title="X / Twitter"><i class="bi bi-twitter-x fs-5"></i></a>
                    <a href="#"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;" title="Facebook"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;" title="WhatsApp"><i class="bi bi-whatsapp fs-5"></i></a>
                </div>
            </div>
            <!-- শুধুমাত্র এই ডাইভটিতেই ওভারল্যাপ ক্লাস থাকবে -->
            <div class="overlapping-image-wrapper ">
                <img
                    src="{{ asset('images/insight/'.$insightDetail->cover_image) }}"
                    class="img-fluid w-100  shadow-lg  object-fit-cover"
                    alt="Hero Banner Image"
                >
            </div>
        </div>



    </section>


    <!-- Executive Summary Section -->
    <section class="summary-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">

                    <!-- Section Heading -->
                    <h2 class="summary-title font-serif text-start mb-5">
                        Executive Summary
                    </h2>

                    <!-- Summary Paragraphs -->
                    <div class="summary-body">
                        <p>
                            {!!  $insightDetail->remark !!}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <hr class="container opacity-25 my-5">

    <!-- Chapter 1 -->
    <section class="chapter-section pb-5">
        <div class="container">
            @if($insightDetail->books->count())
                @foreach($insightDetail->books as $book)
                  <div class="row">

                <!-- Chapter Label -->
                <div class="col-12 col-md-3 col-lg-2 mb-3 mb-md-0">
                    <span class="text-uppercase fw-semibold text-muted small">
                          Chapter {{ $book->chapter_no }}
                    </span>
                </div>

                <!-- Content -->
                <div class="col-12 col-md-9 col-lg-8">

                    <!-- Title -->
                    <h2 class="fw-semibold text-dark mb-4">
                        {{ $book->title }}
                    </h2>

                    <!-- Body -->
                    <div class="lh-lg text-secondary">

                        <p class="mb-4">
                            {!! $book->details !!}
                        </p>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
    </section>
    <!-- add Chapter -->

    <section class="py-2">
        <div class="container">
            <div class="">
                <h1>Related Articles</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card border-0">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80"
                             class="card-img-top" alt="...">
                        <div class="card-body p-0 mt-3">
                            <p class="text-upparens"><box-icon type='solid' name='circle' size="14px"></box-icon>
                                Climate & Energy</p>
                            <h2 class="card-title">Powering AI in the Global South</h2>
                            <small class="card-text">Paper | 17th December 2024</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0">
                        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1200&q=90"
                             class="card-img-top" alt="...">
                        <div class="card-body p-0 mt-3">
                            <p class="text-upparens"><box-icon type='solid' name='circle' size="14px"></box-icon>
                                Climate & Energy</p>
                            <h2 class="card-title">Powering AI in the Global South</h2>
                            <small class="card-text">Paper | 17th December 2024</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0">
                        <img src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=1200&q=80"
                             class="card-img-top" alt="...">
                        <div class="card-body p-0 mt-3">
                            <p class="text-upparens"><box-icon type='solid' name='circle' size="14px"></box-icon>
                                Climate & Energy</p>
                            <h2 class="card-title">Powering AI in the Global South</h2>
                            <small class="card-text">Paper | 17th December 2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-5 mt-5">
        <div class="">
            <h4>Article Tags</h4>
        </div>
        <hr>
        <div class="d-flex flex-wrap gap-2 mt-4">

            <a href="#" class="btn btn-outline-dark px-4 py-2">
                Artificial Intelligence
            </a>

            <a href="#" class="btn btn-outline-dark px-4 py-2">
                Tech
            </a>

            <a href="#" class="btn btn-outline-dark px-4 py-2">
                Digital Transformation
            </a>

            <a href="#" class="btn btn-outline-dark px-4 py-2">
                Cybersecurity
            </a>

            <a href="#" class="btn btn-outline-dark px-4 py-2">
                Government Delivery
            </a>

            <a href="#" class="btn btn-outline-dark px-4 py-2">
                Investment
            </a>

        </div>
    </section>

    <section class=" py-5 overflow-hidden position-relative text-bg-dark mt-5">

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

                <span class="ticker-text">Radical Ideas</span>

                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=300&auto=format&fit=crop"
                     class="ticker-img">

                <span class="ticker-text">Practical Solutions</span>

                <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?q=80&w=300&auto=format&fit=crop"
                     class="ticker-img">

                <!-- Duplicate -->
                <span class="ticker-text">Radical Ideas</span>

                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=300&auto=format&fit=crop"
                     class="ticker-img">

                <span class="ticker-text">Practical Solutions</span>

                <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?q=80&w=300&auto=format&fit=crop"
                     class="ticker-img">

            </div>
        </div>

        <!-- Button -->
        <div class="container text-center">

            <a href="#"
               class="btn border-0 bg-transparent text-white fw-semibold d-inline-flex align-items-center gap-2">

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

@extends('frontend.layout')
@section('content')
    <style>

        .insight-type-banner {
            width: 100%;
            min-height: 260px;
            overflow: hidden;
            position: relative;
            border-radius: 0;
        }


        /* Center Content */
        .banner-content {
            padding: 40px 25px;
            color: #fff;
            position: relative;
            z-index: 2;
        }


        /* Count */
        .banner-count {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }


        /* Type Name */
        .banner-title {
            margin: 0;
            font-size: clamp(32px, 4vw, 58px);
            line-height: 1.1;
            font-weight: 500;
            color: #fff;
        }


        /* Image */
        .banner-image-wrapper {
            height: 260px;
            width: 100%;
            overflow: hidden;
        }


        .banner-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }


        /* Slightly angled image effect */
        .banner-image-left {
            clip-path: polygon(
                0 0,
                92% 0,
                100% 50%,
                92% 100%,
                0 100%
            );
        }


        .banner-image-right {
            clip-path: polygon(
                8% 0,
                100% 0,
                100% 100%,
                8% 100%,
                0 50%
            );
        }


        /* Image Hover */
        .banner-image {
            transition: transform 0.5s ease;
        }

        .insight-type-banner:hover .banner-image {
            transform: scale(1.05);
        }


        /* Mobile */
        @media (max-width: 767px) {

            .insight-type-banner {
                min-height: auto;
            }

            .banner-image-wrapper {
                height: 180px;
            }

            .banner-image-left,
            .banner-image-right {
                clip-path: none;
            }

            .banner-content {
                padding: 35px 20px;
            }

            .banner-title {
                font-size: 34px;
            }

            .banner-count {
                font-size: 14px;
            }

        }

    </style>
    <br><br><br>
    <section class="mt-2 mb-5" data-header-theme="light">

        <div class="">

            {{-- =========================
                Dynamic Type Banner
            ========================== --}}
            <div
                class="insight-type-banner mb-5"
                style="background-color: {{ $type->color_code ?? '#6197a3' }};"
            >

                <div class="row align-items-center g-0">

                    {{-- Primary Image --}}
                    <div class="col-md-3">

                        @if($type->primary_image)

                            <div class="banner-image-wrapper banner-image-left">

                                <img
                                    src="{{ asset($type->primary_image) }}"
                                    alt="{{ $type->type }}"
                                    class="banner-image"
                                >

                            </div>

                        @endif

                    </div>


                    {{-- Center Information --}}
                    <div class="col-md-6">

                        <div class="banner-content text-center">

                            {{-- Total Count --}}
                            <div class="banner-count">

                                {{ $totalInsights }}

                                {{ $totalInsights == 1 ? 'Insight' : 'Insights' }}

                            </div>


                            {{-- Type Name --}}
                            <h1 class="banner-title">
                                {{ $type->type }}
                            </h1>

                        </div>

                    </div>


                    {{-- Secondary Image --}}
                    <div class="col-md-3">

                        @if($type->secondary_image)

                            <div class="banner-image-wrapper banner-image-right">

                                <img
                                    src="{{ asset($type->secondary_image) }}"
                                    alt="{{ $type->type }}"
                                    class="banner-image"
                                >

                            </div>

                        @endif

                    </div>

                </div>

            </div>




        </div>

    </section>


    <section class="mt-5 mb-5">
        <div class="container-md">
            <div
                id="insights-container"
                class="row row-cols-1 row-cols-md-3 g-4"
            >

                @forelse($type->insights as $key => $insight)

                    <div
                        class="col insight-item"
                        style="{{ $key >= 12 ? 'display: none;' : '' }}"
                    >

                        <a
                            class="text-decoration-none"
                            href="{{ route('insight.details', $insight->slug) }}"
                        >

                            <div class="card border-0 h-100">

                                {{-- Image --}}
                                @if($insight->cover_image)

                                    <img
                                        src="{{ asset('images/insight/'.$insight->cover_image) }}"
                                        class="card-img-top"
                                        alt="{{ $insight->title }}"
                                        style="
                                            height: 260px;
                                            object-fit: cover;
                                        "
                                    >

                                @else

                                    <img
                                        src="{{ asset('frontend/img/hero.png') }}"
                                        class="card-img-top"
                                        alt="{{ $insight->title }}"
                                        style="
                                            height: 260px;
                                            object-fit: cover;
                                        "
                                    >

                                @endif


                                <div class="card-body px-0">

                                    {{-- Category --}}
                                    <p class="text-uppercase mb-2">

                                        <span
                                            class="d-inline-block rounded-circle me-1"
                                            style="
                                                width: 9px;
                                                height: 9px;
                                                background-color: {{ $type->color_code ?? '#6197a3' }};
                                            "
                                        ></span>

                                        <small class="fw-semibold">
                                            {{ $type->type }}
                                        </small>

                                    </p>


                                    {{-- Title --}}
                                    <h5 class="card-title">
                                        {{ $insight->title }}
                                    </h5>


                                    {{-- Tag + Date --}}
                                    <p class="text-uppercase mb-3">

                                        <small>

                                            @if($insight->tag)
                                                {{ $insight->tag }}
                                            @endif

                                            @if($insight->tag && $insight->date)
                                                |
                                            @endif

                                            @if($insight->date)

                                                {{ \Carbon\Carbon::parse($insight->date)->format('jS F Y') }}

                                            @endif

                                        </small>

                                    </p>

                                </div>

                            </div>

                        </a>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-light border text-center">
                            No insights found.
                        </div>

                    </div>

                @endforelse

            </div>
            @if($totalInsights > 12)

                <div class="text-center mt-5">

                    <button
                        type="button"
                        id="seeMoreBtn"
                        class="btn btn-outline-dark px-5 py-3 rounded-pill"
                    >
                        See More
                    </button>

                </div>

            @endif
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






    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const items = document.querySelectorAll('.insight-item');
            const seeMoreBtn = document.getElementById('seeMoreBtn');

            let visibleItems = 12;
            const increment = 12;


            if (!seeMoreBtn) {
                return;
            }


            seeMoreBtn.addEventListener('click', function () {

                const nextVisibleItems = visibleItems + increment;


                for (
                    let i = visibleItems;
                    i < nextVisibleItems;
                    i++
                ) {

                    if (items[i]) {
                        items[i].style.display = '';
                    }

                }


                visibleItems = nextVisibleItems;


                if (visibleItems >= items.length) {

                    seeMoreBtn.style.display = 'none';

                }

            });

        });

    </script>



@endsection

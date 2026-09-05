@extends('frontend.layout')

@section('content')

    {{-- =========================================================
        HERO SECTION
    ========================================================== --}}
    <section class="bg-tech text-white py-5 position-relative hero-section min-vh-100">
        <div class="container pb-5 mt-5">
            <br>

            {{-- Category & Title --}}
            <div class="d-flex flex-column align-items-start text-start mb-4">
                <p class="text-uppercase fw-bold mb-2 opacity-75 tracking-wider">
                    {{ $insightDetail->type->type ?? 'N/A' }}
                </p>

                <h1 class="display-2 fw-semibold">
                    {{ $insightDetail->title }}
                </h1>
            </div>

            <hr class="border-white opacity-50 my-4">

            {{-- =====================================================
                DOCUMENT INFO & AUTHORS
            ====================================================== --}}
            <div class="d-flex justify-content-between align-items-center mb-4 fs-6 fw-semibold text-uppercase flex-wrap gap-2">

                <div>
                    <span>
                        {{ $insightDetail->tag ?? 'Insight' }}
                    </span>

                    <span class="mx-1 opacity-50">|</span>

                    <span>
                        {{ $insightDetail->date
                            ? \Carbon\Carbon::parse($insightDetail->date)->format('d M Y')
                            : 'N/A'
                        }}
                    </span>
                </div>

                {{-- Multiple Experts --}}
                @if($multipleExpertCount > 0)
                    <div class="d-flex align-items-center gap-2">

                        <span
                            class="badge rounded-circle bg-white text-dark p-2 d-inline-flex justify-content-center align-items-center"
                            style="width: 32px; height: 32px;">
                            EM
                        </span>

                        <span class="text-white text-decoration-underline text-transform-none">
                            By Multiple Experts ({{ $multipleExpertCount }})
                        </span>

                    </div>
                @endif

            </div>

            {{-- =====================================================
                ACTION BUTTONS & SOCIAL SHARE
            ====================================================== --}}
            <div class="d-flex justify-content-between align-items-center pb-5 flex-wrap gap-3">

                {{-- LEFT SIDE --}}
                <div class="d-flex gap-2">

                    {{-- Table of Contents --}}
                    @if($insightDetail->books->count() > 0)

                        <a href="#"
                           data-bs-toggle="modal"
                           data-bs-target="#tableOfContentsModal"
                           class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                           style="width: 44px; height: 44px;"
                           title="Table of Contents">

                            <i class="bi bi-list-task fs-5"></i>

                        </a>


                        {{-- =========================================================
                            TABLE OF CONTENTS MODAL
                        ========================================================== --}}
                        @if($insightDetail->books->count() > 0)

                            <div class="modal fade"
                                 id="tableOfContentsModal"
                                 tabindex="-1"
                                 aria-labelledby="tableOfContentsModalLabel"
                                 aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered modal-lg">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title" id="tableOfContentsModalLabel">
                                                Table of Contents
                                            </h5>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close">
                                            </button>

                                        </div>


                                        <div class="modal-body">

                                            <div class="list-group">

                                                @foreach($insightDetail->books as $book)

                                                    {{-- IMPORTANT:
                                                         এখানে কোনো duplicate ID রাখা হয়নি --}}
                                                    <a href="#chapter-{{ $book->id }}"
                                                       class="list-group-item list-group-item-action d-flex align-items-center gap-3 toc-link">

                                    <span class="badge bg-dark rounded-pill">
                                        {{ $book->chapter_no }}
                                    </span>

                                                        <span>
                                        {{ $book->title }}
                                    </span>

                                                    </a>

                                                @endforeach

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endif

                    @endif


                    {{-- Download PDF --}}
                    @if(!empty($insightDetail->pdf_file))

                        <a href="{{ asset('files/insight-pdf/' . $insightDetail->pdf_file) }}"
                           download
                           class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                           style="width: 44px; height: 44px;"
                           title="Download PDF">

                            <i class="bi bi-download fs-5"></i>

                        </a>

                    @endif

                </div>


                {{-- =================================================
                    SOCIAL SHARE BUTTONS
                ================================================== --}}
                @php
                    $shareUrl = urlencode(url()->current());
                    $shareTitle = urlencode($insightDetail->title);
                @endphp

                <div class="d-flex gap-2">

                    {{-- Email --}}
                    <a href="mailto:?subject={{ $shareTitle }}&body={{ urlencode(url()->current()) }}"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="Email">

                        <i class="bi bi-envelope fs-5"></i>

                    </a>


                    {{-- LinkedIn --}}
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="LinkedIn">

                        <i class="bi bi-linkedin fs-5"></i>

                    </a>


                    {{-- X / Twitter --}}
                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="X / Twitter">

                        <i class="bi bi-twitter-x fs-5"></i>

                    </a>


                    {{-- Facebook --}}
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="Facebook">

                        <i class="bi bi-facebook fs-5"></i>

                    </a>


                    {{-- WhatsApp --}}
                    <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="WhatsApp">

                        <i class="bi bi-whatsapp fs-5"></i>

                    </a>

                </div>

            </div>


            {{-- =====================================================
                COVER IMAGE
            ====================================================== --}}
            <div class="overlapping-image-wrapper">

                <img
                    src="{{ asset('images/insight/' . $insightDetail->cover_image) }}"
                    class="img-fluid w-100 shadow-lg object-fit-cover"
                    alt="{{ $insightDetail->title }}"
                >

            </div>

        </div>
    </section>






    {{-- =========================================================
        EXECUTIVE SUMMARY
    ========================================================== --}}
    <section class="summary-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-12 col-md-10 col-lg-8">

                    <h2 class="summary-title font-serif text-start mb-5">
                        Executive Summary
                    </h2>

                    <div class="summary-body">

                        {!! $insightDetail->remark !!}

                    </div>

                </div>

            </div>

        </div>

    </section>



    <hr class="container opacity-25 my-5">



    {{-- =========================================================
        CHAPTERS
    ========================================================== --}}
    @if($insightDetail->books->count() > 0)

        <section class="chapter-section pb-5">

            <div class="container">

                @foreach($insightDetail->books as $book)

                    {{-- IMPORTANT:
                         এই ID-টাই TOC থেকে target হবে --}}
                    <div class="row mb-5"
                         id="chapter-{{ $book->id }}">

                        {{-- Chapter Label --}}
                        <div class="col-12 col-md-3 col-lg-2 mb-3 mb-md-0">

                            <span class="text-uppercase fw-semibold text-muted small">
                                Chapter {{ $book->chapter_no }}
                            </span>

                        </div>


                        {{-- Chapter Content --}}
                        <div class="col-12 col-md-9 col-lg-8">

                            <h2 class="fw-semibold text-dark mb-4">
                                {{ $book->title }}
                            </h2>

                            <div class="lh-lg text-secondary">

                                {!! $book->details !!}

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    @endif



    {{-- =========================================================
        RELATED ARTICLES
    ========================================================== --}}
    <section class="py-2">

        <div class="container">

            <div class="mb-4">

                <h1>
                    Related Articles
                </h1>

            </div>


            <div class="row row-cols-1 row-cols-md-3 g-4">

                @forelse($relatedInsights as $relatedInsight)

                    <div class="col">

                        <div class="card border-0 h-100">

                            {{-- Image --}}
                            <a href="{{ route('insight.details', $relatedInsight->slug) }}">

                                @if(!empty($relatedInsight->cover_image))

                                    <img
                                        src="{{ asset('images/insight/' . $relatedInsight->cover_image) }}"
                                        class="card-img-top md:h-[15rem]"
                                        alt="{{ $relatedInsight->title }}"
                                    >

                                @endif

                            </a>


                            <div class="card-body p-0 mt-3">

                                <p class="text-uppercase">

                                    <box-icon
                                        type="solid"
                                        name="circle"
                                        size="14px">
                                    </box-icon>

                                    {{ $relatedInsight->type->type ?? 'N/A' }}

                                </p>


                                <h2 class="card-title">

                                    <a href="{{ route('insight.details', $relatedInsight->slug) }}"
                                       class="text-decoration-none text-dark">

                                        {{ $relatedInsight->title }}

                                    </a>

                                </h2>


                                <small class="card-text">

                                    {{ $relatedInsight->tag ?? 'Insight' }}

                                    |

                                    {{ $relatedInsight->date
                                        ? \Carbon\Carbon::parse($relatedInsight->date)->format('d F Y')
                                        : 'N/A'
                                    }}

                                </small>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <p class="text-muted">
                            No related articles found.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>



    {{-- =========================================================
        ARTICLE TAGS
    ========================================================== --}}
    <section class="px-5 mt-5">

        <div>

            <h4>
                Article Tags
            </h4>

        </div>

        <hr>


        <div class="d-flex flex-wrap gap-2 mt-4">

            @if(!empty($insightDetail->tag))

                @foreach(explode(',', $insightDetail->tag) as $tag)

                    @php
                        $tag = trim($tag);
                    @endphp

                    @if($tag)

                        <a href="#"
                           class="btn btn-outline-dark px-4 py-2">

                            {{ $tag }}

                        </a>

                    @endif

                @endforeach

            @else

                <span class="text-muted">
                    No tags available.
                </span>

            @endif

        </div>

    </section>



    {{-- =========================================================
        NEWSLETTER TICKER
    ========================================================== --}}
    <section class="py-5 overflow-hidden position-relative text-bg-dark mt-5">

        {{-- Heading --}}
        <div class="container text-center mt-5 pt-4 mb-5">

            <span
                class="text-uppercase fw-semibold text-secondary"
                style="font-size:.75rem;letter-spacing:3px;">

                NEWSLETTER

            </span>

        </div>


        {{-- =====================================================
            ROW 1
        ====================================================== --}}
        <div class="ticker-wrapper mb-4">

            <div class="ticker-track gap-4" id="row1Track">

                @forelse($insightTypes as $type)

                    <span class="ticker-text">
                        {{ $type->type }}
                    </span>

                    <img
                        src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=300&auto=format&fit=crop"
                        class="ticker-img"
                        alt="{{ $type->type }}"
                    >

                @empty

                    <span class="ticker-text">
                        Practical Solutions
                    </span>

                    <span class="ticker-text">
                        Radical Ideas
                    </span>

                @endforelse


                {{-- Duplicate items for continuous ticker --}}
                @forelse($insightTypes as $type)

                    <span class="ticker-text">
                        {{ $type->type }}
                    </span>

                    <img
                        src="https://images.unsplash.com/photo-1518837695005-2083093ee35b?q=80&w=300&auto=format&fit=crop"
                        class="ticker-img"
                        alt="{{ $type->type }}"
                    >

                @empty
                @endforelse

            </div>

        </div>



        {{-- =====================================================
            ROW 2
        ====================================================== --}}
        <div class="ticker-wrapper mb-5">

            <div class="ticker-track gap-4" id="row2Track">

                @forelse($insightTypes->reverse() as $type)

                    <span class="ticker-text">
                        {{ $type->type }}
                    </span>

                    <img
                        src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=300&auto=format&fit=crop"
                        class="ticker-img"
                        alt="{{ $type->type }}"
                    >

                @empty

                    <span class="ticker-text">
                        Radical Ideas
                    </span>

                    <span class="ticker-text">
                        Practical Solutions
                    </span>

                @endforelse


                {{-- Duplicate items --}}
                @forelse($insightTypes as $type)

                    <span class="ticker-text">
                        {{ $type->type }}
                    </span>

                    <img
                        src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?q=80&w=300&auto=format&fit=crop"
                        class="ticker-img"
                        alt="{{ $type->type }}"
                    >

                @empty
                @endforelse

            </div>

        </div>



        {{-- SIGN UP BUTTON --}}
        <div class="container text-center">

            <a href="#"
               class="btn border-0 bg-transparent text-white fw-semibold d-inline-flex align-items-center gap-2">

                <span style="letter-spacing:2px;font-size:.8rem;">
                    SIGN UP
                </span>

                <span
                    class="bg-dark text-white rounded-circle d-flex justify-content-center align-items-center"
                    style="width:28px;height:28px;">

                    <i class="bi bi-arrow-right"></i>

                </span>

            </a>

        </div>

    </section>



    {{-- =========================================================
        TOC CHAPTER SCROLL
    ========================================================== --}}
    <style>

        /*
        |--------------------------------------------------------------------------
        | Chapter scroll offset
        |--------------------------------------------------------------------------
        | Navbar/fixed header থাকলে chapter যেন header-এর নিচে চলে না যায়।
        */
        [id^="chapter-"] {
            scroll-margin-top: 100px;
        }

        /*
        |--------------------------------------------------------------------------
        | TOC hover
        |--------------------------------------------------------------------------
        */
        .toc-link {
            transition: all 0.2s ease;
        }

        .toc-link:hover {
            transform: translateX(4px);
        }

    </style>


    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /*
            |--------------------------------------------------------------------------
            | Table of Contents -> Chapter Scroll
            |--------------------------------------------------------------------------
            */

            const tocLinks = document.querySelectorAll('.toc-link');

            tocLinks.forEach(function (link) {

                link.addEventListener('click', function (e) {

                    e.preventDefault();

                    const targetId = this.getAttribute('href');

                    if (!targetId) {
                        return;
                    }

                    const target = document.querySelector(targetId);

                    if (!target) {
                        return;
                    }

                    const modalElement =
                        document.getElementById('tableOfContentsModal');


                    /*
                    |--------------------------------------------------------------------------
                    | Bootstrap modal close হওয়ার পরে scroll
                    |--------------------------------------------------------------------------
                    */

                    if (modalElement) {

                        const modalInstance =
                            bootstrap.Modal.getInstance(modalElement);

                        if (modalInstance) {

                            modalElement.addEventListener(
                                'hidden.bs.modal',
                                function () {

                                    target.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'start'
                                    });

                                },
                                {
                                    once: true
                                }
                            );

                            modalInstance.hide();

                        } else {

                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });

                        }

                    } else {

                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                    }

                });

            });

        });

    </script>


@endsection

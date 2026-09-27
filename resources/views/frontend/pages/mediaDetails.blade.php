@extends('frontend.layout')

@section('meta_title')
    {{ $media->title }} | Peking Institute
@endsection

@section('meta_description')
    {{ Str::limit(strip_tags($media->remark), 160) }}
@endsection

@section('og_type')
    article
@endsection

@section('og_title')
    {{ $media->title }}
@endsection

@section('og_description')
    {{ Str::limit(strip_tags($media->remark), 160) }}
@endsection

@section('og_url')
    {{ url()->current() }}
@endsection

@section('og_image')
    @if(!empty($media->cover_image))
        {{ asset('images/media-center/' . $media->cover_image) }}
    @else
        {{ asset('images/default-og.jpg') }}
    @endif
@endsection

@section('twitter_title')
    {{ $media->title }}
@endsection

@section('twitter_description')
    {{ Str::limit(strip_tags($media->remark), 160) }}
@endsection

@section('twitter_image')
    @if(!empty($media->cover_image))
        {{ asset('images/media-center/' . $media->cover_image) }}
    @else
        {{ asset('images/default-og.jpg') }}
    @endif
@endsection

@section('content')

    <style>
        /* ================================
           Overlapping Image
        ================================= */

        .overlapping-image-wrapper {
            position: relative;
            z-index: 10;
            margin-bottom: -25rem;
        }

        .overlapping-image-wrapper img {
            height: 50rem;
            width: 100%;
            object-fit: cover;
            display: block;
        }

        /* Image exists */
        section:has(.overlapping-image-wrapper)+section {
            padding-top: 27rem !important;
        }

        /* Image does not exist */
        section:not(:has(.overlapping-image-wrapper))+section {
            padding-top: 3rem !important;
        }


        /* ================================
           Mobile
        ================================= */

        @media (max-width: 767.98px) {

            .overlapping-image-wrapper {
                margin-bottom: -9rem;
            }

            .overlapping-image-wrapper img {
                height: 18rem !important;
            }

            section:has(.overlapping-image-wrapper)+section {
                padding-top: 11rem !important;
            }

            section:not(:has(.overlapping-image-wrapper))+section {
                padding-top: 3rem !important;
            }
        }
    </style>


    {{-- ==========================================
        HERO SECTION
    ========================================== --}}

    <section class="bg-secondary text-white py-5 position-relative hero-section">

        <div class="container pt-4 pb-1">

            {{-- Category & Title --}}
            <div class="d-flex flex-column align-items-start text-start mb-4 mt-5">

                <p class="text-uppercase fw-bold mb-2 opacity-75 tracking-wider">
                    {{ $media->category ?? 'News' }}
                </p>

                <h1 class="display-2 fw-semibold">
                    {{ $media->title }}
                </h1>

            </div>


            {{-- Divider --}}
            <hr class="border-white opacity-50 my-4">


            {{-- Document Info & Date --}}
            <div class="d-flex justify-content-between align-items-center mb-4 fs-6 fw-semibold text-uppercase flex-wrap gap-2">

                <div>

                    <span>
                        {{ $media->category ?? 'News' }}
                    </span>

                    <span class="mx-1 opacity-50">|</span>

                    <span>
                        {{ $media->created_at->format('jS F Y') }}
                    </span>

                </div>

            </div>


            {{-- ==========================================
                Social Sharing
            ========================================== --}}

            <div class="d-flex justify-content-end align-items-center pb-1 flex-wrap gap-3">

                <div class="d-flex gap-2">

                    {{-- Email --}}
                    <a href="mailto:?subject={{ urlencode($media->title) }}&body={{ urlencode(url()->current()) }}"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="Share via Email">

                        <i class="bi bi-envelope fs-5"></i>

                    </a>


                    {{-- LinkedIn --}}
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="Share on LinkedIn">

                        <i class="bi bi-linkedin fs-5"></i>

                    </a>


                    {{-- X --}}
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($media->title) }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="Share on X">

                        <i class="bi bi-twitter-x fs-5"></i>

                    </a>


                    {{-- Facebook --}}
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="Share on Facebook">

                        <i class="bi bi-facebook fs-5"></i>

                    </a>


                    {{-- WhatsApp --}}
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($media->title . ' ' . url()->current()) }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-outline-light rounded-circle p-0 d-inline-flex justify-content-center align-items-center"
                       style="width: 44px; height: 44px;"
                       title="Share on WhatsApp">

                        <i class="bi bi-whatsapp fs-5"></i>

                    </a>

                </div>

            </div>


            {{-- ==========================================
                Image - Only Show If Image Exists
            ========================================== --}}

            @if(!empty($media->cover_image))

                <div class="overlapping-image-wrapper mt-4">

                    <img src="{{ asset('images/media-center/' . $media->cover_image) }}"
                         class="img-fluid shadow-lg"
                         alt="{{ $media->title }}">

                </div>

            @endif

        </div>

    </section>



    {{-- ==========================================
        Details / Content Section
    ========================================== --}}

    <section class="mt-3 mb-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-12 col-md-10 col-lg-8">


                    {{-- Section Heading --}}
                    <h2 class="summary-title font-serif text-start mb-5">
                        {{ $media->title }}
                    </h2>


                    {{-- Details --}}
                    <div class="summary-body">

                        {!! $media->remark !!}

                    </div>

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

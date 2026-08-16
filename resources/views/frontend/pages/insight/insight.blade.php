@extends('frontend.layout')
@section('content')
<style>
    .bg-tech-digitalisation {
        background: #6197a3;
    }

    .bg-economic-prosperity {
        background: #7794B4;
    }

    .bg-geopolitics-security {
        background: #B57671;
    }

    .bg-politics-governance {
        background: #CE8042;
    }

    .bg-climate-energy {
        background: #8F7193;
    }

    .bg-public-services {
        background: #879C59;
    }
</style>
<!-- Hero Section -->
<div class="card text-white bg-dark border-0 vh-100">
    <img src="{{asset('frontend/img/hero.png')}}" class="card-img" alt="Hero background image"
         style="object-fit: cover; min-height: 400px;">

    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center p-4">
        <p class="text-uppercase tracking-wide mb-2">Ideas with impact</p>
        <h1 class="display-1 fw-bold mb-3">Insights</h1>

        <p class="card-text max-w-md my-3" style="max-width: 600px;">
            Make better decisions across strategy, policy, and delivery with the latest insights, research, and
            reports from our experts.
        </p>
    </div>
</div>


@if($featuredInsight)

    <div class="container">
        <a href="{{route('insight.details',$featuredInsight->slug)}}">
            <div class="card text-white mt-5 overflow-hidden border-0 rounded-0 position-relative">

                {{-- Background Image --}}
                @if($featuredInsight->cover_image)

                    <img
                        src="{{ asset('images/insight/'.$featuredInsight->cover_image) }}"
                        class="card-img rounded-0"
                        alt="{{ $featuredInsight->title }}"
                        style="object-fit: cover; min-height: 550px;"
                    >

                @else

                    <img
                        src="{{ asset('frontend/img/hero.png') }}"
                        class="card-img rounded-0"
                        alt="{{ $featuredInsight->title }}"
                        style="object-fit: cover; min-height: 550px;"
                    >

                @endif


                {{-- Dark Overlay --}}
                <div
                    class="card-img-overlay d-flex flex-column justify-content-end p-4 p-md-5"
                    style="
                background:
                linear-gradient(
                    to top,
                    rgba(0,0,0,0.95) 0%,
                    rgba(0,0,0,0.4) 60%,
                    rgba(0,0,0,0.2) 100%
                );
            "
                >

                    <div class="col-12 col-lg-8 ps-md-3">

                        {{-- Category --}}
                        <small
                            class="text-uppercase fw-semibold text-white-50 d-block mb-2"
                            style="
                        letter-spacing: 1.5px;
                        font-size: 0.75rem;
                    "
                        >
                            {{ $featuredInsight->type?->type }}
                        </small>


                        {{-- Title --}}
                        <h1
                            class="display-4 fw-normal text-white mb-4"
                            style="
                        font-family: 'Times New Roman', Georgia, serif;
                        line-height: 1.15;
                    "
                        >
                            {{ $featuredInsight->title }}
                        </h1>


                        {{-- Date --}}
                        @if($featuredInsight->date)

                            <p
                                class="small text-uppercase text-white-50 fw-semibold mb-2"
                                style="
                            letter-spacing: 1px;
                            font-size: 0.75rem;
                        "
                            >
                                {{ \Carbon\Carbon::parse($featuredInsight->date)->format('jS F Y') }}
                            </p>

                        @endif


                        {{-- Remark --}}
                        @if($featuredInsight->remark)

                            <div
                                class="card-text text-white-50 small mb-0"
                                style="font-size: 0.85rem;"
                            >
                                {!! \Illuminate\Support\Str::limit(strip_tags($featuredInsight->remark), 220) !!}
                            </div>

                        @endif

                    </div>

                </div>

            </div>
        </a>
    </div>

@endif

<section class="mt-5 mb-5">
    <div class="container-md">

        <div class="row row-cols-1 row-cols-md-3 g-4">

            @forelse($insights as $insight)

               <a class="text-decoration-none" href="{{route('insight.details',$insight->slug)}}">
                   <div class="col">
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
                               @if($insight->type)
                                   <p class="text-uppercase mb-2">

                                    <span
                                        class="d-inline-block rounded-circle me-1"
                                        style="
                                            width: 9px;
                                            height: 9px;
                                            background-color: #6197a3;
                                        "
                                    ></span>

                                       <small class="fw-semibold">
                                           {{ $insight->type->type }}
                                       </small>

                                   </p>
                               @endif

                               {{-- Title --}}
                               <h5 class="card-title">
                                   {{ $insight->title }}
                               </h5>

                               {{-- Date / Tag --}}
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

                               {{-- Remark --}}
                               @if($insight->remark)
                                   <div class="card-text">
                                       {!! \Illuminate\Support\Str::limit(
                                           strip_tags($insight->remark),
                                           180
                                       ) !!}
                                   </div>
                               @endif

                           </div>
                       </div>
                   </div>
               </a>

            @empty

                <div class="col-12">
                    <div class="alert alert-light border text-center">
                        No insights found.
                    </div>
                </div>

            @endforelse

        </div>

    </div>
</section>


<section id="topicSection" class="py-5 bg-tech">

    <div class="px-lg-5">

        {{-- Dynamic Section Title --}}
        <h2 id="sectionTitle" class="fw-bold mb-3 text-white">
            {{ $insightTypes->first()?->type }}
        </h2>

        <hr>

        {{-- =========================
            DYNAMIC CATEGORY NAV
        ========================== --}}
        <ul class="nav nav-pills gap-3 mb-5">

            @foreach($insightTypes as $key => $type)

                <li class="nav-item">

                    <button
                        class="nav-link {{ $key == 0 ? 'active' : '' }} text-white"
                        data-bs-toggle="tab"
                        data-bs-target="#category-{{ $type->id }}"
                        data-bg="bg-{{ $type->slug }}"
                        data-title="{{ $type->type }}"
                    >
                        {{ $type->type }}
                    </button>

                </li>

            @endforeach

        </ul>


        {{-- =========================
            DYNAMIC CARDS
        ========================== --}}
        <div class="tab-content">

            @foreach($insightTypes as $key => $type)

                @php
                    $latestInsight = $type->insights->first();
                @endphp

                <div
                    class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                    id="category-{{ $type->id }}"
                >

                    @if($latestInsight)
                        <a href="{{route('insight.details',$latestInsight->slug)}}">
                            <div class="card border-0 text-white overflow-hidden">

                                {{-- ================= IMAGE ================= --}}
                                @if($latestInsight->cover_image)

                                    <img
                                        src="{{ asset('images/insight/'.$latestInsight->cover_image) }}"
                                        class="card-img"
                                        alt="{{ $latestInsight->title }}"
                                        style="
                                        width: 100%;
                                        height: 600px;
                                        object-fit: cover;
                                    "
                                    >

                                @else

                                    <img
                                        src="{{ asset('frontend/img/hero.png') }}"
                                        class="card-img"
                                        alt="{{ $latestInsight->title }}"
                                        style="
                                        width: 100%;
                                        height: 600px;
                                        object-fit: cover;
                                    "
                                    >

                                @endif


                                {{-- ================= OVERLAY ================= --}}
                                <div
                                    class="card-img-overlay overlay d-flex align-items-end"
                                >

                                    <div class="col-12 col-lg-6 p-4 p-lg-5">


                                        {{-- CATEGORY --}}
                                        <p class="text-uppercase fw-semibold mb-3">
                                            {{ $type->type }}
                                        </p>


                                        {{-- TITLE --}}
                                        <h1 class="display-3 fw-normal">

                                            {{ $latestInsight->title }}

                                        </h1>


                                        {{-- DATE --}}
                                        @if($latestInsight->date)

                                            <p class="text-uppercase mt-3">

                                                {{ \Carbon\Carbon::parse($latestInsight->date)->format('jS F Y') }}

                                            </p>

                                        @endif


                                        {{-- REMARK --}}
                                        @if($latestInsight->remark)

                                            <div class="mt-3">

                                                {!! \Illuminate\Support\Str::limit(
                                                    strip_tags($latestInsight->remark),
                                                    300
                                                ) !!}

                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </div>
                        </a>


                    @else

                        {{-- No insight --}}
                        <div class="card border-0 p-5">

                            <h3>
                                No insights available for
                                {{ $type->type }}
                            </h3>

                        </div>

                    @endif

                </div>

            @endforeach


        </div>

    </div>

</section>


<section class="mt-5 mb-5">

    <div class="container-md">

        <div class="row row-cols-1 row-cols-md-3 g-4">

            @forelse($insights as $insight)

                <div class="col">
                    <a class="text-decoration-none" href="{{route('insight.details',$insight->slug)}}">
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
                            @if($insight->type)

                                <p class="text-uppercase mb-2">

                                    <span
                                        class="d-inline-block rounded-circle me-1"
                                        style="
                                            width: 9px;
                                            height: 9px;
                                            background-color: #6197a3;
                                        "
                                    ></span>

                                    <small class="fw-semibold">
                                        {{ $insight->type->type }}
                                    </small>

                                </p>

                            @endif


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


                            {{-- Remark --}}
                            @if($insight->remark)

                                <p class="card-text">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($insight->remark),
                                        180
                                    ) }}

                                </p>

                            @endif

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

    </div>

</section>

{{--<section class="mt-5">--}}
{{--    <div class="container-md">--}}
{{--        <div class="row row-cols-1 row-cols-md-3 g-4">--}}
{{--            <div class="col">--}}
{{--                <div class="card border-0 h-100">--}}
{{--                    <img src="..." class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="text-uppercase"><box-icon type='solid' size="0.9rem" color="#6197a3"--}}
{{--                                                            name='circle'></box-icon> Public Services</p>--}}
{{--                        <h5 class="card-title">How Rwanda Is Using Data to Deliver Better Health Care</h5>--}}
{{--                        <p class="text-uppercase"><small>Commentary | 23rd July 2026</small></p>--}}
{{--                        <p class="card-text">By connecting health data across the system, Rwanda is enabling faster--}}
{{--                            decisions, shorter waits and better care.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <div class="card border-0 h-100">--}}
{{--                    <img src="..." class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="text-uppercase"><box-icon type='solid' size="0.9rem" color="#6197a3"--}}
{{--                                                            name='circle'></box-icon> Public Services</p>--}}
{{--                        <h5 class="card-title">How Rwanda Is Using Data to Deliver Better Health Care</h5>--}}
{{--                        <p class="text-uppercase"><small>Commentary | 23rd July 2026</small></p>--}}
{{--                        <p class="card-text">By connecting health data across the system, Rwanda is enabling faster--}}
{{--                            decisions, shorter waits and better care.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <div class="card border-0 h-100">--}}
{{--                    <img src="..." class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="text-uppercase"><box-icon type='solid' size="0.9rem" color="#6197a3"--}}
{{--                                                            name='circle'></box-icon> Public Services</p>--}}
{{--                        <h5 class="card-title">How Rwanda Is Using Data to Deliver Better Health Care</h5>--}}
{{--                        <p class="text-uppercase"><small>Commentary | 23rd July 2026</small></p>--}}
{{--                        <p class="card-text">By connecting health data across the system, Rwanda is enabling faster--}}
{{--                            decisions, shorter waits and better care.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <div class="card border-0 h-100">--}}
{{--                    <img src="..." class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="text-uppercase"><box-icon type='solid' size="0.9rem" color="#6197a3"--}}
{{--                                                            name='circle'></box-icon> Public Services</p>--}}
{{--                        <h5 class="card-title">How Rwanda Is Using Data to Deliver Better Health Care</h5>--}}
{{--                        <p class="text-uppercase"><small>Commentary | 23rd July 2026</small></p>--}}
{{--                        <p class="card-text">By connecting health data across the system, Rwanda is enabling faster--}}
{{--                            decisions, shorter waits and better care.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <div class="card border-0 h-100">--}}
{{--                    <img src="..." class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="text-uppercase"><box-icon type='solid' size="0.9rem" color="#6197a3"--}}
{{--                                                            name='circle'></box-icon> Public Services</p>--}}
{{--                        <h5 class="card-title">How Rwanda Is Using Data to Deliver Better Health Care</h5>--}}
{{--                        <p class="text-uppercase"><small>Commentary | 23rd July 2026</small></p>--}}
{{--                        <p class="card-text">By connecting health data across the system, Rwanda is enabling faster--}}
{{--                            decisions, shorter waits and better care.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <div class="card border-0 h-100">--}}
{{--                    <img src="..." class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="text-uppercase"><box-icon type='solid' size="0.9rem" color="#6197a3"--}}
{{--                                                            name='circle'></box-icon> Public Services</p>--}}
{{--                        <h5 class="card-title">How Rwanda Is Using Data to Deliver Better Health Care</h5>--}}
{{--                        <p class="text-uppercase"><small>Commentary | 23rd July 2026</small></p>--}}
{{--                        <p class="card-text">By connecting health data across the system, Rwanda is enabling faster--}}
{{--                            decisions, shorter waits and better care.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}



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
                <span class="ticker-text">Radical Ideas</span>

                <img src="{{ asset('images/news-letter/'.$newsLetter->image) }}"
                     class="ticker-img">
            @endforeach
            <span class="ticker-text"> {{ $newsLetter->title }}</span>

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

        const section = document.getElementById('topicSection');
        const sectionTitle = document.getElementById('sectionTitle');

        document.querySelectorAll('.nav-pills .nav-link').forEach(function (button) {

            button.addEventListener('shown.bs.tab', function () {

                const bgClass = this.getAttribute('data-bg');
                const title = this.getAttribute('data-title');

                // Remove old background classes
                section.classList.remove(
                    'bg-tech',
                    'bg-economic',
                    'bg-geopolitics',
                    'bg-politics',
                    'bg-climate',
                    'bg-public'
                );

                // Add selected background
                section.classList.add(bgClass);

                // Change title
                sectionTitle.textContent = title;

            });

        });

    });
</script>
@endsection

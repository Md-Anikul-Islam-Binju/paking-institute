
@extends('frontend.layout')

@section('content')
    <section class="vision-section py-5 bg-light text-dark mt-5" data-header-theme="light">
        <br>
        <div class="container my-4" style="max-width: 960px;">

        <!-- Search Result Header -->
        <div class="border-top border-bottom border-dark py-2 mb-4">
        <span class="text-uppercase fw-semibold text-dark"
              style="font-size: 0.85rem; letter-spacing: 0.5px;">

            {{ $insights->count() }}
            RESULTS FOR
            "{{ $query }}"
        </span>
        </div>


        <!-- Article List Container -->
        <div id="articleContainer">

            @forelse($insights as $insight)

                <div class="article-item row align-items-center py-4 border-bottom border-secondary-subtle">

                    <!-- Image -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">

                        @if($insight->cover_image)

                            <img
                                src="{{ asset('images/insight/'.$insight->cover_image) }}"
                                class="img-fluid w-100 object-fit-cover"
                                alt="{{ $insight->title }}"
                                style="height: 230px;"
                            >

                        @else

                            <img
                                src="https://via.placeholder.com/400x230"
                                class="img-fluid w-100 object-fit-cover"
                                alt="{{ $insight->title }}"
                            >

                        @endif

                    </div>


                    <!-- Content -->
                    <div class="col-12 col-md-8 ps-md-4">

                        <!-- Insight Type -->
                        <div class="d-flex align-items-center mb-2">

                            <span class="badge-dot bg-primary me-2"></span>

                            <span
                                class="text-uppercase fw-bold text-secondary"
                                style="font-size: 0.75rem; letter-spacing: 0.5px;"
                            >
                            {{ $insight->insightType->name ?? 'Insight' }}
                        </span>

                        </div>


                        <!-- Title -->
                        <h2 class="article-title display-6 fw-normal text-dark mb-3">

                            <a
                                href="{{ route('insight.details',$insight->slug) }}"
                                class="text-decoration-none text-dark"
                            >
                                {{ $insight->title }}
                            </a>

                        </h2>


                        <!-- Date -->
                        <p
                            class="text-uppercase text-muted mb-0"
                            style="font-size: 0.7rem; letter-spacing: 0.5px;"
                        >

                            {{ \Carbon\Carbon::parse($insight->date)->format('jS F Y') }}

                        </p>

                    </div>

                </div>

            @empty

                <div class="text-center py-5">

                    <h3 class="fw-normal">
                        No results found
                    </h3>

                    @if($query)
                        <p class="text-muted">
                            No insights found for "{{ $query }}"
                        </p>
                    @endif

                </div>

            @endforelse

        </div>

    </div>
    </section>

@endsection

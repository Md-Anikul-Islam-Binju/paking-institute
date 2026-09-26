@extends('frontend.layout')
@section('content')


    <section class="mt-5" data-header-theme="light">
        <br><br>
        <div class="container">
            <div class="mb-4">
                <h1 class="display-1">Media Centre</h1>
            </div>
            <div class="row d-flex flex-column flex-md-row gap-5">
                <!-- Image Column (First on mobile, second on desktop) -->
                <div class="col-md-5 order-1 order-md-2 mb-4 mb-md-0">
                    <img src="{{asset('frontend/img/test.webp')}}" alt="Media Centre" class="img-fluid rounded">
                </div>

                <!-- Text Column (Second on mobile, first on desktop) -->
                <div class="col-md-5 order-2 order-md-1">
                    <p class="fw-bold mb-3">
                        Here you’ll find Peking Institute latest press releases, statements, and insights from our team.
                    </p>
                    <p class="fw-bold mb-3">
                        If you have a media enquiry, or you would like to speak with one of our experts, please click the link below.
                    </p>

                    <button class="btn btn-outline-dark rounded-pill px-4 d-inline-flex align-items-center gap-2">
                        Get in touch <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container py-4">

            <div id="media-list">

                @foreach($media as $item)
                    <article class="border-bottom border-dark border-1 py-4 media-item">

                        <div class="d-flex align-items-center mb-1">
                            <i class="bi bi-circle-fill text-dark me-2"
                               style="font-size: 8px !important;"></i>

                            <span class="text-uppercase fw-semibold small">
                            {{ $item->category ?? 'News' }}
                        </span>
                        </div>

                        <h2 class="display-6 text-dark my-2">
                            <a href="{{route('frontend.media.details',$item->slug)}}"
                               class="text-decoration-none text-dark">
                                {{ $item->title }}
                            </a>
                        </h2>

                        <p class="text-uppercase text-secondary small mt-3 mb-0">
                            {{ $item->created_at->format('jS F Y') }}
                        </p>

                    </article>
                @endforeach

            </div>


            @if($media->count() == 10)

                <div class="text-center mt-5">
                    <button
                        type="button"
                        id="load-more"
                        class="btn btn-dark px-5 py-3">

                        Show More

                    </button>
                </div>

            @endif

            <div id="loading" class="text-center mt-4 d-none">
                <span>Loading...</span>
            </div>

        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const button = document.getElementById('load-more');
            const mediaList = document.getElementById('media-list');
            const loading = document.getElementById('loading');

            if (!button) {
                return;
            }

            let offset = 10;

            button.addEventListener('click', function () {

                button.classList.add('d-none');
                loading.classList.remove('d-none');

                fetch("{{ route('frontend.media.load-more') }}?offset=" + offset)
                    .then(response => response.json())
                    .then(result => {

                        result.data.forEach(item => {

                            const article = document.createElement('article');

                            article.className =
                                'border-bottom border-dark border-1 py-4 media-item';

                            const date = new Date(item.created_at);

                            const formattedDate = date.toLocaleDateString('en-GB', {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            });

                            article.innerHTML = `
                        <div class="d-flex align-items-center mb-1">
                            <i class="bi bi-circle-fill text-dark me-2"
                               style="font-size: 8px !important;"></i>

                            <span class="text-uppercase fw-semibold small">
                                ${item.category ?? 'News'}
                            </span>
                        </div>

                        <h2 class="display-6 text-dark my-2">
                            <a href="#"
                               class="text-decoration-none text-dark">
                                ${item.title}
                            </a>
                        </h2>

                        <p class="text-uppercase text-secondary small mt-3 mb-0">
                            ${formattedDate}
                        </p>
                    `;

                            mediaList.appendChild(article);
                        });

                        offset += result.count;

                        loading.classList.add('d-none');

                        // আর data না থাকলে button permanently hide
                        if (result.count < 10) {
                            button.remove();
                        } else {
                            button.classList.remove('d-none');
                        }

                    })
                    .catch(error => {

                        console.error(error);

                        loading.classList.add('d-none');
                        button.classList.remove('d-none');

                    });

            });

        });
    </script>


@endsection

@extends('frontend.layout')
@section('content')

    <section class="vision-section py-5 bg-white text-dark mb-5" data-header-theme="light">
        <div class="container">
            <div class="mt-5">
                <h1 class="display-1 fw-bold">
                    Experts
                </h1>
                <p class="fw-bold mt-3">
                    Our experts help governments and leaders get things done.
                    They think big, generating bold ideas and
                    <br>
                    translating them into the practical solutions and advice
                    that leaders need to drive change.
                </p>
            </div>
        </div>
    </section>



    <section class="py-1 sticky-top bg-white">
        <div class="container">
            <!-- Top Border -->
            <hr class="opacity-100 mb-4">
            <!-- Navigation -->
            <div class="d-flex flex-wrap gap-4 text-uppercase fw-semibold small mb-5">
                @foreach($categories as $category)
                    <a
                        href="#{{ $category->slug }}"
                        class="text-dark text-decoration-none"
                    >
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>




    @foreach($categories as $category)
        <section
            class="py-5 {{ $loop->first ? 'container' : '' }}"
            id="{{ $category->slug }}"
        >
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card border-0">
                            <div class="card-body">
                                <!-- Dynamic Category Name -->
                                <h1 class="fw-normal">
                                    {{ $category->name }}
                                </h1>

                                <!-- =========================
                                     STATIC DESCRIPTION
                                ========================== -->

                                @if($category->slug === 'strategic-counsellors')

                                    <p class="fs-5 text-dark">
                                        Our Strategic Counsellors provide invaluable
                                        leadership experience and insights to our global
                                        policy work.
                                    </p>

                                @elseif($category->slug === 'ai-innovation')

                                    <p class="card-text fs-5">
                                        Our AI & Innovation Team designs and equips
                                        political leaders with the tools they need to
                                        reimagine the state.
                                    </p>

                                @elseif($category->slug === 'global-affairs')

                                    <p class="card-text fs-5">
                                        Our Global Affairs Team helps leaders turn bold
                                        ideas into real-world impact, connecting policy,
                                        politics and global influence to get big things done.
                                    </p>

                                @elseif($category->slug === 'government-advisory')

                                    <p class="card-text fs-5">
                                        Our Government Advisory Team works
                                        shoulder-to-shoulder with governments and leaders
                                        to transform political vision into tangible impact.
                                    </p>

                                @elseif($category->slug === 'insight-authors')

                                    <p class="card-text fs-5">
                                        Our Insight Authors generate bold ideas and practical
                                        solutions to help leaders tackle the world’s most
                                        pressing challenges and deliver for their people.
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>


                    <!-- =========================
                         DYNAMIC EXPERTS
                    ========================== -->

                    @foreach($category->managementBoards as $expert)

                        <div class="col">
                            <a class="text-decoration-none" href="{{route('expert.details',$expert->slug)}}">
                                <div class="card border-0 h-100">

                                    <!-- Expert Image -->
                                    @if($expert->image)

                                        <img
                                            src="{{ asset('images/management/'.$expert->image) }}"
                                            class="card-img-top img-fluid h-[30rem]"
                                            alt="{{ $expert->name }}"
                                        >

                                    @endif


                                    <!-- Expert Information -->
                                    <div class="card-body px-0">

                                        <!-- Expert Name -->
                                        <h2 class="fw-normal">
                                            {{ $expert->name }}
                                        </h2>


                                        <!-- Expert Designation -->
                                        <p class="card-text">
                                            {{ $expert->designation }}
                                        </p>

                                    </div>

                                </div>
                            </a>
                        </div>

                    @endforeach

                </div>


                <!-- =========================
                     SEE MORE
                ========================== -->

                @if($category->managementBoards->count() > 5)

                    <div class="text-center mt-4">

                        <a
                            href="#"
                            class="btn btn-outline-dark px-4 py-2 rounded-pill"
                        >
                            See More

                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>

                    </div>

                @endif


                <!-- Bottom Border -->
                <hr class="opacity-100 mt-5">

            </div>

        </section>

    @endforeach

@endsection


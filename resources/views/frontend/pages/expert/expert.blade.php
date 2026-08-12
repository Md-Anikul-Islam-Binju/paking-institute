{{--@extends('frontend.layout')--}}
{{--@section('content')--}}


{{--    <!-- ABOUT US -->--}}
{{--    <section class="vision-section py-5 bg-white text-dark mb-5">--}}
{{--        <div class="container ">--}}
{{--            <div class="mt-2">--}}
{{--                <h1 class="display-1 fw-bold">Experts</h1>--}}
{{--                <p class=" fw-bold mt-3"> Our experts help governments and leaders get things done. They think big, generating--}}
{{--                    bold ideas and <br> translating them into the practical solutions and advice that leaders need to drive--}}
{{--                    change.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}



{{--    <section class="py-1 sticky-top bg-white">--}}
{{--        <div class="container">--}}
{{--            <!-- Top Border -->--}}
{{--            <hr class="opacity-100 mb-4">--}}
{{--            <!-- Navigation -->--}}
{{--            <div class="d-flex flex-wrap gap-4 text-uppercase fw-semibold small mb-5 fw-bold">--}}
{{--                <a href="#" class="text-dark text-decoration-none">Strategic Counsellors</a>--}}
{{--                <a href="#ai & innovation" class="text-dark text-decoration-none">AI & Innovation</a>--}}
{{--                <a href="#global affairs" class="text-dark text-decoration-none">Global Affairs</a>--}}
{{--                <a href="#government advisory" class="text-dark text-decoration-none">Government Advisory</a>--}}
{{--                <a href="#insight authors" class="text-dark text-decoration-none">Insight Authors</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="py-1 sticky-top bg-white">--}}
{{--        <div class="container">--}}

{{--            <hr class="opacity-100 mb-4">--}}

{{--            <div class="d-flex flex-wrap gap-4 text-uppercase fw-semibold small mb-5">--}}

{{--                @foreach($categories as $category)--}}

{{--                    <a href="#{{ $category->slug }}"--}}
{{--                       class="text-dark text-decoration-none">--}}

{{--                        {{ $category->name }}--}}

{{--                    </a>--}}

{{--                @endforeach--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="container py-5">--}}
{{--        <!-- Content -->--}}
{{--        <div class="row gy-5">--}}

{{--            <!-- Left Content -->--}}
{{--            <div class="col-lg-4">--}}

{{--                <h1 class="display-6 fw-normal mb-4">--}}
{{--                    Strategic Counsellors--}}
{{--                </h1>--}}

{{--                <p class="fs-5 text-dark">--}}
{{--                    Our Strategic Counsellors provide invaluable--}}
{{--                    leadership experience and insights to our global--}}
{{--                    policy work.--}}
{{--                </p>--}}

{{--            </div>--}}

{{--            <!-- Person 1 -->--}}
{{--            <div class="col-lg-4">--}}
{{--                <a href="" class="text-decoration-none text-dark">--}}
{{--                    <img src="img/Sanna_Marin.png" class="img-fluid w-100" alt="">--}}

{{--                    <h2 class="h2 fw-normal mt-4 mb-2">--}}
{{--                        Sanna Marin--}}
{{--                    </h2>--}}

{{--                    <p class="text-uppercase small text-secondary mb-0">--}}
{{--                        TBI Strategic Counsellor & Former Prime Minister--}}
{{--                    </p>--}}

{{--                    <p class="text-uppercase small text-secondary">--}}
{{--                        of Finland--}}
{{--                    </p>--}}
{{--                </a>--}}

{{--            </div>--}}

{{--            <!-- Person 2 -->--}}
{{--            <div class="col-lg-4 ">--}}

{{--                <a href="" class="text-decoration-none text-dark">--}}
{{--                    <img src="img/Matteo_Renzi.png" class="img-fluid w-100" alt="">--}}

{{--                    <h2 class="h2 fw-normal mt-4 mb-2">--}}
{{--                        Matteo Renzi--}}
{{--                    </h2>--}}

{{--                    <p class="text-uppercase small  text-secondary mb-0">--}}
{{--                        TBI Strategic Counsellor & Former Prime Minister--}}
{{--                    </p>--}}

{{--                    <p class="text-uppercase small text-secondary">--}}
{{--                        of Italy--}}
{{--                    </p>--}}

{{--                </a>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- Bottom Border -->--}}
{{--        <hr class="opacity-100 mt-5">--}}
{{--    </section>--}}

{{--    <section class="mt-5" id="ai & innovation">--}}
{{--        <div class="container">--}}
{{--            <div class="row row-cols-2 row-cols-md-3 g-4 ">--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <div class="card-body">--}}
{{--                            <h1 class="fw-normal">AI & Innovation</h1>--}}
{{--                            <p class="card-text fs-5">--}}
{{--                                Our AI & Innovation Team designs and equips political leaders with the tools they need to reimagine the--}}
{{--                                state.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Matteo_Renzi.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Laura Gilbert</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Senior Director, AI & Innovation--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Sanna_Marin.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Benedict Macon-Cooney</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Chief AI & Innovation Officer--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Matteo_Renzi.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Barbara-Chiara Ubaldi</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Senior Director, Client Engagement & Delivery--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Sanna_Marin.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Ott Velsberg</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Client Engagement & Delivery Lead on Data--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- Bottom Border -->--}}
{{--            <hr class="opacity-100 mt-5">--}}

{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="py-5" id="global affairs">--}}
{{--        <div class="container">--}}
{{--            <div class="row row-cols-2 row-cols-md-3 g-4">--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <div class="card-body">--}}
{{--                            <h1 class="fw-normal">Global Affairs</h1>--}}
{{--                            <p class="card-text fs-5">--}}
{{--                                Our Global Affairs Team helps leaders turn bold ideas into real-world impact, connecting policy, politics and global influence to get big things done.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Matteo_Renzi.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Laura Gilbert</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Senior Director, AI & Innovation--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Sanna_Marin.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Benedict Macon-Cooney</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Chief AI & Innovation Officer--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Matteo_Renzi.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Barbara-Chiara Ubaldi</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Senior Director, Client Engagement & Delivery--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Sanna_Marin.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Ott Velsberg</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Client Engagement & Delivery Lead on Data--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- See More Button -->--}}
{{--            <div class="text-center mt-4">--}}
{{--                <a href="#" class="btn btn-outline-dark px-4 py-2 rounded-pill">--}}
{{--                    See More--}}
{{--                    <i class="bi bi-arrow-right ms-2"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <!-- Bottom Border -->--}}
{{--            <hr class="opacity-100 mt-5">--}}

{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="py-5" id="government advisory">--}}
{{--        <div class="container">--}}
{{--            <div class="row row-cols-2 row-cols-md-3 g-4">--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <div class="card-body">--}}
{{--                            <h1 class="fw-normal">Government Advisory</h1>--}}
{{--                            <p class="card-text fs-5">--}}
{{--                                Our Government Advisory Team works shoulder-to-shoulder with governments and leaders to transform political vision into tangible impact.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Matteo_Renzi.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Laura Gilbert</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Senior Director, AI & Innovation--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Sanna_Marin.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Benedict Macon-Cooney</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Chief AI & Innovation Officer--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Matteo_Renzi.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Barbara-Chiara Ubaldi</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Senior Director, Client Engagement & Delivery--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Sanna_Marin.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Ott Velsberg</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Client Engagement & Delivery Lead on Data--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- See More Button -->--}}
{{--            <div class="text-center mt-4">--}}
{{--                <a href="#" class="btn btn-outline-dark px-4 py-2 rounded-pill">--}}
{{--                    See More--}}
{{--                    <i class="bi bi-arrow-right ms-2"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <!-- Bottom Border -->--}}
{{--            <hr class="opacity-100 mt-5">--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="py-5" id="insight authors">--}}
{{--        <div class="container">--}}
{{--            <div class="row row-cols-2 row-cols-md-3 g-4">--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <div class="card-body">--}}
{{--                            <h1 class="fw-normal">Insight Authors</h1>--}}
{{--                            <p class="card-text fs-5">--}}
{{--                                Our Insight Authors generate bold ideas and practical solutions to help leaders tackle the world’s most pressing challenges and deliver for their people.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Matteo_Renzi.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Laura Gilbert</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Senior Director, AI & Innovation--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Sanna_Marin.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Benedict Macon-Cooney</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Chief AI & Innovation Officer--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Matteo_Renzi.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Barbara-Chiara Ubaldi</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Senior Director, Client Engagement & Delivery--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <div class="card border-0">--}}
{{--                        <img src="img/Sanna_Marin.png" class="card-img-top" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="fw-normal">Ott Velsberg</h2>--}}
{{--                            <p class="card-text">--}}
{{--                                Client Engagement & Delivery Lead on Data--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <!-- See More Button -->--}}
{{--            <div class="text-center mt-4">--}}
{{--                <a href="#" class="btn btn-outline-dark px-4 py-2 rounded-pill">--}}
{{--                    See More--}}
{{--                    <i class="bi bi-arrow-right ms-2"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <!-- Bottom Border -->--}}
{{--            <hr class="opacity-100 mt-5">--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}



@extends('frontend.layout')
@section('content')

    <section class="vision-section py-5 bg-white text-dark mb-5">
        <div class="container">
            <div class="mt-2">
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
                <div class="row row-cols-2 row-cols-md-3 g-4">
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

                            <div class="card border-0 h-100">

                                <!-- Expert Image -->
                                @if($expert->image)

                                    <img
                                        src="{{ asset('images/management/'.$expert->image) }}"
                                        class="card-img-top img-fluid"
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


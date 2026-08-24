@extends('frontend.layout')
@section('content')



    @if($keyBenefitInvolved->id == 3)
        <style>
            .c-carousel-wrapper {
                overflow: hidden;
                padding-top: 30px;
                position: relative;
            }

            .c-carousel-inner {
                display: flex;
                justify-content: center;
                align-items: center;
                transition: transform 0.5s ease-in-out;
            }

            .sl-card {
                flex: 0 0 78%;
                padding: 0 3px;
                transition: transform 0.5s ease, opacity 0.5s ease;
                opacity: 0.45;
                transform: scale(0.95);
            }

            .sl-card.active {
                opacity: 1;
                transform: scale(1);
            }

            .sl-card img {
                width: 100%;
                height: 25rem; /* Reduced default fixed height for smaller views */
                object-fit: cover;
                border-radius: 4px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            }



            /* Bottom Divider Line */
            .sl-divider {
                border: 0;
                border-top: 1px solid #e0e0e0;
                margin: 25px 0 20px 0;
                opacity: 1;
            }

            /* Controls Container at Bottom Right */
            .controls-container {
                display: flex;
                justify-content: flex-end;
                gap: 12px;
                padding-right: 15px;
            }

            /* Minimalist Circle Buttons */
            .btn-control {
                width: 42px;
                height: 42px;
                background-color: transparent;
                color: #333;
                border: 1px solid #333;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                font-size: 16px;
                transition: all 0.2s ease;
            }

            .btn-control:hover {
                background-color: #333;
                color: #fff;
            }

            /* Responsive height adjustments */
            @media (max-width: 768px) {
                .sl-card {
                    flex: 0 0 85%; /* Slightly wider card for mobile balance */
                }

                .sl-card img {
                    height: 250px; /* Adjust height specifically for mobile screens */
                }
            }

            @media (min-width: 992px) {
                .sl-card img {
                    height: 50rem; /* Taller height retained for desktop screens */
                }
            }
        </style>
        <!-- Delivering change -->
        <section class="mb-5 py-5 bg-white" data-header-theme="light">
            <div class="container">
                <br>
                <div class="mt-5">
                    <p class="fw-bold mb-5 text-uppercase tracking-wider">Delivering change</p>
                    <div class="row align-items-start">
                        <div class="col-md-6 pe-md-5">
                            <h1 class="mb-4 display-1 font-serif fw-normal">
                                {{$keyBenefitInvolved->title}}
                            </h1>
                            <p class="text-secondary fs-6 lh-base">
                                Rwanda has powerful ambitions to harness technology to improve lives but there is a problem: people in remote regions have no way to get online.
                            </p>
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <img src="{{ asset('images/key-benefit/'.$keyBenefitInvolved->image) }}" alt="Smiling professional at global networking event"
                                 class="img-fluid w-100 object-fit-cover h-100">
                        </div>
                    </div>
                </div>
            </div>
        </section>



        @php
            $videoUrl = $keyBenefitInvolved->videos ?? null;

            $embedUrl = null;

            if ($videoUrl) {
                preg_match(
                    '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\?\/]+)/',
                    $videoUrl,
                    $matches
                );

                if (!empty($matches[1])) {
                    $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                }
            }
        @endphp

        @if($embedUrl)
            <section class="py-5">
                <div class="container">

                    <div class="video-wrapper overflow-hidden rounded shadow position-relative">

                        <div class="ratio ratio-16x9">
                            <iframe
                                src="{{ $embedUrl }}"
                                title="{{ $keyBenefitInvolved->title }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>

                    </div>

                </div>
            </section>
        @endif



        <!-- SECTION 1: THE RWANDA CASE STUDY -->
        <section class="container">
            <h1  class="mb-3">The Connectivity Challenge</h1>
            <p>
                For the past 15 years, Rwanda has pursued an ambitious digital-transformation agenda – yet remote areas
                remained offline, limiting access to education, health care and economic growth. Expanding broadband
                connectivity was a major challenge; fibre was expensive, difficult to roll out and impractical for Rwanda’s
                geography. Without a scalable solution, the digital divide threatened to stall national progress.
            </p>
            <p>
                To address this, the Reimagined State Accelerator for Connectivity brought together the Rwandan government
                and satellite-internet provider Starlink to create a sustainable connectivity model. By applying targeted
                technological solutions to national priorities, TBI has helped expand digital access to education and health
                care. This approach now informs efforts in other countries seeking similar results.
            </p>

            <h1>Lessons in Scale: From Pilot Initiative to National Strategy</h1>
            <p>
                This work in Rwanda shows how a coordinated effort can turn a pilot initiative into a national strategy.
                What began as a project to connect 50 schools – providing 20,000+ students with access to digital learning
                resources – has expanded to 40 health centres, enabling telemedicine, clinician training and improved
                patient care. The government of Rwanda continues to provide internet services in all 90 sites and is using
                this model to plan for further expansion.
            </p>
            <p>
                Minister of ICT and Innovation Paula Ingabire highlighted the significance of this progress:
            </p>
            <blockquote>
                “The partnership with TBI has been instrumental in bridging the digital divide in our country. The
                connectivity provided has transformed the educational landscape in remote regions, enabling thousands of
                students to access digital learning resources.”
            </blockquote>
            <p>
                Rwanda’s experience provides a blueprint for other countries, demonstrating how connectivity can be
                integrated into public infrastructure and scaled effectively.
            </p>
        </section>

        <!--sl sction -->
        <div class=" my-5 c-carousel-wrapper">
            <!-- sl Track -->
            <div class="c-carousel-inner " id="slTrack">

                <div class="sl-card ">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80"
                         alt="Meeting 1">
                </div>

                <div class="sl-card active ">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1200&q=80"
                         alt="Meeting 2">
                </div>

                <div class="sl-card ">
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1200&q=80"
                         alt="Meeting 3">
                </div>

            </div>

            <!-- Divider Line -->
            <div class="container">
                <hr class="sl-divider">

                <!-- Bottom Right Navigation Buttons -->
                <div class="controls-container">
                    <button class="btn-control" id="prevBtn" aria-label="Previous">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <button class="btn-control" id="nextBtn" aria-label="Next">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- SECTION 2: GLOBAL EXPANSION AND IMPACT -->
        <section id="global-impact" class="container">
            <h2>A Global Blueprint for Lasting Impact</h2>
            <p>
                Inspired by the success in Rwanda, TBI has supported multiple governments in embedding satellite and
                alternative connectivity solutions to improve education, health care and public-service delivery. These
                initiatives demonstrate what is possible when technology is applied to national challenges.
            </p>

            <h3>Malawi: Crisis Response and National Scaling</h3>
            <p>Through Starlink’s technology solutions, the Reimagined State Accelerator:</p>
            <ul>
                <li>Restored connectivity for 600,000 displaced people in the aftermath of Cyclone Freddy, supporting crisis
                    response and rebuilding efforts.</li>
                <li>Brought 22 schools and health-care sites online in less than two months, enhancing emergency medical
                    response and education access.</li>
            </ul>

            <h3>Zambia: Bringing E-Government Closer to Citizens</h3>
            <ul>
                <li>Launched a network of digital service centres, enabling citizens across Zambia to access government
                    services more efficiently and reducing reliance on paper-based systems.</li>
                <li>Modernised the national postal system through improved digital infrastructure, enhancing public-service
                    delivery and establishing a foundation for broader e-government transformation.</li>
            </ul>

            <h3>Indonesia: Pioneering Digital Infrastructure in a New Capital</h3>
            <ul>
                <li>Connected seven public amenities in Nusantara, Indonesia’s new capital city, through a
                    satellite-internet pilot with Starlink.</li>
                <li>Enabled nationwide licensing, laying the groundwork to reach 1.2 million people by 2029.</li>
                <li>Positioned Nusantara as a future hub of research, sustainability and digital innovation.</li>
            </ul>
        </section>

        <!-- Create with us -->
        <section class="py-5 text-dark bg-white">
            <div class="container py-4">
                <div class="row g-4">

                    <!-- Left Column: Badge / Label -->
                    <div class="col-md-3">
                        <h6 class=" text-dark-emphasis text-uppercase ">
                            Create with us
                        </h6>
                    </div>

                    <!-- Right Column: Links List -->
                    <div class="col-md-9">
                        <div class="d-flex flex-column">

                            <!-- Item 1 -->
                            <a href="Delivering-change.html"
                               class="d-flex justify-content-between align-items-center text-black text-decoration-none py-4 border-bottom border-secondary">
                                <span class="display-5 font-serif">Turn bold ideas into reality</span>
                                <i class="bi bi-arrow-right fs-4"></i>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script>
            const track = document.getElementById('slTrack');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            function updateActiveState() {
                const cards = track.querySelectorAll('.sl-card');
                cards.forEach(card => card.classList.remove('active'));
                cards[1].classList.add('active');
            }

            nextBtn.addEventListener('click', () => {
                const firstCard = track.firstElementChild;
                track.appendChild(firstCard);
                updateActiveState();
            });

            prevBtn.addEventListener('click', () => {
                const lastCard = track.lastElementChild;
                track.insertBefore(lastCard, track.firstElementChild);
                updateActiveState();
            });
        </script>


    @elseif($keyBenefitInvolved->id == 6)

        <!-- Delivering change -->
        <section class="mb-5 py-5 bg-white" data-header-theam="white">
            <div class="container">
                <br>
                <div class="mt-5">
                    <p class="fw-bold mb-5 text-uppercase tracking-wider">Delivering change</p>
                    <div class="row align-items-start">
                        <div class="col-md-6 pe-md-5">
                            <h1 class="mb-4 display-1 font-serif fw-normal">
                                {{$keyBenefitInvolved->title}}
                            </h1>
                            <p class="text-secondary fs-6 lh-base">
                                Technology presents a major opportunity, but for countries to harness its potential, public
                                services need to be ready for it.
                            </p>
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <img src="{{ asset('images/key-benefit/'.$keyBenefitInvolved->image) }}" alt="Smiling professional at global networking event"
                                 class="img-fluid w-100 object-fit-cover h-100">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 1: THE RWANDA CASE STUDY -->
        <section class="container">
            <h1 class="mb-4">The Climate-Adaptation Challenge</h1>
            <p class="h5 md:w-[75%]">
                Climate change is no longer a distant threat; it’s a daily governance challenge. From extreme weather to
                crop failure, governments are being pushed to act faster, smarter and more decisively. But many still don’t
                have access to the tools, insights and data they need to plan, prepare and respond effectively. The
                Reimagined State Accelerator for Climate and Agriculture is our platform for addressing this.
                <br><br>
                By connecting governments with cutting-edge technology partners, the Accelerator enables climate-vulnerable
                countries to bring innovative solutions for everything from disaster response to agricultural policy
                directly into their core public systems.
                <br><br>
                That’s climate adaptation, reimagined.
            </p>
        </section>



        <section class="bg-light py-5">
            <div class="container">
                <div class="row align-items-center mt-5 mb-5">

                    <div class="col-12 col-md-3 text-center text-md-start mb-4 mb-md-0">
                        <h6 class="fw-bold text-uppercase tracking-wide m-0 text-dark">
                            Our Partners
                        </h6>
                    </div>

                    <div class="col-12 col-md-9">
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-start gap-3">

                            <div class="bg-secondary-subtle d-flex align-items-center justify-content-center p-3 rounded">
                                <img src="{{URL::to('frontend/img/amini.png')}}" alt="Amini Logo"
                                     class="img-fluid object-fit-cover md:h-[6rem] md:w-[7rem]">
                            </div>

                            <div class="bg-secondary-subtle d-flex align-items-center justify-content-center p-3 rounded">
                                <img src="{{URL::to('frontend/img/thinking.png')}}" alt="Thinking Machines Logo"
                                     class="img-fluid object-fit-cover md:h-[6rem] md:w-[13rem]">
                            </div>

                            <div class="bg-secondary-subtle d-flex align-items-center justify-content-center p-3 rounded">
                                <img src="{{URL::to('frontend/img/planet.png')}}" class="img-fluid object-fit-cover md:h-[6rem] md:w-[13rem]">
                            </div>

                            <div class="bg-secondary-subtle d-flex align-items-center justify-content-center p-3 rounded">
                                <img src="{{URL::to('frontend/img/oracle.png')}}" alt="Oracle Logo"
                                     class="img-fluid object-fit-cover object-fit-cover md:h-[6rem] md:w-[15rem]">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- SECTION 2: A Multi-Partner Model -->
        <section class="container mt-5">
            <h1 class="mb-4">A Multi-Partner Model</h1>
            <div class="h5 md:w-[75%]">
                <p>
                    The Reimagined State Accelerator for Climate and Agriculture brings together a growing coalition of
                    governments and technology partners, each working together to solve real-world public challenges such as
                    disaster response and sustainable agriculture. This work goes beyond tech pilots. The Accelerator embeds
                    practical tools into public systems and accelerates learning and improvement for scaled adoption across
                    countries. Our current partners include:
                </p>
                <ul>
                    <li>
                        <strong>Planet:</strong>
                        Provides Earth-observation data to help governments monitor climate risks, manage natural resources
                        and respond to disasters in real time. Its data are now integrated into the core planning and
                        emergency-response systems of places such as Zanzibar, Sierra Leone and the Philippines.
                    </li>
                    <li>
                        <strong>Thinking Machines:</strong>
                        Uses advanced data science and AI modelling to support governments. For instance, in the
                        Philippines, Thinking Machines is working alongside Planet and TBI to co-develop models that predict
                        landslide and flood risk, enabling government agencies to plan ahead and respond more effectively to
                        climate-driven disasters.
                    </li>
                    <li>
                        <strong>Amini:</strong>
                        Partners with TBI and governments to apply AI-powered insights for improving agricultural
                        productivity, climate monitoring and food-system resilience, starting with a national-scale
                        initiative in Sierra Leone.
                    </li>
                    <li>
                        <strong>Oracle:</strong>
                        Provides the Agriculture Intelligence platform, which combines relevant open, proprietary and
                        government-owned data into a solution to empower governments with a unified, authoritative source of
                        truth. Oracle and TBI use Agriculture Intelligence to deliver a holistic view of the critical
                        drivers of agricultural productivity – both present and future – to equip leaders with reliable,
                        timely data and advanced predictive analytics. This enables more effective decision-making to help
                        address challenges with precision and foresight and build resilient food systems.
                    </li>
                </ul>
                <br>
                <p>
                    These collaborations are already helping governments put innovation into action – from predictive
                    disaster models to AI-driven food systems.
                </p>
                <br>
                <p>
                    By connecting governments with cutting-edge technology partners, the Accelerator enables
                    climate-vulnerable countries to bring innovative solutions for everything from disaster response to
                    agricultural policy directly into their core public systems.
                </p>
                <br>
                <p>
                    That’s climate adaptation, reimagined.
                </p>
            </div>
        </section>



        @php
            $videoUrl = $keyBenefitInvolved->videos ?? null;

            $embedUrl = null;

            if ($videoUrl) {
                preg_match(
                    '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\?\/]+)/',
                    $videoUrl,
                    $matches
                );

                if (!empty($matches[1])) {
                    $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                }
            }
        @endphp

        @if($embedUrl)
            <section class="py-5">
                <div class="container">

                    <div class="video-wrapper overflow-hidden rounded shadow position-relative">

                        <div class="ratio ratio-16x9">
                            <iframe
                                src="{{ $embedUrl }}"
                                title="{{ $keyBenefitInvolved->title }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>

                    </div>

                </div>
            </section>
        @endif

        <!-- SECTION 1: THE RWANDA CASE STUDY -->
        <section class="container">
            <div class="mb-5">
                <h1 class="mb-5">Turning Satellite Insights Into Action in Zanzibar</h1>
                <p class="h5">
                    In 2023, Zanzibar and TBI launched a pioneering partnership with Planet to bring the power of satellite
                    imagery into government decision-making. Through the Reimagined State Accelerator for Climate and
                    Agriculture, Zanzibar’s government became one of the first in East Africa to embed geospatial data in
                    the heart of public-service delivery.
                    <br><br>
                    Over the course of the pilot, more than ten ministries, departments and agencies began using Planet’s
                    imagery to monitor forests, manage fisheries and track coastal erosion in near real time.
                    <br><br>
                    It wasn’t just the technology that made this initiative successful; it was the approach. From
                    co-designing local use cases and delivering technical training to embedding geographic information
                    system (GIS) tools into everyday workflows, TBI provided tailored support across every step of the
                    journey.
                    <br><br>
                    Now extended into a multi-year programme, Zanzibar is scaling its use of satellite data across sectors,
                    integrating geospatial insights into planning, infrastructure and environmental policy, and setting out
                    a blueprint for other governments to follow.
                </p>
            </div>
            <div class="mb-5">
                <h1>AI That Secures Crops and Futures</h1>
                <p class="h5">
                    Global food security is increasingly under threat – disrupted not only by climate change, but also by
                    supply shocks and outdated agricultural systems. In response, governments are seeking out smart,
                    data-driven ways to protect crops, improve yields and reduce reliance on imports.
                    <br><br>
                    In Sierra Leone, TBI and Amini have partnered under the government’s Feed Salone strategy to co-create
                    an AI-powered solution that delivers real-time crop monitoring and predictive insights. This work
                    combines geospatial data, advanced climate modelling and AI-driven diagnostics to help inform government
                    decision-making around rice production, a key national priority.
                    <br><br>
                    By embedding this technology into public systems, the project not only supports food security today, but
                    also lays the foundation for a scalable, sustainable model that can be applied across the continent.
                    That’s agricultural transformation powered by innovation: protecting crops, and the people who depend on
                    them.
                </p>
            </div>
            <div class="mb-5">
                <h1>Scaling the Impact</h1>
                <p class="h5">
                    The Reimagined State Accelerator for Climate and Agriculture explores what is possible when technology
                    and government work in lockstep. By co-creating, testing and scaling digital solutions, the Accelerator
                    is helping countries move from reactive crisis response to proactive climate adaptation. These
                    satellite-data and predictive-analytics tools are forming the backbone of a more resilient state.
                </p>
            </div>
        </section>

        <!-- Create with us -->
        <section class="py-5 text-dark bg-white">
            <div class="container py-4">
                <div class="row g-4">

                    <!-- Left Column: Badge / Label -->
                    <div class="col-md-3">
                        <h6 class=" text-dark-emphasis text-uppercase ">
                            Create with us
                        </h6>
                    </div>

                    <!-- Right Column: Links List -->
                    <div class="col-md-9">
                        <div class="d-flex flex-column">

                            <!-- Item 1 -->
                            <a href="Delivering-change.html"
                               class="d-flex justify-content-between align-items-center text-black text-decoration-none py-4 border-bottom border-secondary">
                                <span class="display-5 font-serif">Turn bold ideas into reality</span>
                                <i class="bi bi-arrow-right fs-4"></i>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    @endif

@endsection

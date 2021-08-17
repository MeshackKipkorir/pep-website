@extends('layout')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <!-- <p class="animate__animated animate__fadeInDown">Welcome to</p> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <img src="/assets/img/cck-logo.png" width="150px">
                            </div>
                        </div>
                    </div>
                    <h2 class="animate__animated fanimate__adeInUp">Chama Cha Kazi</h2>
                    <p class="animate__animated animate__fadeInDown">Kazi Na Pesa</p>
                    <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <p class="animate__animated animate__fadeInDown">Representing</p>
                    <h2 class="animate__animated animate__fadeInUp"> A voice to the voiceless.</h2>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <p class="animate__animated animate__fadeInDown">Empowerment Of</p>
                    <h2 class="animate__animated animate__fadeInUp">Politically Marginalized.</h2>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="#ed1f24">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="#fff">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#3851a3">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>About</h2>
                    <p>CHAMA CHA KAZI</p>
                </div>

                <div class="row content" data-aos="fade-up">
                    <div class="col-lg-6">
                        <div class="section-title" data-aos="zoom-out">
                            <h2>Our Party</h2>
                        </div>
                        <p>
                            To provide the country with participatory governance where home
                            grown solutions on matters affecting the community are encouraged.

                        </p>
                        <!-- <ul>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat
                            </li>
                            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate
                                velit</li>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat
                            </li>
                        </ul> -->
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <div class="section-title" data-aos="zoom-out">
                            <h2>Our Vision</h2>
                        </div>
                        <p>
                            To become a political tool for empowerment of <br>
                            politically marginalized and voice of the voiceless<br>
                            in the highly competitive political world
                        </p>
                        <!-- <a href="#" class="btn-learn-more">Learn More</a> -->
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container">

                <div class="row" data-aos="zoom-out">
                    <div class="col-lg-9 text-center text-lg-left">
                        <h3>Join Chama Cha Kazi Party</h3>
                        <!-- <p>Join People's Empowerment Party</p> -->
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="{{url('aspirant_registrations')}}">Register As An
                            Aspirant</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!--Our offices-->
        <section>
            <div class="container">
                <div class="section-title" data-aos="zoom-out">
                    <h2>Our Offices</h2>
                </div>

                <div class="row blog">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators" style="position: relative !important;top:342px !important;">
                                <li data-target="#blogCarousel" data-slide-to="0" class="active" style="background-color:#000000;"></li>
                                <li data-target="#blogCarousel" data-slide-to="1" style="background-color:#000000;"></li>
                                <li data-target="#blogCarousel" data-slide-to="2" style="background-color:#000000;"></li>
                                <li data-target="#blogCarousel" data-slide-to="3" style="background-color:#000000;"></li>
                                <li data-target="#blogCarousel" data-slide-to="4" style="background-color:#000000;"></li>
                                <li data-target="#blogCarousel" data-slide-to="5" style="background-color:#000000;"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/bungoma_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Kaduyi kibabii university road</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/embu_office.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Embu-Meru highway, Gakwegori </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/kakamega_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Shimco plaza Kakamega town</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/kiambu_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> NairobiView Plaza, along Thika Road</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/kilifi_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Along Kenya Cereal Board Road</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/kisii_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Bobaracho Ward, on the highway to Kisii town</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/kitui_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> B.I.T junction</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/kwale_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Ukunda</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/laikipia_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Shepherd Area , Nyahururu</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/machakos_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> 1196 along Mbolu Mali Rd</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/makueni_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Wote town Ebony House</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/meru_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Opposite Meru Police Station</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/mombasa_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Kongowea Market Swahili building</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/muranga_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Waguta Plaza Murang’a town</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/nakuru_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Nakuru- Eldoret highway at Golden Life Mall</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/narok_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Suleiman house, Narok Town</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/nyamira_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Nyansiongo ward,Kijauri town</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/nyandarua_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;"
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Ol kalou Nyahururu road, chemba hospital</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/nyeri_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Mukima house,2nd floor,office no 10</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/taita_taveta.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Near Equity bank, Voi Town</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/tharaka_nithi_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Kathwana town near slaughter house</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/trans_nzoia_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p>  kitale town behind Mega centre Makasembo Rd</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/uasingishu_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Huruma, Corner stage</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <img src="{{asset('assets/offices_images/vihiga_county.jpeg')}}" alt="Image" style="width: 250px;height:250px;">
                                            </a>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p> Vihiga Sub county Mbale town</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

                            </div>
                            <!--.carousel-inner-->
                        </div>
                        <!--.Carousel-->
                    </div>
                </div>



            </div>
        </section>

        <!-- ======= Services Section ======= -->
        <!-- <section id="services" class="services">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Services</h2>
                    <p>What we do offer</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="zoom-in-left">
                            <div class="icon"><i class="las la-basketball-ball" style="color: #ff689b;"></i></div>
                            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate non provident</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                            <div class="icon"><i class="las la-book" style="color: #e9bf06;"></i></div>
                            <h4 class="title"><a href="">Dolor Sitema</a></h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat tarad limino ata</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
                        <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                            <div class="icon"><i class="las la-file-alt" style="color: #3fcdc7;"></i></div>
                            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                dolore eu fugiat nulla pariatur</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                            <div class="icon"><i class="las la-tachometer-alt" style="color:#41cf2e;"></i></div>
                            <h4 class="title"><a href="">Magni Dolores</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
                            <div class="icon"><i class="las la-globe-americas" style="color: #d6ff22;"></i></div>
                            <h4 class="title"><a href="">Nemo Enim</a></h4>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                praesentium voluptatum deleniti atque</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
                            <div class="icon"><i class="las la-clock" style="color: #4680ff;"></i></div>
                            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                                tempore, cum soluta nobis est eligendi</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <!-- <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Portfolio</h2>
                    <p>What we've done</p>
                </div>

                <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>

                <div class="row portfolio-container" data-aos="fade-up">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery"
                                class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery"
                                class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery"
                                class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery"
                                class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery"
                                class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                            <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery"
                                class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery"
                                class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                            <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery"
                                class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery"
                                class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </section>End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <!-- <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Testimonials</h2>
                    <p>What they are saying about us</p>
                </div>

                <div class="owl-carousel testimonials-carousel" data-aos="fade-up">

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.
                            Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram
                            malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis
                            minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim
                            velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum
                            veniam.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim
                            culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum
                            quid.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                    </div>

                </div>

            </div>
        </section>End Testimonials Section -->

        <!-- ======= Pricing Section ======= -->
        <!-- <section id="pricing" class="pricing">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Pricing</h2>
                    <p>Our Competing Prices</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="box" data-aos="zoom-in">
                            <h3>Free</h3>
                            <h4><sup>$</sup>0<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li class="na">Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
                            <h3>Business</h3>
                            <h4><sup>$</sup>19<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="200">
                            <h3>Developer</h3>
                            <h4><sup>$</sup>29<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="300">
                            <span class="advanced">Advanced</span>
                            <h3>Ultimate</h3>
                            <h4><sup>$</sup>49<span> / month</span></h4>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <!-- <section id="faq" class="faq">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>F.A.Q</h2>
                    <p>Frequently Asked Questions</p>
                </div>

                <ul class="faq-list">

                    <li data-aos="fade-up" data-aos-delay="100">
                        <a data-toggle="collapse" class="" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i
                                class="icofont-simple-up"></i></a>
                        <div id="faq1" class="collapse show" data-parent=".faq-list">
                            <p>
                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                                curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="200">
                        <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc
                            faucibus a pellentesque? <i class="icofont-simple-up"></i></a>
                        <div id="faq2" class="collapse" data-parent=".faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                                laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                                Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa
                                tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="300">
                        <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit
                            pellentesque habitant morbi? <i class="icofont-simple-up"></i></a>
                        <div id="faq3" class="collapse" data-parent=".faq-list">
                            <p>
                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar
                                elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus
                                pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at
                                elementum eu facilisis sed odio morbi quis
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="400">
                        <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam
                            eleifend mi in nulla? <i class="icofont-simple-up"></i></a>
                        <div id="faq4" class="collapse" data-parent=".faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                                laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                                Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa
                                tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="500">
                        <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam
                            sem et tortor consequat? <i class="icofont-simple-up"></i></a>
                        <div id="faq5" class="collapse" data-parent=".faq-list">
                            <p>
                                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                                ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing
                                bibendum est. Purus gravida quis blandit turpis cursus in
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="600">
                        <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius
                            vel pharetra vel turpis nunc eget lorem dolor? <i class="icofont-simple-up"></i></a>
                        <div id="faq6" class="collapse" data-parent=".faq-list">
                            <p>
                                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer
                                malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem
                                dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat
                                commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non
                                blandit massa enim nec.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section>End F.A.Q Section -->

        <!-- ======= Team Section ======= -->
        <!-- <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Team</h2>
                    <p>Our Hardworking Team</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>Kileleshwa</p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@kazinapesa.co.ke</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>+254 722 750 266</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="{{url('save_feedback')}}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Your Name"
                                           data-rule="minlen:2" data-msg="Please enter at least 4 chars"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Your Email" data-rule="email"
                                           data-msg="Please enter a valid email"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="number" class="form-control" name="phone" id="phone"
                                           placeholder="Your Phone" data-rule="minlen:10"
                                           data-msg="Please enter a valid phone number"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                           placeholder="Subject"
                                           data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                      data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

@endsection

@extends('layouts.Master')


@section('content')
			<section class="banner-area relative about-banner" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								PTE Courses
							</h1>
							<p class="text-white link-nav"><a href="../../..">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Popular Courses</a></p>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start popular-courses Area -->
			<section class="popular-courses-area section-gap courses-page">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">PTE Courses we offer</h1>
								<p>There is a moment in the life of any aspiring.</p>
							</div>
						</div>
					</div>
					<div class="row">

                        @foreach($Pte as $pteItem)
                            <div class="single-popular-carusel col-lg-3 col-md-6">
                                <div class="thumb-wrap relative">
                                    <div class="thumb relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="{{ asset('storage/'.$pteItem->image) }}" alt="">
                                    </div>
                                    <div class="meta d-flex justify-content-between">
                                        <p><span ></span>  <span></span></p>
                                        <h4>$ {{$pteItem->pte_course_price}}</h4>
                                    </div>
                                </div>
                                <div class="details">
                                    <a href="#">
                                        <h4>
                                            {{$pteItem->pte_course_name}}
                                        </h4>
                                    </a>
                                    <p>
                                        {{$pteItem->pte_course_description}}
                                    </p>
                                </div>
                            </div>
                        @endforeach


						<div class="single-popular-carusel col-lg-3 col-md-6">
							<div class="thumb-wrap relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/pte/pte.jpg" alt="">
								</div>
								<div class="meta d-flex justify-content-between">
									<p><span></span>  <span></span></p>
									<h4>$150</h4>
								</div>
							</div>
							<div class="details">
								<a href="pte-details">
									<h4>
                                        PTE Academic
									</h4>
								</a>
								<p>
									When television was young, there was a hugely popular show based on the still popular fictional characte
								</p>
							</div>
						</div>
						<div class="single-popular-carusel col-lg-3 col-md-6">
							<div class="thumb-wrap relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/pte/vocabl.jpg" alt="">
								</div>
								<div class="meta d-flex justify-content-between">
									<p><span></span><span></span></p>
									<h4>$150</h4>
								</div>
							</div>
							<div class="details">
								<a href="pte-details">
									<h4>
                                        PTE Vocabulary
									</h4>
								</a>
								<p>
									When television was young, there was a hugely popular show based on the still popular fictional characte
								</p>
							</div>
						</div>
						<div class="single-popular-carusel col-lg-3 col-md-6">
							<div class="thumb-wrap relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/pte/expert.jpg" alt="">
								</div>
								<div class="meta d-flex justify-content-between">
									<p><span></span><span></span></p>
									<h4>$150</h4>
								</div>
							</div>
							<div class="details">
								<a href="pte-details">
									<h4>
                                        PTE Academic Expert
									</h4>
								</a>
								<p>
									When television was young, there was a hugely popular show based on the still popular fictional characte
								</p>
							</div>
						</div>

						<div class="single-popular-carusel col-lg-3 col-md-6">
							<div class="thumb-wrap relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/pte/general.jpg" alt="">
								</div>
								<div class="meta d-flex justify-content-between">
									<p><span></span><span></span></p>
									<h4>$150</h4>
								</div>
							</div>
							<div class="details">
								<a href="pte-details">
									<h4>
                                        PTE General
									</h4>
								</a>
								<p>
									When television was young, there was a hugely popular show based on the still popular fictional characte
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End popular-courses Area -->

			<!-- Start search-course Area -->

			<!-- End search-course Area -->

			<!-- Start upcoming-event Area -->
			<section class="upcoming-event-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Upcoming Events of our Institute</h1>
								<p>If you are a serious astronomy fanatic like a lot of us</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="active-upcoming-event-carusel">
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e1.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e2.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e1.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e1.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e2.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e1.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
@endsection

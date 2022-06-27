@extends('layouts.Master')


@section('content')
			<section class="banner-area relative about-banner" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								IELTS Courses
							</h1>
							<p class="text-white link-nav"><a href="../..">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="courses"> Popular Courses</a></p>
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
								<h1 class="mb-10">IELTS Courses we offer</h1>
								<p>There is a moment in the life of any aspiring.</p>
							</div>
						</div>
					</div>
					<div class="row">
                        @foreach($Ielts as $ieltsItem)
                        <div class="single-popular-carusel col-lg-3 col-md-6">
                            <div class="thumb-wrap relative">
                                <div class="thumb relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ asset('storage/'.$ieltsItem->image) }}" alt="">
                                </div>
                                <div class="meta d-flex justify-content-between">
                                    <p><span ></span>  <span></span></p>
                                    <h4>$ {{$ieltsItem->ielts_course_price}}</h4>
                                </div>
                            </div>
                            <div class="details">
                                <a href="#">
                                    <h4>
                                        {{$ieltsItem->ielts_course_name}}
                                    </h4>
                                </a>
                                <p>
                                    {{$ieltsItem->ielts_course_description}}
                                </p>
                            </div>
                        </div>
                        @endforeach
						<div class="single-popular-carusel col-lg-3 col-md-6">
							<div class="thumb-wrap relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/ielts/listening.jpg" alt="">
								</div>
								<div class="meta d-flex justify-content-between">
									<p><span ></span>  <span></span></p>
									<h4>$150</h4>
								</div>
							</div>
							<div class="details">
								<a href="ielts_listening">
									<h4>
										Listening for IELTS
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
									<img class="img-fluid" src="img/ielts/reading.jpg" alt="">
								</div>
								<div class="meta d-flex justify-content-between">
									<p><span></span> <span></span></p>
									<h4>$150</h4>
								</div>
							</div>
							<div class="details">
								<a href="ielts_reading">
									<h4>
										Reading for IELTS
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
									<img class="img-fluid" src="img/ielts/writing.jpg" alt="">
								</div>
								<div class="meta d-flex justify-content-between">
									<p><span ></span>  <span></span></p>
									<h4>$150</h4>
								</div>
							</div>
							<div class="details">
								<a href="ielts_writing">
									<h4>
										Writing for IELTS
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
									<img class="img-fluid" src="img/ielts/speaking.jpg" alt="">
								</div>
								<div class="meta d-flex justify-content-between">
									<p><span></span><span></span></p>
									<h4>$150</h4>
								</div>
							</div>
							<div class="details">
								<a href="ielts_speaking">
									<h4>
										Speaking for IELTS
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
                                    <img class="img-fluid" src="img/ielts/vocab.jpg" alt="">
                                </div>
                                <div class="meta d-flex justify-content-between">
                                    <p><span></span><span></span></p>
                                    <h4>$150</h4>
                                </div>
                            </div>
                            <div class="details">
                                <a href="ielts_vocabulary">
                                    <h4>
                                        Vocabulary for IELTS
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
                                    <img class="img-fluid" src="img/ielts/grammar.jpeg" alt="">
                                </div>
                                <div class="meta d-flex justify-content-between">
                                    <p><span></span> <span></span></p>
                                    <h4>$150</h4>
                                </div>
                            </div>
                            <div class="details">
                                <a href="ielts_grammar">
                                    <h4>
                                        Grammar for IELTS
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
                                    <img class="img-fluid" src="img/ielts/band.jpg" alt="">
                                </div>
                                <div class="meta d-flex justify-content-between">
                                    <p><span></span> <span></span></p>
                                    <h4>$150</h4>
                                </div>
                            </div>
                            <div class="details">
                                <a href="ielts_band7">
                                    <h4>
                                        Preparation for Band 7+
                                    </h4>
                                </a>
                                <p>
                                    When television was young, there was a hugely popular show based on the still popular fictional characte
                                </p>
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

@extends('layouts.Master')


@section('content')
			<section class="banner-area relative about-banner" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Gallery
							</h1>
							<p class="text-white link-nav"><a href="..">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="gallery"> Gallery</a></p>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start gallery Area -->
			<section class="gallery-area section-gap">
				<div class="container">
					<div class="row">
                        @foreach($Gallery as $galleryItem)
                        <div class="col-lg-7">
                            <a href="#" class="img-gal">
                                <div class="single-imgs relative">
                                    <div class="overlay overlay-bg"></div>
                                    <div class="relative">
                                        <img class="img-fluid" src="{{ asset('storage/'.$galleryItem->image) }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
						<div class="col-lg-7">
							<a href="img/gallery/g1.jpg" class="img-gal">
								<div class="single-imgs relative">
									<div class="overlay overlay-bg"></div>
									<div class="relative">
										<img class="img-fluid" src="img/gallery/g1.jpg" alt="">
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-5">
							<a href="img/gallery/g2.jpg" class="img-gal">
								<div class="single-imgs relative">
									<div class="overlay overlay-bg"></div>
									<div class="relative">
										<img class="img-fluid" src="img/gallery/g2.jpg" alt="">
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="img/gallery/g3.jpg" class="img-gal">
								<div class="single-imgs relative">
									<div class="overlay overlay-bg"></div>
									<div class="relative">
										<img class="img-fluid" src="img/gallery/g3.jpg" alt="">
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="img/gallery/g4.jpg" class="img-gal">
								<div class="single-imgs relative">
									<div class="overlay overlay-bg"></div>
									<div class="relative">
										<img class="img-fluid" src="img/gallery/g4.jpg" alt="">
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="img/gallery/g5.jpg"  class="img-gal">
								<div class="single-imgs relative">
									<div class="overlay overlay-bg"></div>
									<div class="relative">
										<img class="img-fluid" src="img/gallery/g5.jpg" alt="">
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-5">
							<a href="img/gallery/g6.jpg" class="img-gal">
								<div class="single-imgs relative">
									<div class="overlay overlay-bg"></div>
									<div class="relative">
										<img class="img-fluid" src="img/gallery/g6.jpg" alt="">
									</div>
								</div>
							 </a>
						</div>
						<div class="col-lg-7">
							<a href="img/gallery/g7.jpg" class="img-gal">
								<div class="single-imgs relative">
									<div class="overlay overlay-bg"></div>
									<div  class="relative">
										<img class="img-fluid" src="img/gallery/g7.jpg" alt="">
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</section>
@endsection

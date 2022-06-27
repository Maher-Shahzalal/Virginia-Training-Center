@extends('layouts.Master')

@section('content')
			<section class="banner-area relative about-banner" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us
							</h1>
							<p class="text-white link-nav"><a href="..">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact"> Contact Us</a></p>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d960.8064950267539!2d32.56504017766265!3d15.5795705102813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x168e91be64b89c33%3A0x99072ba5ae75c075!2z2YXYsdmD2LIg2YHYsdis2YrZhtmK2Kcg2YTYqtiv2LHZitioINin2YTZhNi62KfYqiDZiNin2YTYqtmG2YXZitipINin2YTYqNi02LHZitip!5e0!3m2!1sen!2s!4v1645538181615!5m2!1sen!2s" style="width:100%; height: 445px;" > </iframe>
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<br><br><br>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Sudan, Khartoum</h5>
									<p>
										Almushtil street squre 14 west of bank of Khartoum
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>+249 90 737 1304</h5>
									<p>Sun to Wed 1 pm to 8 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@virginia-vtc.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<br><br><br>
							<form class="form-area contact-form text-right"  method="post">
                                {{csrf_field()}}
								<div class="row">
									<div class="col-lg-6 form-group">
										<input name="contact_name" placeholder="Enter your name" class="@error('contact_name')is-invalid @enderror common-input mb-20 form-control"  type="text" >
                                        @error('contact_name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror

										<input name="contact_email" placeholder="Enter email address" class="@error('contact_email')is-invalid @enderror common-input mb-20 form-control"  type="email" >
                                        @error('contact_email')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror

										<input name="contact_subject" placeholder="Enter subject"  class="@error('contact_subject')is-invalid @enderror common-input mb-20 form-control"  type="text" >
                                        @error('contact_subject')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror

									</div>
									<div class="col-lg-6 form-group">
										<textarea class="@error('contact_message')is-invalid @enderror common-textarea form-control" name="contact_message" placeholder = 'Enter Messege'  ></textarea>
                                        @error('contact_message')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror

									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button type="submit" class="genric-btn primary" >Send Message</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
@endsection

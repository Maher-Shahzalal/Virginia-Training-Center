@extends('layouts.Master')


@section('content')
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Social Media Courses
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
                        <h1 class="mb-10">Social Media Courses we offer</h1>
                        <p>There is a moment in the life of any aspiring.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($Social_Media as $social_media)
                    <div class="single-popular-carusel col-lg-3 col-md-6">
                        <div class="thumb-wrap relative">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset('storage/'.$social_media->image) }}" alt="">
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <p><span ></span>  <span></span></p>
                                <h4>$ {{$social_media->social_media_course_price}}</h4>
                            </div>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h4>
                                    {{$social_media->social_media_course_name}}
                                </h4>
                            </a>
                            <p>
                                {{$social_media->social_media_course_description}}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
    </section>
@endsection


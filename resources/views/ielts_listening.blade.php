@extends('layouts.Master2')

@section('content')
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    IELTS Listening Course
                </h1>
                <p class="text-white link-nav"><a href="../..">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="courses"> Popular Courses</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start course-details Area -->
<section class="course-details-area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-contents">
                <div class="main-image">
                    <img class="img-fluid" src="img/m-img.jpg" alt="">
                </div>
                <div class="jq-tab-wrapper" id="horizontalTab">
                    <div class="jq-tab-menu">
                        <div class="jq-tab-title active" data-tab="1">Objectives</div>
                        <div class="jq-tab-title" data-tab="2">Eligibility</div>
                        <div class="jq-tab-title" data-tab="3">Course Outline</div>

                    </div>
                    <div class="jq-tab-content-wrapper">
                        <div class="jq-tab-content active" data-tab="1">
                            When you enter into any new area of science, you almost always find yourself with a baffling new language of technical terms to learn before you can converse with the experts. This is certainly true in astronomy both in terms of terms that refer to the cosmos and terms that describe the tools of the trade, the most prevalent being the telescope.
                            <br>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                        </div>
                        <div class="jq-tab-content" data-tab="2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                            <br>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                        </div>
                        <div class="jq-tab-content" data-tab="3">
                            <ul class="course-list">
                                <li class="justify-content-between d-flex">
                                    <p>Introduction Lesson</p>

                                </li>
                                <li class="justify-content-between d-flex">
                                    <p>Basics of HTML</p>

                                </li>
                                <li class="justify-content-between d-flex">
                                    <p>Getting Know about HTML</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p>Tags and Attributes</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p>Basics of CSS</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p>Getting Familiar with CSS</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p>Introduction to Bootstrap</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p>Responsive Design</p>
                                </li>
                                <li class="justify-content-between d-flex">
                                    <p>Canvas in HTML 5</p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 right-contents">
                <ul>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Trainer’s Name</p>
                            <span class="or">Dr.Abdullah</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Course Fee </p>
                            <span>$150</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Available Seats </p>
                            <span>15</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Schedule </p>
                            <span>2.00 pm to 4.00 pm</span>
                        </a>
                    </li>
                </ul>
                <a href="#" class="primary-btn text-uppercase">Enroll the course</a>
            </div>
        </div>
    </div>
</section>
<br>
@endsection

@extends('publicSite.layout.master')
@section('content')

        <section class="banner-two" style="margin-top: 7%">
            <div class="banner-two__bg">
                <div class="banner-two__bg-inner" data-options='{ "delay": 5000, "slides": [ { "src": "assets/images/backgrounds/banner-2-bg-1.jpg" }, { "src": "assets/images/backgrounds/banner-2-bg-2.jpg" }, { "src": "assets/images/backgrounds/banner-2-bg-3.jpg" } ], "transition": "fade", "timer": false }'></div><!-- /.banner-two__bg-inner -->
            </div><!-- /.banner-two__bg -->
            <img src="assets/images/education-day-assortment-with-copy-space (1).jpg" alt="" 
            style="width: 100%;height: 115vh"
            class="banner-two__floated-text mb-5 ">
            <div class="container ">
                <div class="mb-5" style="float: left">
                    {{-- <p style="font-size: 80px">Learn</p> --}}
                    <h2 style="font-size: 75px">Discover yourself</h2>
                    <div style="margin-left: 70px;" >
                        <a class="thm-btn rounded-pill" href="{{ route('courses.index') }}" style="background-color: #852a27;padding: 1rem 1.5rem; margin-top: 0.8rem">Explore Now</a>
                    </div>
                </div>

            </div>
        </section>

        <section class="destinations-three">
            <div class="container " style="margin-top: 12%">
                <div class="block-title text-center">
                   
                    <h3 class="">Courses</h3>
                </div>
                <div class="row">
                    @foreach ($category as $categories)
                    <div class="col-lg-4 w-100 col-md-6" >
                        <div class="destinations-three__single">
                            <img style="height: 45vh" src="uploads/{{$categories->category_img}}" alt="">
                            <div class="destinations-three__content">
                                <h3><a href="{{ route('courses.show',$categories->id)}}">{{$categories->category_name}}</a></h3>
                            </div>
                            <div class="destinations-three__hover-content" >
                                <h3><a href="{{ route('courses.show',$categories->id)}}">{{$categories->category_name}}</a></h3>
                                <p style="color: #aa4340">{{$categories->trip->count(). ' Course'}}</p>
                                <a href="{{ route('courses.show',$categories->id)}}  " class="destinations-three__link" style="background-color: #b34b47"><i class="tripo-icon-right-arrow" ></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>





        <section class="cta-one cta-one__home-two"  style="background-color: #852a27">
            <div class="container" >
                <h3>Discover our Newest Courses</h3>
                <div class="cta-one__button-block">
                    <a href="{{ route('courses.index') }}" class="thm-btn cta-one__btn" >Reserve Now!</a>
                </div>
            </div>
        </section>

        <section class="tour-one">
            <div class="container">
                <div class="block-title text-center">
            
                    <h3>Most Popular Courses</h3>
                </div>

                <div class="tour-one__carousel tour-one__carousel-no-overflow thm__owl-carousel  owl-carousel owl-theme" data-options='{"nav": false, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 700, "dots": true, "margin": 30, "loop": true, "responsive": { "0": { "items": 1, "nav": true, "navText": ["Prev", "Next"], "dots": false }, "767": { "items": 1, "nav": true, "navText": ["Prev", "Next"], "dots": false }, "991": { "items": 2 }, "1199": { "items": 2 }, "1200": { "items": 3 } }}'>
                    @foreach ($trip as $course)
                    <div class="item">


                        <div class="tour-one__single">
                            <div class="tour-one__image">
                                <img style="min-width:35wh; max-height:30vh" src="{{asset('trip_images/'.$course->image)}}" alt="">
                            </div>

                            <div class="tour-one__content" style="min-height: 350px">
                                <ul  class="list-unstyled blog-one__meta">
                                    <li><a href="{{route('guide',$course->guide->id)}}"><i></i> {{"instructor: " . $course->guide->name}}</a></li>
                                    <li><a><i class="fas fa-calendar-day" style="color: #b34b47"></i> {{$course->date}}</a></li>
                                </ul>

                                <h3><a href="{{ route('course-details.show',$course->id)}}">{{$course->name}}</a></h3>
                                <span style="color: rgb(20, 170, 20);font-weight: 700;font-size: 20px">{{$course->price . "JD"}}</span>
                                <p>Capacity :{{$course->max_visitors}} Student</p>
                                <ul class="tour-one__meta list-unstyled">
                            
                                    <li><a href="{{route('courses.show',$course->category->id)}}"><i class="fas fa-book"></i>{{$course->category->category_name}}</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </section>



        <section class="cta-four img-responsive" style="background-image: url(uploads/secondary.jpg);">
            <div class="container">
                <p>We provide you with the Best</p>
                <h3>Always Be <span style="color:white"> Superior</span></h3>
            </div>
        </section>


        <section class="blog-one">
            <div class="container">
                <div class="block-title text-center">
             
                    <h3>Latest Added course</h3>
                </div>
                <div class="row" >
                    @foreach ($news as $courseDate)
                    <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms" >
                        <div class="blog-one__single" >
                            <div class="blog-one__image">
                                <img style="min-width:35wh; max-height:30vh" src="{{asset('trip_images/'.$courseDate->image)}}" alt="">
                                <a href="{{ route('course-details.show',$courseDate->id)}}"><i class="fa fa-long-arrow-alt-right"></i></a>
                            </div>
                            <div class="blog-one__content" style="min-height:280px">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="{{route('guide',$courseDate->guide->id)}}"><i></i> {{"instructor: " . $courseDate->guide->name}}</a></li>
                                    <li><a><i class="fas fa-calendar-day" style="color: #b34b47"></i> {{$courseDate->date}}</a></li>

                                </ul>
                                <h3><a href="{{ route('course-details.show',$courseDate->id)}}">{{$courseDate->name}}</a></h3>
                                <ul class="tour-one__meta list-unstyled">
                     
                                    <li><a href="{{ route('courses.show',$courseDate->category->id)}}"><i class="fas fa-book"></i>{{$courseDate->category->category_name}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="cta-one cta-one__home-two" style="background-color: #852a27">
            <div >
                <div class="row align-items-center">
                    <div class="col-lg-7 d-flex justify-content-center">
                        <h3>Be member in our family <br>
                            by Sign Up</h3>
                    </div>
                    <div class="col-lg-5">

                            <a href="{{ asset('register')}}" class="thm-btn cta-one__btn" >SIGN UP NOW</a>

                        <div class="mc-form__response"></div>
                    </div>
                </div>
            </div>
        </section>
@endsection

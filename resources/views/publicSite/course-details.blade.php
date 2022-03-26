@extends('publicSite.layout.master')

@section('content')



<section  style=" padding-top:200px;">
    <div class="container">
        <h2  style="font-family:Arial, Helvetica, sans-serif;">Course Details</h2>
        <ul class="thm-breadcrumb list-unstyled s" >
            <li style="color: #000"><a href="{{ route("home2")}}">Home</a></li>
            <li style="color: #000"><span>Course Details</span></li>
        </ul>
    </div>
</section>

<section class="blog-list"  style=" padding-top:50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="blog-details__image">
                    <video   src="{{asset('trip_images/'.$courseDetails->video)}}" width="765" autoplay controls></video>
                </div>
                <div class="blog-details__content">
                    <ul class="list-unstyled blog-one__meta">
                        <li><a href="{{route('guide',$courseDetails->guide_id)}}"><i class="far fa-user-circle sahar-icon"></i> {{$courseDetails->guide->name}}</a></li>
                        <li><a><i class="far fa-calendar-alt sahar-icon"></i> {{$courseDetails->date}}</a></li>
                    </ul><!-- /.list-unstyled blog-one__meta -->
                    <h3>{{$courseDetails->name}}</h3>
                    <p>{{$courseDetails->description}}</p>

                    <br>
                                {{-- ======================= --}}


                        <!-- Button trigger modal -->
                        <button type="button" style="padding: 6px 15px;" class="edit-trip" data-toggle="modal" data-target="#exampleModalCenter">
                            reserve now
                           </button>

                           <!-- Modal -->

                           <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered" role="document">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Reserve Confirmtion</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                   </button>
                                 </div>
                                 <div class="modal-body">
                                   Your Request Will be sent to the Instructor, The instructor Will contact you within 24 hours
                                 </div>
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   @auth
                                    <form action="{{route('reservation.store')}}" method="Post">
                                    @csrf
                                    <input type="hidden" value="{{$courseDetails->id}}" name="trip_id">
                                     <button class="edit-trip "  type="submit"  onclick="{{Session::put("reservation","Your Request successfully sent!")}}">Send requet </button>
                                    </form>
                                    @endauth
                                    @guest
                                    <form action="/register" method="get">
                                     <button class="edit-trip"  type="submit">Send requet </button>
                                    </form>
                                    @endguest
                                 </div>
                               </div>
                             </div>
                           </div>

                 
                </div><!-- /.blog-details__content -->

            </div><!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar">
                    @section('style')
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=Merriweather&family=Mochiy+Pop+One&family=Mohave&display=swap');
                        h1,h2,h3,h4,h5,h6 {
                            font-family: "Barlow Condensed", sans-serif !important;
                        }
                        </style>
                        @endsection

                    <div class="container sidebar__single sahar-container">
                        <div class="row">
                            <div class="col-6">
                                <h5><i class="fas fa-user sahar-icon"></i> Instractor:</h5>
                                <h5><i class="far fa-clock sahar-icon"></i> Course Duration:</h5>
                                <h5><i class="far fa-calendar-alt sahar-icon"></i> Satrting Date:</h5>
                                <h5><i class="fas fa-tag sahar-icon"></i> Course Price:</h5>
                            </div>
                            <div class="col-6">
                                <h5>{{$courseDetails->guide->name}}</h5>
                                <h5>{{$courseDetails->days}} days</h5>
                                <h5>{{$courseDetails->date}}</h5>
                                <h5>{{$courseDetails->price}} Jd</h5>
                            </div>
                        </div>
                    </div>
                </div><!-- /.sidebar -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.blog-list -->

@endsection

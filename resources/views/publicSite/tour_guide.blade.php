@extends('publicSite.layout.master')



@section('content')
<section  style=" padding-top:200px;">
    <div class="container">
        <h2  style="font-family:Arial, Helvetica, sans-serif;">Instructors</h2>
        <ul class="thm-breadcrumb list-unstyled s" >
            <li style="color: #000"><a href="{{ route("home2")}}">Home</a></li>
            <li style="color: #000"><span>Topics</span></li>
        </ul>
    </div>
</section>


<section class="team-one">
    <div class="container">
        <div class="row">
            @foreach ($guides as $guide)

            <div class="col-lg-4 col-md-6">
                <div class="team-one__single">
                    <div class="team-one__image" style="height: 360px;">

                        <a href="{{route('guide',$guide->id)}}">

                            <img src='{{asset("user_images/". $guide->image)}}' alt="guide_image"  style="display: block; width: 100%;height: 100%;"></a>

                    </div>
                    <div class="team-one__content">
                        <a href="{{route('guide',$guide->id)}}"><h3>{{$guide->name}}</h3></a>
                        <p class="text-uppercase">Instructor</p>
                        <a href="{{route('guide',$guide->id)}}"><button class="btn btn-warning mt-3" style="background-color: #a8423e; color: #fff">Show Profile</button></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

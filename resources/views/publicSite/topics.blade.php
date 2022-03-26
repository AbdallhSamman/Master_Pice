@extends('publicSite.layout.master')

@section('content')


<section  style=" padding-top:200px;">
    <div class="container">
        <h2  style="font-family:Arial, Helvetica, sans-serif;">Topics</h2>
        <ul class="thm-breadcrumb list-unstyled s" >
            <li style="color: #000"><a href="{{ route("home2")}}">Home</a></li>
            <li style="color: #000"><span>Topics</span></li>
        </ul>
    </div>
</section>



        <section class="destinations-three ">
            {{-- <h1 style="text-align: center;font-family:Arial, Helvetica, sans-serif;margin-bottom: 50px">Topics</h1> --}}
            <div class="container">
                <div class="row">

                @foreach($category as $val)
                    <div class="col-lg-4 col-md-6">
                        <div class="destinations-three__single">
                        <img src="{{ asset('uploads/'. $val->category_img) }}" style="width:100%;height:45vh"  alt="Image">
                            <div class="destinations-three__content">
                                <h3><a href="{{route("courses.show",$val->id)}}">{{ $val->category_name}}</a></h3>

                            </div>
                            <div class="destinations-three__hover-content">
                                <h3><a href="{{route("courses.show",$val->id)}}">{{ $val->category_name}}</a></h3>
                                <p style="color: #aa4340">{{$val->trip()->count(). ' Courses'}}</p>
                                <a href="{{route('courses.show', $val->id)}}" class="destinations-three__link"  style="background-color: #b34b47"><i class="tripo-icon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>



@endsection




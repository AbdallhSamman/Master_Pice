@extends('publicSite.layout.master')

@section('content')


{{-- <section class="page-header" style="background-image: url(assets/images/backgrounds/page-header-contact.jpg); margin-top:145px;">
            <div class="container">
                <h2>Destination</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route('home2')}}">Home</a></li>
                    <li><span>Destination</span></li>
                </ul>
            </div>
        </section> --}}


        <section class="destinations-three " style="margin-top: 7%">
            <h1 style="text-align: center;font-family:Arial, Helvetica, sans-serif;margin-bottom: 50px">Topics</h1>
            <div class="container">
                <div class="row">

                @foreach($category as $val)
                    <div class="col-lg-4 col-md-6">
                        <div class="destinations-three__single">
                        <img src="{{ asset('uploads/'. $val->category_img) }}" style="width:100%;height:45vh"  alt="Image">
                            <div class="destinations-three__content">
                                <h3><a href="{{route("trips-list.show",$val->id)}}">{{ $val->category_name}}</a></h3>

                            </div>
                            <div class="destinations-three__hover-content">
                                <h3><a href="{{route("trips-list.show",$val->id)}}">{{ $val->category_name}}</a></h3>
                                <p style="color: #aa4340">{{$val->trip()->count(). ' trips'}}</p>
                                <a href="{{route('trips-list.show', $val->id)}}" class="destinations-three__link"  style="background-color: #b34b47"><i class="tripo-icon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>



@endsection




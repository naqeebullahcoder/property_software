@extends('layouts.admin')
<style>

    /*------------START HOME PAGE GRID-----------------*/


    .container-project-grid {
        max-width: 1125px;
        margin: 0 auto;
    }

    .gallery {
        display: flex;
        flex-wrap: wrap;
    }

    .gallery-item {
        width: 300px;
        height: 250px;
        margin: 10px;
        text-decoration: none;
    }

    .gallery-item img {
        position: absolute;
    }

    .text-wrapper {
        position: relative;
        width: 300px;
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        color: #fff;
        opacity: 0;
    }

    .text-wrapper:hover {
        transition: all 0.5s ease;
        background: rgba(0, 0, 0, 0.6);
        opacity: 1;
    }

    .name {
        font-size: 1.5em;
    }


    /* Because there is no hover on a touch devide, we need to move the text to the bottom of the image and display it by default */

    @media only screen and (max-width: 1024px) {
        .text-wrapper {
            opacity: 1;
            justify-content: flex-end;
            text-shadow: 1px 1px 1px #000;
        }
        .title {
            margin-bottom: 1em;
        }
    }

    /*------------END HOME PAGE GRID-----------------*/

</style>
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-project-grid">

                    <div class="gallery">
                        @foreach($floors as $floor)
                            <a class="gallery-item" href="{{url('units/'.$floor->id)}}" >
                                <img  class="responsive" src="{{asset('public/uploads/floors/'.$floor->image)}}" width="300px" height="250px" alt="Plots">
                                <span class="text-wrapper">
                                <span class="name">{{$floor->floor_name}}</span>
                                <span class="title" style="font-size: medium !important;">{{$floor->Units->count()}} Plots</span>

                            </span>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection

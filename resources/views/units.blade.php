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

    .btn btn-primary{
        position: fixed;
        bottom: 0;
        right: 0;
    }
    .btn btn-success{
        position: fixed;
        bottom: 0;
        left: 0;
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

    .text-wrapper {
        transition: all 0.8s ease;
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
    <div style="margin: 0px 0px 10px 0px;"  class="row">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-project-grid">

                    <div class="gallery">
                        @foreach($units as $unit)
                            <div class="gallery-item">
                                <img src="{{asset('public/uploads/units/bg-image.png')}}" width="300px" height="250px" alt="Headshot of George Washington">
                                <span class="text-wrapper">
                                <span class="name">{{$unit->unit_name}}</span>
{{--                                    <span class="name">{{$unit->meter_no}}</span>--}}
                                    <span class="name">{{$unit->UnitStatus->name}}</span>
                                    @if($unit->UnitStatus->id==7)
                                        <span class="name">
                                     <a href="{{url('admin.sales.create'.$unit->id)}}"><button type="button" style="margin-top: 130px" class="btn btn-success">Sale Plot</button></a>
                                            {{--<a href="{{url('rent_agrement_detais/'.$unit->id)}}"><button type="button" style="margin-top: 130px" class="btn btn-success">View Details</button></a>--}}
                                            </span>
                                        @elseif($unit->UnitStatus->id==1)
                                        <span class="name">
                                     <a href="{{url('admin.installments'.$unit->id)}}"><button type="button" style="margin-top: 130px" class="btn btn-primary">Pay Installment</button></a>
                                            <a href="{{url('rent_agrement_detais/'.$unit->id)}}"><button type="button" style="margin-top: 130px" class="btn btn-success">View Details</button></a>
                                            </span>
                                    @endif
                                        {{--
                                    <span class="title" style="font-size: medium !important;"></span>--}}
{{--                                <span class="title">{{$project->Units->count()}} Units</span>--}}
                            </span>
                            </div>
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

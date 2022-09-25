@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Event Details
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Event Title
                    </th>
                    <td>
                        {{ $event->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Description
                    </th>
                    <td>
                        {{ $event->description}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Event Date
                    </th>
                    <td>
                        {{ date('d-m-Y', strtotime($event->date)) }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Video Link
                    </th>
                    <td>
                        {{ $event->video_link }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Pictures
                    </th>
                    <td>
                        @foreach($media as $pictures)
                        <img width="100%"  src="{{asset('public/uploads/events/'.$pictures->picture)}}" alt="{{$event->title}}">
                        </br>
                        @endforeach
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection
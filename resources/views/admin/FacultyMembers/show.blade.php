@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
          Faculty Member Details
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                    <img src="{{asset('public/faculty-members-pictures/'.$faculty_resource->picture)}}" alt="{{$faculty_resource->name }} " height="auto" width="150px" >
                    </td>
                </tr>
                <tr>
                    <th>
                       Name
                    </th>
                    <td>
                        {{ $faculty_resource->user->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Designation
                    </th>
                    <td>
                        @if($faculty_resource->designation_id!=null)
                            {{ $faculty_resource->designation->name }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        Email
                    </th>
                    <td>
                        {!! $faculty_resource->email !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Date of Birth
                    </th>
                    <td>
                        {{ date('d-m-Y', strtotime($faculty_resource->dob)) ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Joining Date
                    </th>
                    <td>
                        {{ date('d-m-Y', strtotime($faculty_resource->joining_date)) ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Biography
                    </th>
                    <td>
                        {!! $faculty_resource->biography !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Qualification
                    </th>
                    <td>
                        {!! $faculty_resource->qualification !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Department
                    </th>
                    <td>
                        @if($faculty_resource->department_id!=null)
                        {{ $faculty_resource->department->name }}
                        @endif
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            HONOURS AND AWARDS
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>

                @foreach($faculty_resource->honours_and_awards as $honours_and_award)
                <tr>
                    {{--<td>--}}
                        {{--{{$key+1}}--}}
                    {{--</td>--}}
                   <td>
                       {{$honours_and_award->year}}
                   </td>
                    <td>
                        {{$honours_and_award->description}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            BOOKS
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                @foreach($faculty_resource->publications_and_conferences->where('publication_type',1) as  $publications_and_conference)
                    <tr>

                        {{--<td>--}}
                            {{--{{$key+1}}--}}
                        {{--</td>--}}
                        <td>
                            {{$publications_and_conference->year}}
                        </td>
                        <td>
                            {{$publications_and_conference->description}}
                        </td>
                        <td>
                            {{$publications_and_conference->description}}
                        </td>
                        @if($publications_and_conference->web_link!=null)
                        <td><a href="{{$publications_and_conference->web_link}}">Link</a></td>
                            @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            BOOK CHAPTERS
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                @foreach($faculty_resource->publications_and_conferences->where('publication_type',2) as $publications_and_conference)
                    <tr>

                        {{--<td>--}}
                            {{--{{$key+1}}--}}
                        {{--</td>--}}
                        <td>
                            {{$publications_and_conference->year}}
                        </td>
                        <td>
                            {{$publications_and_conference->description}}
                        </td>
                        <td>
                            {{$publications_and_conference->description}}
                        </td>
                        @if($publications_and_conference->web_link!=null)
                            <td><a href="{{$publications_and_conference->web_link}}">Link</a></td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            JOURNAL PAPAERS
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                @foreach($faculty_resource->publications_and_conferences->where('publication_type',3) as $publications_and_conference)
                    <tr>

                        {{--<td>--}}
                            {{--{{$key+1}}--}}
                        {{--</td>--}}
                        <td>
                            {{$publications_and_conference->year}}
                        </td>
                        <td>
                            {{$publications_and_conference->description}}
                        </td>
                        <td>
                            {{$publications_and_conference->description}}
                        </td>
                        @if($publications_and_conference->web_link!=null)
                            <td><a href="{{$publications_and_conference->web_link}}">Link</a></td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            JOURNAL PAPAERS - PEER REVIEWED
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                @foreach($faculty_resource->publications_and_conferences->where('publication_type',4) as $publications_and_conference)
                    <tr>

                        {{--<td>--}}
                            {{--{{$key+1}}--}}
                        {{--</td>--}}
                        <td>
                            {{$publications_and_conference->year}}
                        </td>
                        <td>
                            {{$publications_and_conference->description}}
                        </td>
                        @if($publications_and_conference->web_link!=null)
                            <td><a href="{{$publications_and_conference->web_link}}">Link</a></td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            CONFERENCES AND PROCEEDINGS
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                @foreach($faculty_resource->publications_and_conferences->where('publication_type',5) as $publications_and_conference)
                    <tr>

                        {{--<td>--}}
                            {{--{{$key+1}}--}}
                        {{--</td>--}}
                        <td>
                            {{$publications_and_conference->year}}
                        </td>
                        <td>
                            {{$publications_and_conference->description}}
                        </td>
                        @if($publications_and_conference->web_link!=null)
                            <td><a href="{{$publications_and_conference->web_link}}">Link</a></td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            WORKSHOPS AND SEMINARS
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                @foreach($faculty_resource->workshops_and_seminars as $key=> $workshops_and_seminar)
                    <tr>

                        {{--<td>--}}
                            {{--{{$key+1}}--}}
                        {{--</td>--}}
                        <td>
                            {{$workshops_and_seminar->year}}
                        </td>
                        <td>
                            {{$workshops_and_seminar->description}}
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            MEMBERSHIPS
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                @foreach($faculty_resource->memberships as $key=> $membership)
                    <tr>

                        {{--<td>--}}
                            {{--{{$key+1}}--}}
                        {{--</td>--}}
                        <td>
                            {{$membership->year}}
                        </td>
                        <td>
                            {{$membership->description}}
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

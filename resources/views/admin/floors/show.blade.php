@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Block Details
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Society Name
                    </th>
                    <td>
                        {{ $floor->Project->project_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Block Name
                    </th>
                    <td>
                        {{ $floor->floor_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Block Picture
                    </th>
                    <td>
                        {{--<img src="{{asset('public/uploads/floors/'.$floor->image)}} "height="auto" width="800px" >--}}
                        <a href="{{asset('public/uploads/floors/'.$floor->image)}}" target="_blank">View Image</a>
                    </td>
                </tr>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
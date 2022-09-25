@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Society Details
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Society Name
                    </th>
                    <td>
                        {{ $project->project_name  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                        {{--<img src="{{asset('public/uploads/projects/'.$project->image)}}" height="auto" width="800px">--}}
                        <a href="{{asset('public/uploads/projects/'.$project->image)}}" target="_blank">View Image</a>
                    </td>
                </tr>
                <tr>
                    <th>
                        NO of Sectors
                    </th>
                    <td>
                        {{ $project->no_of_floors }}
                    </td>
                </tr>
                <tr>
                <tr>
                    <th>
                        No of Plots
                    </th>
                    <td>
                        {{ $project->no_of_units  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Location
                    </th>
                    <td>
                        {{ $project->location  }}
                    </td>
                </tr>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
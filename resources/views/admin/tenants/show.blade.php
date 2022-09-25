@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Customer Details
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Customer Name
                    </th>
                    <td>
                        {{ $tenant->name  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                        <img src="{{asset('public/uploads/tenants/'.$tenant->image)}}" height="auto" width="400px">
                    </td>
                </tr>
                <tr>
                    <th>
                        Father Name
                    </th>
                    <td>
                        {{ $tenant->father_name}}
                    </td>
                </tr>
                <tr>
                    <th>
                        CNIC
                    </th>
                    <td>
                        {{ $tenant->cnic_no }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Mobile No
                    </th>
                    <td>
                        {{ $tenant->mobile_no }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Address
                    </th>
                    <td>
                        {{ $tenant->address }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Is Agent
                    </th>
                    <td>
                        @if($tenant->is_agent==0)Customer
                        @elseif($tenant->is_agent==1)Agent
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
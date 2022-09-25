@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Renatl Unit Details
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Project Name
                    </th>
                    <td>
                        {{ $rentalunit->Project->project_name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Unit Name
                    </th>
                    <td>
                        {{ $rentalunit->Unit->unit_name ?? '' }}
                    </td>
                </tr>
                <tr>
                <tr>
                    <th>
                        Landlord Name
                    </th>
                    <td>
                        {{ $rentalunit->Landlord->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tenant Name
                    </th>
                    <td>
                        {{ $rentalunit->Tenant->name  ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Monthly Rent
                    </th>
                    <td>
                        {{ $rentalunit->monthly_rent ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Monthly Maintenace
                    </th>
                    <td>
                        {{ $rentalunit->maintenace ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Business Type
                    </th>
                    <td>
                        {{ $rentalunit->business_type  ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Security
                    </th>
                    <td>
                        {{ $rentalunit->security ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Receipt Number
                    </th>
                    <td>
                        {{ $rentalunit->receipt_number ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Allotment Date
                    </th>
                    <td>
                        {{ $rentalunit->allotment_date ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Status
                    </th>
                    <td>
                        {{ $rentalunit->Status->name ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Last Update on
                    </th>
                    <td>
                        {{ $rentalunit->updated_at ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Updated By
                    </th>
                    <td>
                        {{ $rentalunit->User->name ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Documents
                    </th>
                    <td>
                        @foreach($rentalunit->Documents as $key=> $document)
                            @foreach($document->Media as $key=> $media)
                            {{--<img src="{{asset('public/uploads/documents/'.$media->picture)}}" height="auto" width="800px">--}}
                            <a href="{{asset('public/uploads/documents/'.$media->picture)}}" target="_blank">{{$document->title}}</a>
                            @endforeach
                        @endforeach
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
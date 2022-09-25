@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Rent Details
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Unit Name
                    </th>
                    <td>
                        {{ $monthly_rent->Unit->unit_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Project Name
                    </th>
                    <td>
                        {{ $monthly_rent->Unit->Project->project_name }}
                    </td>
                </tr>
                <tr>
                <tr>
                    <th>
                        Monthly Rent
                    </th>
                    <td>
                        {{ $monthly_rent->monthly_rent }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Month
                    </th>
                    <td>
                        {{ $monthly_rent->month }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Received Payment
                    </th>
                    <td>
                        {{ $monthly_rent->received_payment }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Payment date
                    </th>
                    <td>
                        {{ $monthly_rent->payment_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Receipt Number
                    </th>
                    <td>
                        {{ $monthly_rent->receipt_number }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Status
                    </th>
                    <td>
                        {{ $monthly_rent->Status->name }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
             Plot Details
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Plot
                    </th>
                    <td>
                        {{ $unit->unit_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Society
                    </th>
                    <td>
                        {{ $unit->project->project_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Block
                    </th>
                    <td>
                        {{ $unit->Floor->floor_name  }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Meter No
                    </th>
                    <td>
                        {{ $unit->meter_no  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Dimension in Marla
                    </th>
                    <td>
                        {{ $unit->dimension  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Price per Marla
                    </th>
                    <td>
                        {{ $unit->price_per_sq  }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Status
                    </th>
                    <td>
                        {{ $unit->UnitStatus->name   }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

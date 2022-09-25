@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header" style="background: linear-gradient(90deg, rgb(255,255,255) 20%, rgb(255,255,255) 35%, rgba(255,255,255,0.99) 100%);">
                <div class="row mb-12">
                    <div class="col-sm-3" style="padding-left: 40px">
                        <img src="{{asset('public/images/logo-small.png')}}" alt="logo" width="200px" height="100px">
                    </div>
                    <div class="col-sm-6">
                        {{--                <span></span>--}}

                        <div class="text-center" style="font-family: Aller; line-height: 0.3em">
                            <h3><b>GREEN HOMES</b></h3>
                            <p>Badiana, Sialkot</p>
                            <p>042-1234567 | 0300-1234567</p>
                            <p>info@greenhomes.com</p>
                            <p>www.greenhomes.com</p>
                        </div>
                        {{--                <span class="float-right"> <strong>Status:</strong> Pending</span>--}}
                    </div>
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="text-justify" style="line-height: 0.5em">
                            {{--<p>INVOICE No. {{ $sale->Installments->sale_id}}</p>--}}
                            <p>Sale ID: {{ $sales->id}}</p>
                            <p>Plot Name: {{ $sales->Units->unit_name}}</p>
                            <p>DATE: {{ date('d-m-Y', strtotime($sales->date)) ?? '' }}</p>
                            <p>Printed ON: {{ date('d-m-Y h:i:sa', strtotime(\Carbon\Carbon::now())) ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-12" >
                    <div class="col-sm-6">
                        <h4><b>INVOICE TO:</b></h4>
                        <div style="line-height: 0.3em">
                            <p>Name : {{ $sales->Tenants->name ?? '' }}</p>
                            <p>Moile No. : {{ $sales->Tenants->mobile_no ?? '' }}</p>
                            <p>Address : {{ $sales->Tenants->address ?? '' }}</p><br>
                        </div>


                    </div>
                    <div class="col-sm-6">
                        <div class="text-right" style="font-family: Aller">
                            <h1 style="font-size: 50px"><b>Installment History</b></h1>
                            <br/>
                        </div>

                    </div>
                </div>
                {{--<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({{$from }}- {{$to}})</h4>--}}
                <br>
                {{--<h3> Doctor</h3>--}}
                <div>
                    <p><i>SALE AMOUNT OF THE PLOT:</i> <b><?php
                            echo number_format($sales->sale_price ?? '')
                            ?></b></p>
                    <p><i>DOWN PAYMENT OF THE PLOT:</i> <b><?php
                            echo number_format($sales->down_payment ?? '')
                            ?></b></p>
                </div>
                <div class="row mb-12" >
                    {{--<div class="col-sm-2">--}}

                    {{--</div>--}}
                    <div class="col-sm-12">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="center">NO. </th>
                                    <th class="center">Installment ID</th>
                                    <th class="right">Plot</th>
                                    <th class="center">Customer</th>
                                    <th class="center">Monthly Installment</th>
                                    {{--<th class="center">Sale Amount</th>--}}
                                    <th class="center">Received Amount</th>
                                    <th class="center">Pending Amount</th>
                                    <th class="center">Receing Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($installments as $key => $installment)
                                    <tr data-entry-id="{{ $installment->id }}">
                                        <td>
                                            {{$key+1}}
                                        </td>
                                        <td>
                                            {{ $installment->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $installment->Units->unit_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $installment->Tenants->name ?? '' }}
                                        </td>
                                        <td>
                                            <?php
                                            echo number_format(($installment->Sales->sale_price-$installment->Sales->down_payment)/$installment->Sales->no_of_installments?? '')
                                            ?>
                                        </td>
                                        {{--<td>--}}
                                            {{--{{ $installment->Sales->sale_price ?? '' }}--}}
                                        {{--</td>--}}
                                        <td>
                                            <?php
                                            echo number_format($installment->receive_amount ?? '')
                                            ?>

                                        </td>
                                        <td>
                                            <?php
                                            echo number_format($installment->pending_amount ?? '')
                                            ?>
                                        </td >
                                        <td>
                                            {{ $installment->receiving_date ?? '' }}
                                        </td >
                                        {{--<td>--}}
                                        {{--{{App\Status::find($events_data->status)->name}}--}}
                                        {{--</td>--}}

                                        <td>

                                            {{--@can('event_show')--}}
                                            {{--<a class="btn btn-xs btn-primary" href="{{ route('admin.installments.show', $installment->id) }}">--}}
                                                {{--{{ trans('view') }}--}}
                                            {{--</a>--}}
                                            {{--@endcan--}}
                                            {{--@can('event_edit')--}}
                                            {{--<a class="btn btn-xs btn-info" href="{{ route('admin.installments.edit', $sale->id) }}">--}}
                                            {{--{{ trans('pay') }}--}}
                                            {{--</a>--}}
                                            {{--@endcan--}}
                                            {{--@can('event_delete')--}}
                                            {{--<form action="{{ route('admin.installments.destroy', $sale) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
                                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                            {{--<input type="submit" class="btn btn-xs btn-danger" value="{{ trans('cancel') }}">--}}
                                            {{--</form>--}}
                                            {{--@endcan--}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="#">
                    <br><br>
                </div>


                <div class="row mb-12" >
                    <div class="col-sm-1">

                    </div>
                    <div class="col-sm-7">
                        {{--<h6> RECEIVED BY: <b> {{ $sale->Installments->received_by ?? '' }}</b></h6>--}}
                        <div style="line-height: 0.5em">

                            {{--<p>ACCOUNT TITLE:{{$orderform->BankAccount->title}}</p>--}}
                            {{--<p>ACCOUNT NO.{{$orderform->BankAccount->account_no}}</p>--}}
                            {{--<p>BRANCH CODE: {{$orderform->BankAccount->branch_code}}</p>--}}
                            {{--<p>BRANCH ADDRESS:{{$orderform->BankAccount->address}}</p>--}}
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-4">
                        <div class="table-responsive-sm">
                            <tr>
                                {{--<th class="center">SUB TOTAL: <b>{{$sale->Installments->receive_amount}}   PKR</b></th>--}}
                            </tr>
                            </thead>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive-sm">
                            <tr>
                                {{--<th class="center">TOTAL:          <b> {{$sale->Installments->receive_amount}}   PKR</b>  </th>--}}
                            </tr>
                            </thead>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive-sm">
                            <tr>
                                {{--<th class="center">BALANCE:          <b> {{$sale->Installments->pending_amount}}   PKR</b>  </th>--}}
                            </tr>
                            </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header" style="background: linear-gradient(90deg, rgba(2,0,36,1) 20%, rgba(7,98,35,1) 35%, rgba(15,187,174,0.9920343137254902) 100%);">

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection
@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header" style="background: linear-gradient(90deg, rgba(2,0,36,1) 20%, rgba(7,98,35,1) 35%, rgba(15,187,174,0.9920343137254902) 100%);">
                <div class="row mb-12">
                    <div class="col-sm-3" style="padding-left: 40px">
                        <img src="{{asset('public/images/small-logo.png')}}" alt="logo" width="200px" height="100px">
                    </div>
                    <div class="col-sm-6">
                        {{--                <span></span>--}}

                        <div class="text-center" style="font-family: Aller; line-height: 0.3em">
                            <h3><b>LOGICAL CREATIONS</b></h3>
                            <p>Office 559, Q-Block, Johar Town, Lahore</p>
                            <p>0321-7199603 | 0306-8426484</p>
                            <p>info@logicalcreations.net</p>
                            <p>www.logicalcreations.net</p>
                        </div>
                        {{--                <span class="float-right"> <strong>Status:</strong> Pending</span>--}}
                    </div>
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="text-justify" style="line-height: 0.5em">
                            <p>REG. 34602-6169996-7</p>
                            <p>INVOICE No. {{ $installment->id}}</p>
                            <p>DATE: {{ date('d-m-Y', strtotime($sale->date)) ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-12" >
                    <div class="col-sm-4">
                        <div class="text-right" style="font-family: Aller">
                            <h1 style="font-size: 80px"><b>INVOICE</b></h1>
                            <br/>
                        </div>

                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <h4><b>INVOICE TO:</b></h4>
                        <div style="line-height: 0.3em">
                            <p>{{ $orderform->patients->name ?? '' }}</p>
                            <p>{{ $orderform->patients->company ?? '' }}</p>
                            <p>{{ $orderform->patients->mobile_no ?? '' }}</p>
                            <p>{{ $orderform->patients->email ?? '' }}</p>
                        </div>
                    </div>
                </div>
                {{--<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({{$from }}- {{$to}})</h4>--}}
                <br>
                {{--<h3> Doctor</h3>--}}
                <div class="row mb-12" >
                    {{--<div class="col-sm-2">--}}

                    {{--</div>--}}
                    <div class="col-sm-12">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="center">NO. </th>
                                    <th class="center">DESCRIPTION</th>
                                    <th class="right">UNIT COST</th>
                                    <th class="center">QUANTITY</th>
                                    <th class="right">AMOUNT</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($oderdetails as $key => $orderdetail_data)
                                    <tr>

                                        <td class="center">{{$key+1}} </td>
                                        {{--@if($doctor_checkup->doctor_id!=null)--}}
                                        <td class="center">{{ $orderdetail_data->description ?? '' }}</td>
                                        <td class="center">{{ $orderdetail_data->unit_cost ?? '' }}</td>
                                        <td class="center">{{ $orderdetail_data->quantity ?? '' }}</td>
                                        <td class="center">{{ $orderdetail_data->total ?? '' }}</td>
                                        {{--@endif--}}
                                        {{--<td class="left">{{$doctor_checkup->Doctor->fee}}</td>--}}
                                        {{--<td class="center">{{$doctor_checkup->total_checkups}}</td>--}}
                                        {{--<td class="right">{{$doctor_checkup->Doctor->fee*$doctor_checkup->total_checkups}}</td>--}}
                                        {{--<td class="left">0</td>--}}
                                        {{--<td class="center">{{$doctor_checkup->Doctor->fee*$doctor_checkup->total_checkups}}</td>--}}

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
                        <h4><b>BANK DETAILS:</b></h4>
                        <div style="line-height: 0.5em">
                            <p>ACCOUNT TITLE:{{$orderform->BankAccount->title}}</p>
                            <p>ACCOUNT NO.{{$orderform->BankAccount->account_no}}</p>
                            <p>BRANCH CODE: {{$orderform->BankAccount->branch_code}}</p>
                            <p>BRANCH ADDRESS:{{$orderform->BankAccount->address}}</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="table-responsive-sm">
                            <tr>
                                <th class="center">SUB TOTAL: <b>{{$oderdetails->sum('total')}}</b></th>
                            </tr>
                            </thead>
                            </table>
                        </div>
                        <hr>

                        <div class="table-responsive-sm">
                            <tr>
                                <th class="center">DISCOUNT:   <b> {{$discount}}%</b></th>
                            </tr>
                            </thead>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive-sm">
                            <tr>
                                <th class="strong right">TAX:   <b> {{$tax}}%</b></th>
                            </tr>
                            </thead>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive-sm">
                            <tr>
                                <th class="center">TOTAL:          <b> {{$amount}} </b>  </th>
                            </tr>
                            </thead>
                            </table>
                        </div>
                        <hr>
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
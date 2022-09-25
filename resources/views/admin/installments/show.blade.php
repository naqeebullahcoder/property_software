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
                            <p>INVOICE No. {{ $installment->id}}</p>
                            <p>Plot No. {{ $installment->Units->unit_name}}</p>
                            <p>Sale ID. {{ $installment->Sales->id}}</p>
                            <p>DATE: {{ date('d-m-Y', strtotime($installment->Sales->date)) ?? '' }}</p>
                            <p>Printed on: {{ date('d-m-Y h:i:sa', strtotime(\Carbon\Carbon::now())) ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-12" >
                    <div class="col-sm-4">
                        <h4><b>INVOICE TO:</b></h4>
                        <div style="line-height: 0.3em">
                            <p>Name : {{ $installment->Tenants->name ?? '' }}</p>
                            <p>Moile No. : {{ $installment->Tenants->mobile_no ?? '' }}</p>
                            <p>Address : {{ $installment->Tenants->address ?? '' }}</p>
                        </div>


                    </div>
                    <div class="col-sm-8">
                        <div class="text-right" style="font-family: Aller">
                            <h1 style="font-size: 60px"><b>INSTALLMENT RECEIPT</b></h1>
                            <br/>
                        </div>

                    </div>
                </div>
                {{--<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({{$from }}- {{$to}})</h4>--}}
                <div>
                    <p><i>SALE AMOUNT OF THE PLOT:</i> <b><?php
                            echo number_format($installment->Sales->sale_price ?? '' )
                            ?></b></p>
                    <p><i>DOWN PAYMENT OF THE PLOT:</i> <b> <?php
                            echo number_format($installment->Sales->down_payment ?? '')
                            ?></b></p>
                </div>
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
                                    <th class="right">Pay Mode</th>
                                    <th class="center">Received Amount</th>
                                </tr>
                                </thead>

                                <tbody>

                                <tr>

                                    <td class="center">{{1}} </td>
                                    {{--@if($installment->id!=null)--}}
                                    <td class="center">{{ $installment->Tenants->name ?? '' }}</td>
                                    <td class="center">Cash</td>
                                    <td class="center"> <?php
                                        echo number_format($installment->receive_amount ?? '')
                                        ?></td>
                                    {{--@endif--}}
                                    {{--<td class="left">{{$doctor_checkup->Doctor->fee}}</td>--}}
                                    {{--<td class="center">{{$doctor_checkup->total_checkups}}</td>--}}
                                    {{--<td class="right">{{$doctor_checkup->Doctor->fee*$doctor_checkup->total_checkups}}</td>--}}
                                    {{--<td class="left">0</td>--}}
                                    {{--<td class="center">{{$doctor_checkup->Doctor->fee*$doctor_checkup->total_checkups}}</td>--}}

                                </tr>
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
                        <h6> RECEIVED BY: <b>{{  $installment->received_by ?? '' }}</b></h6>
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
                                <th class="center">SUB TOTAL: <b> <?php
                                        echo number_format($installment->receive_amount)
                                        ?>  PKR</b></th>
                            </tr>
                            </thead>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive-sm">
                            <tr>
                                <th class="center">TOTAL:          <b> <?php
                                        echo number_format($installment->receive_amount)
                                        ?>   PKR</b>  </th>
                            </tr>
                            </thead>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive-sm">
                            <tr>
                                <th class="center">BALANCE:          <b> <?php
                                        echo number_format($installment->pending_amount)
                                        ?>  PKR</b>  </th>
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
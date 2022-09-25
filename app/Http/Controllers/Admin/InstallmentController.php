<?php

namespace App\Http\Controllers\Admin;

use App\Installment;
use App\Sale;
use App\Tenant;
use App\Unit;
use App\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstallmentController extends Controller
{
    public function index()
    {
//        abort_unless(\Gate::allows('event_access'), 403);
        $sales=Sale::where('status',3)->get();
//        $installments = Installment::where('sale_id', $id)->get();
        return view('admin.installments.index', compact('sales'));
    }
    public function create()
    {
//        abort_unless(\Gate::allows('event_create'), 403);
//        $status=Status::get();
        $installments=Installment::where('status',3)->get();
        $sales=Sale::all();
        $units=Unit::all();
        $tenants=Tenant::get();
//        $agents=Tenant::where('is_agent',1)->get();
        return view('admin.installments.create',compact('sales','installments','units','tenants'));
    }
    public function edit($id)
    {

//        abort_unless(\Gate::allows('event_edit'), 403);

        $installment=new Installment();
        $sale = Sale::where('id', $id)->first();
        $installments = Installment::where('sale_id', $id)->get();
        return view('admin.installments.edit',compact('sale','installments'));
    }
    public function update(Request $request)
    {

        $sale=Sale::where('id',$request->sale_id)->first();

        $installment=new Installment();
        $installment->unit_id=$sale->unit_id;       // Belongs to Plot ID
        $installment->sale_id=$sale->id;            // Belongs to Plot ID
        $installment->tenant_id=$sale->tenant_id;   // Belongs to Customer ID
        $installment->receive_amount=$request->receive_amount;
        $installment->pending_amount=($sale->sale_price-($sale->down_payment+$sale->Installments->sum('receive_amount')+$request->receive_amount));
        $installment->total_sale_amount= $sale->sale_price;
        $installment->monthly_installment= ($sale->sale_price-$sale->down_payment)/$sale->no_of_installments;
        $installment->receiving_date= $request->date;
        $sale->discount=$request->discount;
        $installment->status= 1;
        $installment->save();

        $voucher=new Voucher();
        $voucher->type='CRV';
        $voucher->debit=$request->receive_amount;
        $voucher->sale_id=$installment->sale_id;
        $voucher->account_id=1;
        $voucher->installment_id=$installment->id;
        $voucher->save();
//
        $donation_voucher=new Voucher();
        $donation_voucher->type='CPV';
        $donation_voucher->debit=2/100*$installment->receive_amount;
        $donation_voucher->sale_id=$installment->sale_id;
        $donation_voucher->account_id=2;
        $donation_voucher->donation_voucher=1;
        $donation_voucher->save();

        $installments = Installment::where('sale_id', $sale->id)->get();
        return view('admin.installments.edit',compact('sale','installments'));

    }
    public function destroy(Installment $installment)
    {
//        abort_unless(\Gate::allows('event_delete'), 403);
        $installment->delete();
        return redirect()->route('admin.installments.index');
    }

    public function show($id)
    {
        $installment = Installment::where('id', $id)->first();
        return view('admin.installments.show', compact('installment'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Installment;
use App\Sale;
use App\Tenant;
use App\Unit;
use App\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index()
    {
//        abort_unless(\Gate::allows('event_access'), 403);
        $sales=Sale::where('status',3)->get();
        return view('admin.sales.index', compact('sales'));
    }
    public function create()
    {
//        abort_unless(\Gate::allows('event_create'), 403);
//        $status=Status::get();
        $sales=Sale::get();
        $units=Unit::where('status',7)->get();
        $tenants=Tenant::all();
        $agents=Tenant::where('is_agent',1)->get();
        return view('admin.sales.create',compact('sales','units','tenants','agents'));
    }
    public function store(Request $request)
    {


        $sales=new Sale();
        $sales->unit_id=$request->unit_id;
        $sales->tenant_id=$request->tenant_id;
        $sales->agent_id=$request->agent_id;
        $sales->agent_Commission=$request->agent_Commission;
        $sales->down_payment = $request->down_payment;
        $sales->sale_price= $request->sale_price;
        $sales->no_of_installments= $request->no_of_installments;
        $sales->guarantor_1= $request->guarantor_1;
        $sales->guarantor_2= $request->guarantor_2;
        $sales->date= $request->date;
        $sales->status=3;
        $sales->save();

        $unit=new Unit();
        $unit=Unit::where('id',$request->unit_id)->first();
        $unit->status=1;
        $unit->save();

        $voucher=new Voucher();
        $voucher->type='CRV';
        $voucher->debit=$request->down_payment;
        $voucher->sale_id=$sales->id;
        $voucher->account_id=1;
        $voucher->save();

        $donation_voucher=new Voucher();
        $donation_voucher->type='CPV';
        $donation_voucher->debit=2/100*$sales->down_payment;
        $donation_voucher->sale_id=$sales->id;
        $donation_voucher->account_id=2;
        $donation_voucher->donation_voucher=1;
        $donation_voucher->save();
        return redirect()->route('admin.sales.index');

    }
    public function edit($id)
    {

//        abort_unless(\Gate::allows('event_edit'), 403);
//        $status=Status::get();
        $units=Unit::get();
        $tenants=Tenant::all();
        $sale=new Sale();
        $sale = Sale::where('id', $id)->first();
        $agents=Tenant::where('is_agent',1)->get();
//        dd($id);

        return view('admin.sales.edit',compact('sale','units','tenants','agents'));
    }
    public function update(Sale $sales,Request $request)
    {

//        $tenant->name = $request->name;
//        $tenant->father_name= $request->father_name;
//
//        $tenant->cnic_no= $request->cnic_no;
//        $tenant->mobile_no=$request->mobile_no;
//        $tenant->telephone_no=$request->telephone_no;
//        $tenant->address=$request->address;

        $sales->unit_id=$request->unit_id;
        $sales->tenant_id=$request->tenant_id;
        $sales->agent_id=$request->agent_id;
        $sales->agent_Commission=$request->agent_Commission;
        $sales->down_payment = $request->down_payment;
        $sales->sale_price= $request->sale_price;
        $sales->no_of_installments= $request->no_of_installments;
        $sales->guarantor_1= $request->guarantor_1;
        $sales->guarantor_2= $request->guarantor_2;
        $sales->date= $request->date;
        $sales->status='Sold';
        $sales->save();
//        if($files=$request->file('image')){
//            foreach($files as $key=>$file){
//                $name=$file->getClientOriginalName();
//                $file->move('public/uploads/tenants',$name);
//                $images[]=$name;
//
//                $media=new Media();
//                $media->tenant_id=$tenant->id;
//                $media->picture=$name;
//                $media->media_type=1;
//                $media->save();
//
//                if($key==0)
//                {
//                    $tenant->image=$name ;
//                    $tenant->save();
//                }
//
//            }
//        }
        return redirect()->route('admin.sales.index');

    }
    public function destroy(Sale $sale, Request $request)
    {
//        abort_unless(\Gate::allows('event_delete'), 403);
       $sale->status=8;
       $sale->save();

       $unit=Unit::where('id',$sale->unit_id)->first();
       $unit->status=7;
       $unit->save();

       Voucher::where('sale_id',$sale->id )->update(['status' => 8]);
       Installment::where('sale_id',$sale->id )->update(['status' => 8]);

       return redirect()->route('admin.sales.index');
    }

    public function show($id)
    {

        $sales = Sale::where('id', $id)->first();
        $installments=Installment::where('sale_id',$id)->get();

        return view('admin.sales.show', compact('sales','installments'));
    }
    public function salereport ($id)
    {
        $sales = Sale::where('id', $id)->first();
        return view('admin.sales.sale-report', compact('sales','installments'));
    }

}

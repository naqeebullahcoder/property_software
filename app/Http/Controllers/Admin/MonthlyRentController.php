<?php

namespace App\Http\Controllers\Admin;
use App\Event;
use App\MonthlyRent;
use App\Project;
use App\RentalUnit;
use App\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Status;
use App\Media;
use Illuminate\Support\Facades\Auth;

class MonthlyRentController extends Controller
{
    //
    public function index()
    {
//        abort_unless(\Gate::allows('event_access'), 403);
        $monthly_rents=MonthlyRent::orderby('id','DESC')->get();

        return view('admin.monthlyrents.index', compact('monthly_rents'));
    }
    public function create()
    {
//        abort_unless(\Gate::allows('event_create'), 403);
//        $status=Status::get();
        $rental_unit_ids=RentalUnit::where('status',6)->select('unit_id')->get();
        $projects=Project::all();
        $units=Unit::wherein('id',$rental_unit_ids)->get();
        return view('admin.monthlyrents.create',compact('units','projects'));
    }
    public function store(Request $request)
    {

        if($request->unit_id!=null)
        {
            $rental_units=RentalUnit::where('unit_id',$request->unit_id)->where('status',6)->first();
            $check=MonthlyRent::where('unit_id',$request->unit_id)->where('month',$request->month)->first();
            if(empty($check))
            {
                $monthly_rent=new MonthlyRent();
                $monthly_rent->month=$request->month;
                $monthly_rent->monthly_rent=$rental_units->monthly_rent;
                $monthly_rent->tenant_id=$rental_units->tenant_id;
                $monthly_rent->unit_id=$rental_units->unit_id;
                $monthly_rent->save();
            }
        }
        else
        {
            $rental_unit_ids=RentalUnit::where('status',6)->where('project_id',$request->project_id)->distinct('unit_id')->get();
            foreach($rental_unit_ids as $rental_unit_id)
            {
                $check=MonthlyRent::where('unit_id',$rental_unit_id)->where('month',$request->month)->first();
                if(empty($check))
                {
                    $monthly_rent=new MonthlyRent();
                    $monthly_rent->month=$request->month;
                    $monthly_rent->monthly_rent=$rental_unit_id->monthly_rent;
                    $monthly_rent->tenant_id=$rental_unit_id->tenant_id;
                    $monthly_rent->unit_id=$rental_unit_id->unit_id;
                    $monthly_rent->save();
                }
            }
        }


        return redirect()->route('admin.monthlyrents.index');

    }
    public function edit($id)
    {

//        abort_unless(\Gate::allows('event_edit'), 403);
        $monthly_rent=MonthlyRent::where('id',$id)->first();
//
        return view('admin.monthlyrents.edit',compact('monthly_rent'));
    }

    public function update($id,Request $request)
    {
//        $project=new Project();
        $monthly_rent=MonthlyRent::where('id',$id)->first();
        $monthly_rent->received_payment = $request->received_payment;
        $monthly_rent->payment_date= $request->payment_date;
        $monthly_rent->receipt_number= $request->receipt_number;

        $monthly_rent->status= 1;
        $monthly_rent->save();
        return redirect()->route('admin.monthlyrents.index');

    }

    public function destroy($id)
    {
        $monthly_rent=MonthlyRent::where('id',$id)->where('status',2)->first();
//        abort_unless(\Gate::allows('event_delete'), 403);
            $monthly_rent->delete();


        return redirect()->route('admin.monthlyrents.index');
    }

    public function show($id)
    {
        $monthly_rent=MonthlyRent::where('id',$id)->first();
        return view('admin.monthlyrents.show',compact('monthly_rent'));
//
    }


}

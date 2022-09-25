<?php

namespace App\Http\Controllers\Admin;
use App\Event;
use App\Project;
use App\RentalUnit;
use App\Tenant;
use App\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Status;
use App\Media;
use Illuminate\Support\Facades\Auth;

class RenatlUnitController extends Controller
{
    //
    public function index()
    {
//        abort_unless(\Gate::allows('event_access'), 403);
        $rental_units=RentalUnit::all();
        return view('admin.rentalunits.index', compact('rental_units'));
    }
    public function create()
    {
//        abort_unless(\Gate::allows('event_create'), 403);
//        $status=Status::get();
        $projects=Project::all();
        $units=Unit::where('status','!=',6)->get();
        $tenants=Tenant::all();
        return view('admin.rentalunits.create',compact('projects','units','tenants'));
    }
    public function store(Request $request)
    {
        $rental_unit=new RentalUnit();
        $rental_unit->project_id = $request->project_id;
        $rental_unit->tenant_id= $request->tenant_id;

        $rental_unit->unit_id= $request->unit_id;
        $rental_unit->monthly_rent=$request->monthly_rent;
        $rental_unit->maintenace=$request->maintenace;
        $rental_unit->business_type=$request->business_type;
        $rental_unit->remarks=$request->remarks;
        $rental_unit->security=$request->security;
        $rental_unit->receipt_number=$request->receipt_number;
        $rental_unit->allotment_date=$request->allotment_date;
        $rental_unit->status=6;
        $rental_unit->save();
        Unit::where('id',$rental_unit->unit_id)->update(['status' => 6]);
        return redirect()->route('admin.rentalunits.index');

    }
    public function edit($id)
    {
//        abort_unless(\Gate::allows('event_edit'), 403);
        $status=Status::all();
        $projects=Project::all();
        $units=Unit::all();
        $tenants=Tenant::all();
        $rental_unit=new RentalUnit();
        $rental_unit = RentalUnit::where('id', $id)->first();
        return view('admin.rentalunits.edit',compact('rental_unit','projects','units','tenants','status'));
    }
    public function update(RentalUnit $rentalunit,Request $request)
    {
//        $project=new Project();

        $rentalunit->project_id = $request->project_id;
        $rentalunit->tenant_id= $request->tenant_id;

        $rentalunit->unit_id= $request->unit_id;
        $rentalunit->monthly_rent=$request->monthly_rent;
        $rentalunit->maintenace=$request->maintenace;
        $rentalunit->status=$request->status;
        $rentalunit->business_type=$request->business_type;
        $rentalunit->remarks=$request->remarks;
        $rentalunit->security=$request->security;
        $rentalunit->receipt_number=$request->receipt_number;
        $rentalunit->allotment_date=$request->allotment_date;
        $rentalunit->updated_by=Auth::user()->id;
        $rentalunit->save();
        Unit::where('id',$rentalunit->unit_id)->update(['status' => $rentalunit->status]);
        return redirect()->route('admin.rentalunits.index');

    }

    public function show(RentalUnit $rentalunit)
    {
//        abort_unless(\Gate::allows('event_show'), 403);
//        $rentalunit->show();
        return view('admin.rentalunits.show',compact('rentalunit'));
//        return view('admin.doctors.show',compact('doctor','media'));
    }
    public function destroy(RentalUnit $rentalunit)
    {

//        abort_unless(\Gate::allows('event_delete'), 403);
        $rentalunit->delete();
        return redirect()->route('admin.rentalunits.index');
    }

}

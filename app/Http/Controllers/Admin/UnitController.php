<?php

namespace App\Http\Controllers\Admin;
use App\Event;
use App\Floor;
use App\Project;
use App\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Status;
use App\Media;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    //
    public function index()
    {
//        abort_unless(\Gate::allows('event_access'), 403);
        $units=Unit::all();
        return view('admin.units.index', compact('units'));
    }
    public function create()
    {
//        abort_unless(\Gate::allows('event_create'), 403);
//        $status=Status::get();
        $projects=Project::all();
        $floors=Floor::all();
        return view('admin.units.create',compact('projects','floors'));
    }

    public function store(Request $request)
    {
        $unit=new Unit();
        $unit->unit_name = $request->unit_name;
        $unit->project_id= $request->project_id;
        $unit->meter_no=$request->meter_no;
        $unit->floor_id= $request->floor;
        $unit->area_sq=$request->area_sq;
        $unit->dimension=$request->dimension;
        $unit->price_per_sq=$request->price_per_sq;
        $unit->maintenace_per_sq=$request->maintenace_per_sq;
        $unit->corner_plot=$request->corner_plot;
        $unit->status=7;
        $unit->save();

        return redirect()->route('admin.units.index');

    }
    public function edit($id)
    {
//        abort_unless(\Gate::allows('event_edit'), 403);
//        $status=Status::get();
        $units=new Unit();
        $projects =Project::all();
        $floors=Floor::all();
        $unit = Unit::where('id', $id)->first();

        return view('admin.units.edit',compact('unit','projects','floors'));
    }

    public function update(Unit $unit,Request $request)
    {
//        $project=new Project();
        $unit->unit_name = $request->unit_name;
        $unit->project_id= $request->project_id;

        $unit->floor_id= $request->floor_id;
        $unit->meter_no=$request->meter_no;
        $unit->area_sq=$request->area_sq;
        $unit->price_per_sq=$request->price_per_sq;
        $unit->dimension=$request->dimension;
        $unit->maintenace_per_sq=$request->maintenace_per_sq;
        $unit->corner_plot=$request->corner_plot;
        $unit->save();
        return redirect()->route('admin.units.index');

    }
    public function destroy(Unit $unit)
    {
//        abort_unless(\Gate::allows('event_delete'), 403);
        $unit->delete();
        return redirect()->route('admin.units.index');
    }
    public function show(unit $unit)
    {
        return view('admin.units.show', compact('unit'));

    }

}

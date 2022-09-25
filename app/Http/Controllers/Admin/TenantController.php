<?php

namespace App\Http\Controllers\Admin;
use App\Event;
use App\Floor;
use App\Project;
use App\Tenant;
use App\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\News;
use App\Status;
use App\Media;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    //
    public function index()
    {
//        abort_unless(\Gate::allows('event_access'), 403);
        $tenants=Tenant::all();
        return view('admin.tenants.index', compact('tenants'));
    }
    public function create()
    {
//        abort_unless(\Gate::allows('event_create'), 403);
//        $status=Status::get();
        return view('admin.tenants.create');
    }
    public function store(Request $request)
    {
        $tenant=new Tenant();
        $tenant->name = $request->name;
        $tenant->father_name= $request->father_name;

        $tenant->cnic_no= $request->cnic_no;
        $tenant->mobile_no=$request->mobile_no;
        $tenant->telephone_no=$request->telephone_no;
        $tenant->address=$request->address;
        $tenant->is_agent=$request->is_agent;
        $tenant->save();
        if($files=$request->file('image')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/tenants',$name);
                $images[]=$name;

                $media=new Media();
                $media->tenant_id=$tenant->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $tenant->image=$name ;
                    $tenant->save();
                }

            }
        }
        return redirect()->route('admin.tenants.index');

    }
    public function edit($id)
    {
//        abort_unless(\Gate::allows('event_edit'), 403);
//        $status=Status::get();
        $units=new Unit();
        $tenant = Tenant::where('id', $id)->first();
        return view('admin.tenants.edit',compact('tenant'));
    }
    public function update(Tenant $tenant,Request $request)
    {

        $tenant->name = $request->name;
        $tenant->father_name= $request->father_name;

        $tenant->cnic_no= $request->cnic_no;
        $tenant->mobile_no=$request->mobile_no;
        $tenant->telephone_no=$request->telephone_no;
        $tenant->address=$request->address;
        $tenant->is_agent=$request->is_agent;
        $tenant->save();
        if($files=$request->file('image')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/tenants',$name);
                $images[]=$name;

                $media=new Media();
                $media->tenant_id=$tenant->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $tenant->image=$name ;
                    $tenant->save();
                }

            }
        }
        return redirect()->route('admin.tenants.index');

    }
    public function destroy(Tenant $tenant)
    {
//        abort_unless(\Gate::allows('event_delete'), 403);
        $tenant->delete();
        return redirect()->route('admin.tenants.index');
    }

    public function show(Tenant $tenant)
    {
        return view('admin.tenants.show', compact('tenant'));
    }

}

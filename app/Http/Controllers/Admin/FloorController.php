<?php

namespace App\Http\Controllers\Admin;

use App\Floor;
use App\Media;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Program;
use App\Faculties;
use App\DepartmentUser;
use App\FacultyMembers;
use Illuminate\Support\Facades\Auth;

class FloorController extends Controller
{
    //
    public function index()
    {
//        abort_unless(\Gate::allows('event_access'), 403);
        $floors=Floor::all();
        return view('admin.floors.index', compact('floors'));
    }
    public function create()
    {
//        abort_unless(\Gate::allows('event_create'), 403);
        $projects=Project::all();

        return view('admin.floors.create',compact('projects'));
    }
    public function store(Request $request)
    {
        $floor=new Floor();
        $floor->floor_name = $request->floor_name;
        $floor->project_id= $request->project_id;
        $floor->save();
        if($files=$request->file('image')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/floors',$name);
                $images[]=$name;

                $media=new Media();
                $media->floor_id=$floor->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $floor->image=$name ;
                    $floor->save();
                }

            }
        }

        return redirect()->route('admin.floors.index');

    }
    public function edit($id)
    {
//        abort_unless(\Gate::allows('event_edit'), 403);
//        $status=Status::get();
        $projects=Project::all();
        $floor=new Floor();
        $floor = Floor::where('id', $id)->first();
        return view('admin.floors.edit',compact('projects','floor'));
    }
    public function update(Floor $floor,Request $request)
    {
//        $project=new Project();
        $floor->floor_name = $request->floor_name;
        $floor->project_id= $request->project_id;
        $floor->save();
        if($files=$request->file('image')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/floors',$name);
                $images[]=$name;

                $media=new Media();
                $media->floor_id=$floor->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $floor->image=$name ;
                    $floor->save();
                }

            }
        }
        return redirect()->route('admin.floors.index');

    }
    public function destroy(Floor $floor)
    {
//        abort_unless(\Gate::allows('event_delete'), 403);
        $floor->delete();
        return redirect()->route('admin.floors.index');
    }

    public function show(Floor $floor)
    {
        return view('admin.floors.show', compact('floor'));
    }

}

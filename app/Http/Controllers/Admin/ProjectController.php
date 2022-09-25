<?php

namespace App\Http\Controllers\Admin;
use App\Event;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Status;
use App\Media;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //
    public function index()
    {
//        abort_unless(\Gate::allows('event_access'), 403);
        $projects=Project::all();
        return view('admin.projects.index', compact('projects'));
    }
    public function create()
    {
//        abort_unless(\Gate::allows('event_create'), 403);
//        $status=Status::get();
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $project=new Project();
        $project->project_name = $request->project_name;
        $project->no_of_units= $request->no_of_units;

        $project->location= $request->location;
        $project->no_of_floors=$request->no_of_floors;
        $project->save();
        if($files=$request->file('image')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/projects',$name);
                $images[]=$name;

                $media=new Media();
                $media->project_id=$project->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $project->image=$name ;
                    $project->save();
                }

            }
        }
        return redirect()->route('admin.projects.index');

    }
    public function edit($id)
    {
//        abort_unless(\Gate::allows('event_edit'), 403);
//        $status=Status::get();
        $project=new Project();
        $project = Project::where('id', $id)->first();
        return view('admin.projects.edit',compact('project'));
    }
    public function update(Project $project,Request $request)
    {
//        $project=new Project();
        $project->project_name = $request->project_name;
        $project->no_of_units= $request->no_of_units;

        $project->location= $request->location;
        $project->no_of_floors=$request->no_of_floors;
        $project->save();
        if($files=$request->file('image')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/projects',$name);
                $images[]=$name;

                $media=new Media();
                $media->project_id=$project->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $project->image=$name ;
                    $project->save();
                }

            }
        }
        return redirect()->route('admin.projects.index');

    }
    public function destroy(Project $project)
    {
//        abort_unless(\Gate::allows('event_delete'), 403);
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
//        abort_unless(\Gate::allows('event_show'), 403);
//        $rentalunit->show();
//        dd($service);
        return view('admin.projects.show',compact('project'));
//        return view('admin.doctors.show',compact('doctor','media'));
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Document;
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

class DocumentController extends Controller
{
    //

    public function store(Request $request)
    {
        $document=new Document();
        $document->title = $request->title;
        $document->rental_unit_id= $request->rental_unit_id;
        $document->save();
        if($files=$request->file('image')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/documents',$name);
                $images[]=$name;

                $media=new Media();
                $media->document_id=$document->id;
                $media->picture=$name;
                $media->media_type=2;
                $media->save();

                if($key==0)
                {
//                    $project->image=$name ;
//                    $project->save();
                }

            }
        }

        $projects=Project::all();
        $units=Unit::all();
        $tenants=Tenant::all();
        $status=Status::all();
        $rental_unit=RentalUnit::where('id',$document->rental_unit_id)->first();
        return view('admin.rentalunits.edit',compact('rental_unit','projects','units','tenants','status'));
//        return redirect()->route('admin.rentalunits.index');

    }
    public function edit($id)
    {
        $projects=Project::all();
        $units=Unit::all();
        $tenants=Tenant::all();
        $status=Status::all();
        $document=Document::where('id',$id)->first();
        $rental_unit=RentalUnit::where('id',$document->rental_unit_id)->first();
        return view('admin.rentalunits.edit',compact('document','rental_unit','projects','units','tenants','status'));
    }
    public function update($id, Request $request)
    {
        $document=Document::where('id',$id)->first();
        $document->title = $request->title;
        $document->rental_unit_id= $request->rental_unit_id;
        $document->save();
        if($files=$request->file('image')){
            Media::where('document_id',$id)->delete();
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/documents',$name);
                $images[]=$name;

                $media=new Media();
                $media->document_id=$document->id;
                $media->picture=$name;
                $media->media_type=2;
                $media->save();

                if($key==0)
                {
//                    $project->image=$name ;
//                    $project->save();
                }

            }
        }
        $projects=Project::all();
        $units=Unit::all();
        $tenants=Tenant::all();
        $status=Status::all();
        $rental_unit=RentalUnit::where('id',$document->rental_unit_id)->first();
        return view('admin.rentalunits.edit',compact('rental_unit','projects','units','tenants','status'));

    }
    public function destroy($id)
    {
        $document=Document::where('id',$id)->first();
        $rental_unit=RentalUnit::where('id',$document->rental_unit_id)->first();
        $document_id=$document->id;
        $document->delete();
        Media::where('document_id',$document_id)->delete();
        $projects=Project::all();
        $units=Unit::all();
        $tenants=Tenant::all();
        $status=Status::all();

        return view('admin.rentalunits.edit',compact('rental_unit','projects','units','tenants','status'));


    }
}

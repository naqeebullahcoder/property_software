<?php

namespace App\Http\Controllers\Admin;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Status;
use App\Media;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    //
    public function index()
    {
        abort_unless(\Gate::allows('event_access'), 403);
        $events=Event::all();
        return view('admin.events.index', compact('events'));
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('event_create'), 403);
        $event=new Event();
        $event->title = $request->title;
        $event->description= $request->description;

        $event->video_link= $request->video_link;
        $event->date=$request->date;
        $event->status=$request->status;
        $event->updated_by=Auth::user()->id;
        $event->save();
        if($files=$request->file('picture')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/events',$name);
                $images[]=$name;

                $media=new Media();
                $media->event_id=$event->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $event->picture=$name ;
                    $event->save();
                }

            }
        }
        return redirect()->route('admin.events.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('event_create'), 403);
        $status=Status::get();
        return view('admin.events.create',compact('status'));
    }
    public function edit($id)
    {
        abort_unless(\Gate::allows('event_edit'), 403);
        $status=Status::get();
        $event=new Event();
        $event = Event::where('id', $id)->first();
        return view('admin.events.edit',compact('event','status'));
    }
    public function update(Event $event,Request $request)
    {
        abort_unless(\Gate::allows('event_edit'), 403);
        $event->title = $request->title;
        $event->description= $request->description;

        $event->video_link= $request->video_link;
        $event->date=$request->date;
        $event->status=$request->status;
        $event->updated_by=Auth::user()->id;
        $event->save();
        if($files=$request->file('picture')){
            Media::where('event_id',$event->id)->delete();
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/events',$name);
                $images[]=$name;

                $media=new Media();
                $media->event_id=$event->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $event->picture=$name ;
                    $event->save();
                }

            }
        }
        return redirect()->route('admin.events.index');

    }
    public function destroy(Event $event)
    {
        abort_unless(\Gate::allows('event_delete'), 403);
        $event->delete();
        return redirect()->route('admin.events.index');
    }
    public function show(Event $event)
    {
        abort_unless(\Gate::allows('event_show'), 403);
        $media=Media::where('event_id',$event->id)->get();
        return view('admin.events.show',compact('event','media'));

    }

}

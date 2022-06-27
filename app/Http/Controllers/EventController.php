<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = \App\Models\Event::all();
        return view('admin.event.index_event')->with('Event',Event::all());
    }

    public function indexx()
    {
        $event = \App\Models\Event::all();
        return view('event')->with('Event',Event::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.add_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $event = new Event();
        $event ->event_title = $request->event_title;
        $event ->event_description = $request->event_description;
        $event ->event_date = $request->event_date;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $event->image=$filename;}
        $event ->save();
        return redirect('admin_home/index_event')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'event_title'      => 'required|max:25',
            'event_description'       => 'required|max:25',
            'event_date'           => 'required',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'event_title.required'      => __('Title of the event is required'),
            'event_description.required'       => __('Description of the event is required'),
            'event_date.required' => __('Date of the event is required'),
            'image.required'         => __('Image of the event is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $event = Event::find($event);
        return view('admin.event.edit_event')->with('Event',Event::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$event)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $event = Event::find($event);
        $event ->event_title = $request->event_title;
        $event ->event_description = $request->event_description;
        $event ->event_date = $request->event_date;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $event->image=$filename;}
        $event ->save();
        return redirect('admin_home/index_event')->with(['success'=> __('Inserted successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($event)
    {
        $event = Event::find($event);
        Storage::disk('public')->delete($event->image);
        $event->delete();
        return redirect('/admin_home/index_event')->with(['success'=> __('Evemt Deleted successfuly')]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Oet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class OetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oet = \App\Models\Oet::all();
        return view('admin.OET.index_oet')->with('Oet',Oet::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.OET.add_oet_course');
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
        $oet = new Oet();
        $oet ->oet_course_name = $request->oet_course_name;
        $oet ->oet_course_description = $request->oet_course_description;
        $oet ->oet_course_price = $request->oet_course_price;
        $oet ->oet_course_teacher_name = $request->oet_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $oet->image=$filename;}
        $oet ->save();
        return redirect('admin_home/index_oet')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'oet_course_name'      => 'required|max:25',
            'oet_course_description'       => 'required|max:25',
            'oet_course_price'           => 'required|numeric',
            'oet_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages = [
            'oet_course_name.required' => __('Course name of the OET is required'),
            'oet_course_description.required' => __('Description of the OET course is required'),
            'oet_course_price.required' => __('Price of the OET course is required'),
            'oet_course_teacher_name.required' => __('Name of the OET course is required'),
            'image.required' => __('Image of the OET course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oet  $oet
     * @return \Illuminate\Http\Response
     */
    public function show(Oet $oet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oet  $oet
     * @return \Illuminate\Http\Response
     */
    public function edit(Oet $oet)
    {
        $oet = Oet::find($oet);
        return view('admin.OET.edit_oet_course')->with('Oet',Oet::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oet  $oet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$oet)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $oet = Oet::find($oet);
        $oet ->oet_course_name = $request->oet_course_name;
        $oet ->oet_course_description = $request->oet_course_description;
        $oet ->oet_course_price = $request->oet_course_price;
        $oet ->oet_course_teacher_name = $request->oet_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $oet->image=$filename;}
        $oet ->save();
        return redirect('admin_home/index_oet')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oet  $oet
     * @return \Illuminate\Http\Response
     */
    public function destroy($oet)
    {
        $oet = Oet::find($oet);
        Storage::disk('public')->delete($oet->image);
        $oet->delete();
        return redirect('/admin_home/index_oet')->with(['success'=> __('OET Deleted successfuly')]);
    }
}

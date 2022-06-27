<?php

namespace App\Http\Controllers;

use App\Models\General_English;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GeneralEnglishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general_English = \App\Models\General_English::all();
        return view('admin.General_English.index_general_english')->with('General_English',General_English::all());
    }


    public function indexx()
    {
        $general_English = \App\Models\General_English::all();
        return view('Project.General_English')->with('General_English',General_English::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.General_English.add_general_english_course');
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
        $general_English = new General_English();
        $general_English ->general_english_course_name = $request->general_english_course_name;
        $general_English ->general_english_course_description = $request->general_english_course_description;
        $general_English ->general_english_course_price = $request->general_english_course_price;
        $general_English ->general_english_course_teacher_name = $request->general_english_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $general_English->image=$filename;}
        $general_English ->save();
        return redirect('admin_home/index_general_english')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'general_english_course_name'      => 'required|max:25',
            'general_english_course_description'       => 'required|max:25',
            'general_english_course_price'           => 'required|numeric',
            'general_english_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'general_english_course_name.required'      => __('Course name of the General English is required'),
            'general_english_course_description.required'       => __('Description of the General English course is required'),
            'general_english_course_price.required' => __('Price of the General English course is required'),
            'general_english_course_teacher_name.required'         => __('Name of the General English course is required'),
            'image.required'         => __('Image of the General English course is required'),
        ];
        return $messages;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\General_English  $general_English
     * @return \Illuminate\Http\Response
     */
    public function show(General_English $general_English)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\General_English  $general_English
     * @return \Illuminate\Http\Response
     */
    public function edit( $general_English)
    {
        $general_English = General_English::find($general_English);
        return view('admin.General_English.edit_general_english_course')->with('General_English',General_English::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\General_English  $general_English
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $general_English)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $general_English = General_English::find($general_English);
        $general_English ->general_english_course_name = $request->general_english_course_name;
        $general_English ->general_english_course_price = $request->general_english_course_price;
        $general_English ->general_english_course_teacher_name = $request->general_english_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $general_English->image=$filename;}
        $general_English ->save();
        return redirect('admin_home/index_general_english')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\General_English  $general_English
     * @return \Illuminate\Http\Response
     */
    public function destroy( $general_English)
    {
        $general_English = General_English::find($general_English);
        Storage::disk('public')->delete($general_English->image);
        $general_English->delete();
        return redirect('/admin_home/index_general_english')->with(['success'=> __('General English Deleted successfuly')]);
    }
}

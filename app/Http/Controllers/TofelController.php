<?php

namespace App\Http\Controllers;

use App\Models\Tofel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TofelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $tofel = \App\Models\Tofel::all();
        return view('admin.TOFEL.index_tofel')->with('Tofel',Tofel::all());
    }

    public function indexx()
    {
        $tofel = \App\Models\Tofel::all();
        return view('Project.Professional_Courses.TOFEL')->with('Tofel',Tofel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.TOFEL.add_tofel_course');
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
        $tofel = new Tofel();
        $tofel ->tofel_course_name = $request->tofel_course_name;
        $tofel ->tofel_course_description = $request->tofel_course_description;
        $tofel ->tofel_course_price = $request->tofel_course_price;
        $tofel ->tofel_course_teacher_name = $request->tofel_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $tofel->image=$filename;}
        $tofel ->save();
        return redirect('admin_home/index_tofel')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'tofel_course_name'      => 'required|max:25',
            'tofel_course_description'       => 'required|max:25',
            'tofel_course_price'           => 'required|numeric',
            'tofel_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'tofel_course_name.required'      => __('Course name of the TOFEL is required'),
            'tofel_course_description.required'       => __('Description of the TOFEL course is required'),
            'tofel_course_price.required' => __('Price of the TOFEL course is required'),
            'tofel_course_teacher_name.required'         => __('Name of the TOFEL course is required'),
            'image.required'         => __('Image of the TOFEL course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tofel  $tofel
     * @return \Illuminate\Http\Response
     */
    public function show(Tofel $tofel)
    {
       //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tofel  $tofel
     * @return \Illuminate\Http\Response
     */
    public function edit(Tofel $tofel)
    {
        $tofel = Tofel::find($tofel);
        return view('admin.TOFEL.edit_tofel_course')->with('Tofel',Tofel::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tofel  $tofel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tofel)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $tofel = Tofel::find($tofel);
        $tofel ->tofel_course_name = $request->tofel_course_name;
        $tofel ->tofel_course_description = $request->tofel_course_description;
        $tofel ->tofel_course_price = $request->tofel_course_price;
        $tofel ->tofel_course_teacher_name = $request->tofel_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $tofel->image=$filename;}
        $tofel ->save();
        return redirect('admin_home/index_tofel')->with(['success'=> __('Inserted successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tofel  $tofel
     * @return \Illuminate\Http\Response
     */
    public function destroy($tofel)
    {
        $tofel = Tofel::find($tofel);
        Storage::disk('public')->delete($tofel->image);
        $tofel->delete();
        return redirect('/admin_home/index_tofel')->with(['success'=> __('TOFEL Deleted successfuly')]);
    }
}

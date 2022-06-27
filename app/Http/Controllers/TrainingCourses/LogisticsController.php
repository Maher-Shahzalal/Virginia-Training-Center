<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\Logistics;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LogisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logistics = \App\Models\TrainingCourses\Logistics::all();
        return view('admin.Training_courses.Logistics.index_logistics')->with('Logistics',Logistics::all());
    }


    public function indexx()
    {
        $logistics  = \App\Models\TrainingCourses\Logistics::all();
        return view('Project.Training_courses.Logistics')->with('Logistics',Logistics::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.Logistics.add_logistics_course');
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
        $logistics  = new Logistics();
        $logistics  ->logistics_course_name = $request->logistics_course_name;
        $logistics  ->logistics_course_description = $request->logistics_course_description;
        $logistics  ->logistics_course_price = $request->logistics_course_price;
        $logistics  ->logistics_course_teacher_name = $request->logistics_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $logistics->image=$filename;}
        $logistics ->save();
        return redirect('admin_home/index_logistics')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'logistics_course_name'      => 'required|max:25',
            'logistics_course_description'       => 'required|max:25',
            'logistics_course_price'           => 'required|numeric',
            'logistics_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'logistics_course_name.required'      => __('Course name of the Logistics is required'),
            'logistics_course_description.required'       => __('Description of the Logistics course is required'),
            'logistics_course_price.required' => __('Price of the Logistics course is required'),
            'logistics_course_teacher_name.required'         => __('Name of the Logistics course is required'),
            'image.required'         => __('Image of the Logistics course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function show(Logistics $logistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function edit( $logistics)
    {
        $logistics = Logistics::find($logistics);
        return view('admin.Training_courses.logistics.edit_logistics_course')->with('Logistics',Logistics::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $logistics)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $logistics = Logistics::find($logistics);
        $logistics ->logistics_course_name = $request->logistics_course_name;
        $logistics ->logistics_course_price = $request->logistics_course_price;
        $logistics ->logistics_course_teacher_name = $request->logistics_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $logistics->image=$filename;}
        $logistics ->save();
        return redirect('admin_home/index_logistics')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logistics  $logistics
     * @return \Illuminate\Http\Response
     */
    public function destroy( $logistics)
    {
        $logistics = Logistics::find($logistics);
        Storage::disk('public')->delete($logistics->image);
        $logistics->delete();
        return redirect('/admin_home/index_logistics')->with(['success'=> __('Logistics Deleted successfuly')]);
    }
}

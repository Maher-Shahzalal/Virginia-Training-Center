<?php

namespace App\Http\Controllers\TrainingCourses;

use App\Models\TrainingCourses\Business_ethics;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BusinessEthicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business_ethics = \App\Models\TrainingCourses\Business_ethics::all();
        return view('admin.Training_courses.business_ethics.index_business_ethics')->with('Business_ethics',Business_ethics::all());
    }


    public function indexx()
    {
        $business_ethics = \App\Models\TrainingCourses\Business_ethics::all();
        return view('Project.Training_courses.Business_ethics')->with('Business_ethics',Business_ethics::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.business_ethics.add_business_ethics_course');
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
        $business_ethics = new Business_ethics();
        $business_ethics ->business_ethics_course_name = $request->business_ethics_course_name;
        $business_ethics ->business_ethics_course_description = $request->business_ethics_course_description;
        $business_ethics ->business_ethics_course_price = $request->business_ethics_course_price;
        $business_ethics ->business_ethics_course_teacher_name = $request->business_ethics_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $business_ethics->image=$filename;}
        $business_ethics ->save();
        return redirect('admin_home/index_business_ethics')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'business_ethics_course_name'      => 'required|max:25',
            'business_ethics_course_description'       => 'required|max:25',
            'business_ethics_course_price'           => 'required|numeric',
            'business_ethics_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'business_ethics_course_name.required'      => __('Course name of the IELTS is required'),
            'business_ethics_course_description.required'       => __('Description of the IELTS course is required'),
            'business_ethics_course_price.required' => __('Price of the IELTS course is required'),
            'business_ethics_course_teacher_name.required'         => __('Name of the IELTS course is required'),
            'image.required'         => __('Image of the IELTS course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business_ethics  $business_ethics
     * @return \Illuminate\Http\Response
     */
    public function show(Business_ethics $business_ethics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business_ethics  $business_ethics
     * @return \Illuminate\Http\Response
     */
    public function edit($business_ethics)
    {
        $business_ethics = Business_ethics::find($business_ethics);
        return view('admin.Training_courses.business_ethics.edit_business_ethics_course')->with('Business_ethics',Business_ethics::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business_ethics  $business_ethics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$business_ethics)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $business_ethics = Business_ethics::find($business_ethics);
        $business_ethics ->business_ethics_course_name = $request->business_ethics_course_name;
        $business_ethics ->business_ethics_course_description = $request->business_ethics_course_description;
        $business_ethics ->business_ethics_course_price = $request->business_ethics_course_price;
        $business_ethics ->business_ethics_course_teacher_name = $request->business_ethics_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $business_ethics->image=$filename;}
        $business_ethics ->save();
        return redirect('admin_home/index_business_ethics')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business_ethics  $business_ethics
     * @return \Illuminate\Http\Response
     */
    public function destroy($business_ethics)
    {
        $business_ethics = Business_ethics::find($business_ethics);
        Storage::disk('public')->delete($business_ethics->image);
        $business_ethics->delete();
        return redirect('/admin_home/index_business_ethics')->with(['success'=> __('Business Ethics Deleted successfuly')]);
    }
}

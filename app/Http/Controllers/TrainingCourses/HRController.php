<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\HR;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hR = \App\Models\TrainingCourses\HR::all();
        return view('admin.Training_courses.HR.index_hr')->with('HR',HR::all());
    }


    public function indexx()
    {
        $hR = \App\Models\TrainingCourses\HR::all();
        return view('Project.Training_courses.HR')->with('HR',HR::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.HR.add_hr_course');
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
        $hR = new HR();
        $hR ->hr_course_name = $request->hr_course_name;
        $hR ->hr_course_description = $request->hr_course_description;
        $hR ->hr_course_price = $request->hr_course_price;
        $hR ->hr_course_teacher_name = $request->hr_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $hR->image=$filename;}
        $hR ->save();
        return redirect('admin_home/index_hr')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'hr_course_name'      => 'required|max:25',
            'hr_course_description'       => 'required|max:25',
            'hr_course_price'           => 'required|numeric',
            'hr_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'hr_course_name.required'      => __('Course name of the HR is required'),
            'hr_course_description.required'       => __('Description of the HR course is required'),
            'hr_course_price.required' => __('Price of the HR course is required'),
            'hr_course_teacher_name.required'         => __('Name of the HR course is required'),
            'image.required'         => __('Image of the HR course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HR  $hR
     * @return \Illuminate\Http\Response
     */
    public function show(HR $hR)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HR  $hR
     * @return \Illuminate\Http\Response
     */
    public function edit( $hR)
    {
        $hR = HR::find($hR);
        return view('admin.Training_courses.HR.edit_hr_course')->with('HR',HR::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HR  $hR
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $hR)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $hR = HR::find($hR);
        $hR ->hr_course_name = $request->hr_course_name;
        $hR ->hr_course_price = $request->hr_course_price;
        $hR ->hr_course_teacher_name = $request->hr_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $hR->image=$filename;}
        $hR ->save();
        return redirect('admin_home/index_hr')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HR  $hR
     * @return \Illuminate\Http\Response
     */
    public function destroy( $hR)
    {
        $hR = HR::find($hR);
        Storage::disk('public')->delete($hR->image);
        $hR->delete();
        return redirect('/admin_home/index_hr')->with(['success'=> __('HR Deleted successfuly')]);
    }
}

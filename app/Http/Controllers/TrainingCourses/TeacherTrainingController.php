<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\Teacher_Training;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeacherTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher_Training = \App\Models\TrainingCourses\Teacher_Training::all();
        return view('admin.Training_courses.Teacher_Training.index_teacher_training')->with('Teacher_Training',Teacher_Training::all());
    }


    public function indexx()
    {
        $teacher_Training = \App\Models\TrainingCourses\Teacher_Training::all();
        return view('Project.Training_courses.Teacher_Training')->with('Teacher_Training',Teacher_Training::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.Teacher_Training.add_teacher_training_course');
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
        $teacher_Training = new Teacher_Training();
        $teacher_Training ->teacher_training_course_name = $request->teacher_training_course_name;
        $teacher_Training ->teacher_training_course_description = $request->teacher_training_course_description;
        $teacher_Training ->teacher_training_course_price = $request->teacher_training_course_price;
        $teacher_Training ->teacher_training_course_teacher_name = $request->teacher_training_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $teacher_Training->image=$filename;}
        $teacher_Training ->save();
        return redirect('admin_home/index_teacher_training')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'teacher_training_course_name'      => 'required|max:25',
            'teacher_training_course_description'       => 'required|max:25',
            'teacher_training_course_price'           => 'required|numeric',
            'teacher_training_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'teacher_training_course_name.required'      => __('Course name of the Teacher Training is required'),
            'teacher_training_course_description.required'       => __('Description of the Teacher Training course is required'),
            'teacher_training_course_price.required' => __('Price of the Teacher Training is required'),
            'teacher_training_course_teacher_name.required'         => __('Name of the Teacher Training course is required'),
            'image.required'         => __('Image of the Teacher Training course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher_Training  $teacher_Training
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher_Training $teacher_Training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher_Training  $teacher_Training
     * @return \Illuminate\Http\Response
     */
    public function edit( $teacher_Training)
    {
        $teacher_Training = Teacher_Training::find($teacher_Training);
        return view('admin.Training_courses.Teacher_Training.edit_teacher_training_course')->with('Teacher_Training',Teacher_Training::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher_Training  $teacher_Training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $teacher_Training)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $teacher_Training = Teacher_Training::find($teacher_Training);
        $teacher_Training ->teacher_training_course_name = $request->teacher_training_course_name;
        $teacher_Training ->teacher_training_course_description = $request->teacher_training_course_description;
        $teacher_Training ->teacher_training_course_price = $request->teacher_training_course_price;
        $teacher_Training ->teacher_training_course_teacher_name = $request->teacher_training_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $teacher_Training->image=$filename;}
        $teacher_Training ->save();
        return redirect('admin_home/index_teacher_training')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher_Training  $teacher_Training
     * @return \Illuminate\Http\Response
     */
    public function destroy( $teacher_Training)
    {
        $teacher_Training = Teacher_Training::find($teacher_Training);
        Storage::disk('public')->delete($teacher_Training->image);
        $teacher_Training->delete();
        return redirect('/admin_home/index_teacher_training')->with(['success'=> __('Teacher Training Deleted successfuly')]);
    }
}

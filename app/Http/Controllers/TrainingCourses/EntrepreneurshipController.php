<?php

namespace App\Http\Controller\TrainingCourses;


use App\Models\TrainingCourses\Entrepreneurship;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EntrepreneurshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $entrepreneurship = \App\Models\TrainingCourses\Entrepreneurship::all();
        return view('admin.Training_courses.entrepreneurship.index_entrepreneurship')->with('Entrepreneurship',Entrepreneurship::all());
    }


    public function indexx()
    {
        $entrepreneurship = \App\Models\TrainingCourses\Entrepreneurship::all();
        return view('Project.Training_courses.Entrepreneurship')->with('Entrepreneurship',Entrepreneurship::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.entrepreneurship.add_entrepreneurship_course');
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
        $entrepreneurship = new Entrepreneurship();
        $entrepreneurship ->entrepreneurship_course_name = $request->entrepreneurship_course_name;
        $entrepreneurship ->entrepreneurship_course_description = $request->entrepreneurship_course_description;
        $entrepreneurship ->entrepreneurship_course_price = $request->entrepreneurship_course_price;
        $entrepreneurship ->entrepreneurship_course_teacher_name = $request->entrepreneurship_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $entrepreneurship->image=$filename;}
        $entrepreneurship ->save();
        return redirect('admin_home/index_entrepreneurship')->with(['success'=> __('Inserted successfuly')]);
    }


    protected function getRules()
    {
        $rules =[
            'entrepreneurship_course_name'      => 'required|max:25',
            'entrepreneurship_course_description'       => 'required|max:25',
            'entrepreneurship_course_price'           => 'required|numeric',
            'entrepreneurship_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'entrepreneurship_course_name.required'      => __('Course name of the Entrepreneurship is required'),
            'entrepreneurship_course_description.required'       => __('Description of the Entrepreneurship course is required'),
            'entrepreneurship_course_price.required' => __('Price of the Entrepreneurship course is required'),
            'entrepreneurship_course_teacher_name.required'         => __('Name of the Entrepreneurship course is required'),
            'image.required'         => __('Image of the Entrepreneurship course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entrepreneurship  $entrepreneurship
     * @return \Illuminate\Http\Response
     */
    public function show(Entrepreneurship $entrepreneurship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entrepreneurship  $entrepreneurship
     * @return \Illuminate\Http\Response
     */
    public function edit( $entrepreneurship)
    {
        $entrepreneurship = Entrepreneurship::find($entrepreneurship);
        return view('admin.Training_courses.Entrepreneurship.edit_entrepreneurship_course')->with('Entrepreneurship',Entrepreneurship::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entrepreneurship  $entrepreneurship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $entrepreneurship)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $entrepreneurship = Entrepreneurship::find($entrepreneurship);
        $entrepreneurship ->entrepreneurship_course_name = $request->entrepreneurship_course_name;
        $entrepreneurship ->entrepreneurship_course_price = $request->entrepreneurship_course_price;
        $entrepreneurship ->entrepreneurship_course_teacher_name = $request->entrepreneurship_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $entrepreneurship->image=$filename;}
        $entrepreneurship ->save();
        return redirect('admin_home/index_entrepreneurship')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entrepreneurship  $entrepreneurship
     * @return \Illuminate\Http\Response
     */
    public function destroy( $entrepreneurship)
    {
        $entrepreneurship = Entrepreneurship::find($entrepreneurship);
        Storage::disk('public')->delete($entrepreneurship->image);
        $entrepreneurship->delete();
        return redirect('/admin_home/index_entrepreneurship')->with(['success'=> __('Entrepreneurship Deleted successfuly')]);
    }
}

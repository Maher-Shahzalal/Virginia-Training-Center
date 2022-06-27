<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\Innovation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InnovationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $innovation = \App\Models\TrainingCourses\Innovation::all();
        return view('admin.Training_courses.Innovation.index_innovation')->with('Innovation',Innovation::all());
    }


    public function indexx()
    {
        $innovation = \App\Models\TrainingCourses\Innovation::all();
        return view('Project.Training_courses.Innovation')->with('Innovation',Innovation::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.Innovation.add_innovation_course');
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
        $innovation = new Innovation();
        $innovation ->innovation_course_name = $request->innovation_course_name;
        $innovation ->innovation_course_description = $request->innovation_course_description;
        $innovation ->innovation_course_price = $request->innovation_course_price;
        $innovation ->innovation_course_teacher_name = $request->innovation_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $innovation->image=$filename;}
        $innovation ->save();
        return redirect('admin_home/index_innovation')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'innovation_course_name'      => 'required|max:25',
            'innovation_course_description'       => 'required|max:25',
            'innovation_course_price'           => 'required|numeric',
            'innovation_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'innovation_course_name.required'      => __('Course name of the Innovation is required'),
            'innovation_course_description.required'       => __('Description of the Innovation course is required'),
            'innovation_course_price.required' => __('Price of the Innovation course is required'),
            'innovation_course_teacher_name.required'         => __('Name of the Innovation course is required'),
            'image.required'         => __('Image of the Innovation course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Innovation  $innovation
     * @return \Illuminate\Http\Response
     */
    public function show(Innovation $innovation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Innovation  $innovation
     * @return \Illuminate\Http\Response
     */
    public function edit( $innovation)
    {
        $innovation = Innovation::find($innovation);
        return view('admin.Training_courses.Innovation.edit_innovation_course')->with('Innovation',Innovation::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Innovation  $innovation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $innovation)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $innovation = Innovation::find($innovation);
        $innovation ->innovation_course_name = $request->innovation_course_name;
        $innovation ->innovation_course_price = $request->innovation_course_price;
        $innovation ->innovation_course_teacher_name = $request->innovation_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $innovation->image=$filename;}
        $innovation ->save();
        return redirect('admin_home/index_innovation')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Innovation  $innovation
     * @return \Illuminate\Http\Response
     */
    public function destroy( $innovation)
    {
        $innovation = Innovation::find($innovation);
        Storage::disk('public')->delete($innovation->image);
        $innovation->delete();
        return redirect('/admin_home/index_innovation')->with(['success'=> __('Innovation Deleted successfuly')]);
    }
}

<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\Professional_Development;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfessionalDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professional_Development = \App\Models\TrainingCourses\Professional_Development::all();
        return view('admin.Training_courses.Professional_Development.index_professional_development')->with('Professional_Development',Professional_Development::all());
    }


    public function indexx()
    {
        $professional_Development = \App\Models\TrainingCourses\Professional_Development::all();
        return view('Project.Training_courses.Professional_Development')->with('Professional_Development',Professional_Development::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.Professional_Development.add_professional_development_course');
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
        $professional_Development = new Professional_Development();
        $professional_Development ->professional_development_course_name = $request->professional_development_course_name;
        $professional_Development ->professional_development_course_description = $request->professional_development_course_description;
        $professional_Development ->professional_development_course_price = $request->professional_development_course_price;
        $professional_Development ->professional_development_course_teacher_name = $request->professional_development_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $professional_Development->image=$filename;}
        $professional_Development ->save();
        return redirect('admin_home/index_professional_development')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'professional_development_course_name'      => 'required|max:25',
            'professional_development_course_description'       => 'required|max:25',
            'professional_development_course_price'           => 'required|numeric',
            'professional_development_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'professional_development_course_name.required'      => __('Course name of the Professional Development is required'),
            'professional_development_course_description.required'       => __('Description of the Professional Development course is required'),
            'professional_development_course_price.required' => __('Price of the Professional Development course is required'),
            'professional_development_course_teacher_name.required'         => __('Name of the Professional Development course is required'),
            'image.required'         => __('Image of the HR course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professional_Development  $professional_Development
     * @return \Illuminate\Http\Response
     */
    public function show(Professional_Development $professional_Development)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professional_Development  $professional_Development
     * @return \Illuminate\Http\Response
     */
    public function edit( $professional_Development)
    {
        $professional_Development = Professional_Development::find($professional_Development);
        return view('admin.Training_courses.Professional_Development.edit_professional_development_course')->with('Professional_Development',Professional_Development::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professional_Development  $professional_Development
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $professional_Development)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $professional_Development = Professional_Development::find($professional_Development);
        $professional_Development ->professional_development_course_name = $request->professional_development_course_name;
        $professional_Development ->professional_development_course_price = $request->professional_development_course_price;
        $professional_Development ->professional_development_course_teacher_name = $request->professional_development_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $professional_Development->image=$filename;}
        $professional_Development ->save();
        return redirect('admin_home/index_professional_development')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professional_Development  $professional_Development
     * @return \Illuminate\Http\Response
     */
    public function destroy( $professional_Development)
    {
        $professional_Development = Professional_Development::find($professional_Development);
        Storage::disk('public')->delete($professional_Development->image);
        $professional_Development->delete();
        return redirect('/admin_home/index_professional_development')->with(['success'=> __('Professional Development Deleted successfuly')]);
    }
}

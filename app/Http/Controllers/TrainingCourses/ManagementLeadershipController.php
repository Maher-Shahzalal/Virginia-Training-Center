<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\Management_Leadership;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ManagementLeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $management_Leadership = \App\Models\TrainingCourses\Management_Leadership::all();
        return view('admin.Training_courses.Management_Leadership.index_management_leadership')->with('Management_Leadership',Management_Leadership::all());
    }


    public function indexx()
    {
        $management_Leadership = \App\Models\TrainingCourses\Management_Leadership::all();
        return view('Project.Training_courses.Management_Leadership')->with('Management_Leadership',Management_Leadership::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.Management_Leadership.add_management_leadership_course');
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
        $management_Leadership = new Management_Leadership();
        $management_Leadership ->management_leadership_course_name = $request->management_leadership_course_name;
        $management_Leadership ->management_leadership_course_description = $request->management_leadership_course_description;
        $management_Leadership ->management_leadership_course_price = $request->management_leadership_course_price;
        $management_Leadership ->management_leadership_course_teacher_name = $request->management_leadership_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $management_Leadership->image=$filename;}
        $management_Leadership ->save();
        return redirect('admin_home/index_management_leadership')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'management_leadership_course_name'      => 'required|max:25',
            'management_leadership_course_description'       => 'required|max:25',
            'management_leadership_course_price'           => 'required|numeric',
            'management_leadership_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'management_leadership_course_name.required'      => __('Course name of the Management Leadership is required'),
            'management_leadership_course_description.required'       => __('Description of the Management Leadership course is required'),
            'management_leadership_course_price.required' => __('Price of the Management Leadership course is required'),
            'management_leadership_course_teacher_name.required'         => __('Name of the Management Leadership course is required'),
            'image.required'         => __('Image of the Management Leadership course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Management_Leadership  $management_Leadership
     * @return \Illuminate\Http\Response
     */
    public function show(Management_Leadership $management_Leadership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Management_Leadership  $management_Leadership
     * @return \Illuminate\Http\Response
     */
    public function edit( $management_Leadership)
    {
        $management_Leadership = Management_Leadership::find($management_Leadership);
        return view('admin.Training_courses.Management_Leadership.edit_management_leadership_course')->with('Management_Leadership',Management_Leadership::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Management_Leadership  $management_Leadership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $management_Leadership)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $management_Leadership = Management_Leadership::find($management_Leadership);
        $management_Leadership ->management_leadership_course_name = $request->management_leadership_course_name;
        $management_Leadership ->management_leadership_course_price = $request->management_leadership_course_price;
        $management_Leadership ->management_leadership_course_teacher_name = $request->management_leadership_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $management_Leadership->image=$filename;}
        $management_Leadership ->save();
        return redirect('admin_home/index_management_leadership')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Management_Leadership  $management_Leadership
     * @return \Illuminate\Http\Response
     */
    public function destroy( $management_Leadership)
    {
        $management_Leadership = Management_Leadership::find($management_Leadership);
        Storage::disk('public')->delete($management_Leadership->image);
        $management_Leadership->delete();
        return redirect('/admin_home/index_management_leadership')->with(['success'=> __('Management Leadership Deleted successfuly')]);
    }
}

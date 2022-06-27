<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\Project_Management;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_Management = \App\Models\TrainingCourses\Project_Management::all();
        return view('admin.Training_courses.Project_Management.index_project_management')->with('Project_Management',Project_Management::all());
    }


    public function indexx()
    {
        $project_Management = \App\Models\TrainingCourses\Project_Management::all();
        return view('Project.Training_courses.Project_Management')->with('Project_Management',Project_Management::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.Project_Management.add_project_management_course');
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
        $project_Management = new Project_Management();
        $project_Management ->project_management_course_name = $request->project_management_course_name;
        $project_Management ->project_management_course_description = $request->project_management_course_description;
        $project_Management ->project_management_course_price = $request->project_management_course_price;
        $project_Management ->project_management_course_teacher_name = $request->project_management_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $project_Management->image=$filename;}
        $project_Management ->save();
        return redirect('admin_home/index_project_management')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'project_management_course_name'      => 'required|max:25',
            'project_management_course_description'       => 'required|max:25',
            'project_management_course_price'           => 'required|numeric',
            'project_management_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'project_management_course_name.required'      => __('Course name of the Project Management is required'),
            'project_management_course_description.required'       => __('Description of the Project Management course is required'),
            'project_management_course_price.required' => __('Price of the Project Management course is required'),
            'project_management_course_teacher_name.required'         => __('Name of the Project Management course is required'),
            'image.required'         => __('Image of the Project Management course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project_Management  $project_Management
     * @return \Illuminate\Http\Response
     */
    public function show(Project_Management $project_Management)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project_Management  $project_Management
     * @return \Illuminate\Http\Response
     */
    public function edit( $project_Management)
    {
        $project_Management = Project_Management::find($project_Management);
        return view('admin.Training_courses.Project_Management.edit_project_management_course')->with('Project_Management',Project_Management::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project_Management  $project_Management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $project_Management)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $project_Management = Project_Management::find($project_Management);
        $project_Management ->project_management_course_name = $request->project_management_course_name;
        $project_Management ->project_management_course_price = $request->project_management_course_price;
        $project_Management ->project_management_course_teacher_name = $request->project_management_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $project_Management->image=$filename;}
        $project_Management ->save();
        return redirect('admin_home/index_project_management')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project_Management  $project_Management
     * @return \Illuminate\Http\Response
     */
    public function destroy( $project_Management)
    {
        $project_Management = Project_Management::find($project_Management);
        Storage::disk('public')->delete($project_Management->image);
        $project_Management->delete();
        return redirect('/admin_home/index_project_management')->with(['success'=> __('Project Management Deleted successfuly')]);
    }
}

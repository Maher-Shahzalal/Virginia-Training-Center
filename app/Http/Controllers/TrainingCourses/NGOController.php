<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\NGO;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NGOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nGO = \App\Models\TrainingCourses\NGO::all();
        return view('admin.Training_courses.NGO.index_ngo')->with('NGO',NGO::all());
    }


    public function indexx()
    {
        $nGO = \App\Models\TrainingCourses\NGO::all();
        return view('Project.Training_courses.NGO')->with('NGO',NGO::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.NGO.add_ngo_course');
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
        $nGO = new NGO();
        $nGO ->ngo_course_name = $request->ngo_course_name;
        $nGO ->ngo_course_description = $request->ngo_course_description;
        $nGO ->ngo_course_price = $request->ngo_course_price;
        $nGO ->ngo_course_teacher_name = $request->ngo_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $nGO->image=$filename;}
        $nGO ->save();
        return redirect('admin_home/index_ngo')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'ngo_course_name'      => 'required|max:25',
            'ngo_course_description'       => 'required|max:25',
            'ngo_course_price'           => 'required|numeric',
            'ngo_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'ngo_course_name.required'      => __('Course name of the NGO Management is required'),
            'ngo_course_description.required'       => __('Description of the NGO Management course is required'),
            'ngo_course_price.required' => __('Price of the NGO Management course is required'),
            'ngo_course_teacher_name.required'         => __('Name of the NGO Management course is required'),
            'image.required'         => __('Image of the NGO Management course is required'),
        ];
        return $messages;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\NGO  $nGO
     * @return \Illuminate\Http\Response
     */
    public function show(NGO $nGO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NGO  $nGO
     * @return \Illuminate\Http\Response
     */
    public function edit( $nGO)
    {
        $nGO = NGO::find($nGO);
        return view('admin.Training_courses.NGO.edit_ngo_course')->with('NGO',NGO::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NGO  $nGO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $nGO)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $nGO = NGO::find($nGO);
        $nGO ->ngo_course_name = $request->ngo_course_name;
        $nGO ->ngo_course_price = $request->ngo_course_price;
        $nGO ->ngo_course_teacher_name = $request->ngo_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $nGO->image=$filename;}
        $nGO ->save();
        return redirect('admin_home/index_ngo')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NGO  $nGO
     * @return \Illuminate\Http\Response
     */
    public function destroy( $nGO)
    {
        $nGO = NGO::find($nGO);
        Storage::disk('public')->delete($nGO->image);
        $nGO->delete();
        return redirect('/admin_home/index_ngo')->with(['success'=> __('NGO Management Deleted successfuly')]);
    }
}

<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\Business_strategy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BusinessStrategyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business_strategy = \App\Models\TrainingCourses\Business_strategy::all();
        return view('admin.Training_courses.business_strategy.index_business_strategy')->with('Business_strategy',Business_strategy::all());
    }


    public function indexx()
    {
        $business_strategy = \App\Models\TrainingCourses\Business_strategy::all();
        return view('Project.Training_courses.Business_strategy')->with('Business_strategy',Business_strategy::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.business_strategy.add_business_strategy_course');
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
        $business_strategy = new Business_strategy();
        $business_strategy ->business_strategy_course_name = $request->business_strategy_course_name;
        $business_strategy ->business_strategy_course_description = $request->business_strategy_course_description;
        $business_strategy ->business_strategy_course_price = $request->business_strategy_course_price;
        $business_strategy ->business_strategy_course_teacher_name = $request->business_strategy_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $business_strategy->image=$filename;}
        $business_strategy ->save();
        return redirect('admin_home/index_business_strategy')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'business_strategy_course_name'      => 'required|max:25',
            'business_strategy_course_description'       => 'required|max:25',
            'business_strategy_course_price'           => 'required|numeric',
            'business_strategy_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'business_strategy_course_name.required'      => __('Course name of the Business Strategy is required'),
            'business_strategy_course_description.required'       => __('Description of the Business Strategy course is required'),
            'business_strategy_course_price.required' => __('Price of the Business Strategy course is required'),
            'business_strategy_course_teacher_name.required'         => __('Name of the Business Strategy course is required'),
            'image.required'         => __('Image of the Business Strategy course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business_strategy  $business_strategy
     * @return \Illuminate\Http\Response
     */
    public function show(Business_strategy $business_strategy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business_strategy  $business_strategy
     * @return \Illuminate\Http\Response
     */
    public function edit( $business_strategy)
    {
        $business_strategy = Business_strategy::find($business_strategy);
        return view('admin.Training_courses.business_strategy.edit_business_strategy_course')->with('Business_strategy',Business_strategy::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business_strategy  $business_strategy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $business_strategy)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $business_strategy = Business_strategy::find($business_strategy);
        $business_strategy ->business_strategy_course_name = $request->business_strategy_course_name;
        $business_strategy ->business_strategy_course_description = $request->business_strategy_course_description;
        $business_strategy ->business_strategy_course_price = $request->business_strategy_course_price;
        $business_strategy ->business_strategy_course_teacher_name = $request->business_strategy_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $business_strategy->image=$filename;}
        $business_strategy ->save();
        return redirect('admin_home/index_business_strategy')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business_strategy  $business_strategy
     * @return \Illuminate\Http\Response
     */
    public function destroy( $business_strategy)
    {
        $business_strategy = Business_strategy::find($business_strategy);
        Storage::disk('public')->delete($business_strategy->image);
        $business_strategy->delete();
        return redirect('/admin_home/index_business_strategy')->with(['success'=> __('Business Strategy Deleted successfuly')]);
    }
}

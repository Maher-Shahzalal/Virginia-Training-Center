<?php

namespace App\Http\Controllers\TrainingCourses;

use App\Models\TrainingCourses\Digital_Marketing;
use App\HR;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DigitalMarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $digital_Marketing = \App\Models\TrainingCourses\Digital_Marketing::all();
        return view('admin.Training_courses.Digital_Marketing.index_digital_marketing')->with('Digital_Marketing',Digital_Marketing::all());
    }


    public function indexx()
    {
        $digital_Marketing = \App\Models\TrainingCourses\Digital_Marketing::all();
        return view('Project.Training_courses.Digital_Marketing')->with('Digital_Marketing',Digital_Marketing::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.Digital_Marketing.add_digital_marketing_course');
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
        $digital_Marketing = new Digital_Marketing();
        $digital_Marketing ->digital_marketing_course_name = $request->digital_marketing_course_name;
        $digital_Marketing ->digital_marketing_course_description = $request->digital_marketing_course_description;
        $digital_Marketing ->digital_marketing_course_price = $request->digital_marketing_course_price;
        $digital_Marketing ->digital_marketing_course_teacher_name = $request->digital_marketing_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $digital_Marketing->image=$filename;}
        $digital_Marketing ->save();
        return redirect('admin_home/index_digital_marketing')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'digital_marketing_course_name'      => 'required|max:25',
            'digital_marketing_course_description'       => 'required|max:25',
            'digital_marketing_course_price'           => 'required|numeric',
            'digital_marketing_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'digital_marketing_course_name.required'      => __('Course name of the Digital Marketing is required'),
            'digital_marketing_course_description.required'       => __('Description of the Digital Marketing course is required'),
            'digital_marketing_course_price.required' => __('Price of the Digital Marketing course is required'),
            'digital_marketing_course_teacher_name.required'         => __('Name of the Digital Marketing course is required'),
            'image.required'         => __('Image of the Digital Marketing course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Digital_Marketing  $digital_Marketing
     * @return \Illuminate\Http\Response
     */
    public function show(Digital_Marketing $digital_Marketing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Digital_Marketing  $digital_Marketing
     * @return \Illuminate\Http\Response
     */
    public function edit( $digital_Marketing)
    {
        $digital_Marketing = Digital_Marketing::find($digital_Marketing);
        return view('admin.Training_courses.Digital_Marketing.edit_digital_marketing_course')->with('Digital_Marketing',Digital_Marketing::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Digital_Marketing  $digital_Marketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $digital_Marketing)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $digital_Marketing = Digital_Marketing::find($digital_Marketing);
        $digital_Marketing ->digital_marketing_course_name = $request->digital_marketing_course_name;
        $digital_Marketing ->digital_marketing_course_price = $request->digital_marketing_course_price;
        $digital_Marketing ->digital_marketing_course_teacher_name = $request->digital_marketing_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $digital_Marketing->image=$filename;}
        $digital_Marketing->save();
        return redirect('admin_home/index_digital_marketing')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Digital_Marketing  $digital_Marketing
     * @return \Illuminate\Http\Response
     */
    public function destroy( $digital_Marketing)
    {
        $digital_Marketing = Digital_Marketing::find($digital_Marketing);
        Storage::disk('public')->delete($digital_Marketing->image);
        $digital_Marketing->delete();
        return redirect('/admin_home/index_digital_marketing')->with(['success'=> __('Digital Marketing Deleted successfuly')]);
    }
}

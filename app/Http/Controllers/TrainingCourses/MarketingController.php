<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\Marketing;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marketing = \App\Models\TrainingCourses\Marketing::all();
        return view('admin.Training_courses.Marketing.index_marketing')->with('Marketing',Marketing::all());
    }


    public function indexx()
    {
        $marketing = \App\Models\TrainingCourses\Marketing::all();
        return view('Project.Training_courses.Marketing')->with('Marketing',Marketing::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.Marketing.add_marketing_course');
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
        $marketing = new Marketing();
        $marketing ->marketing_course_name = $request->marketing_course_name;
        $marketing ->marketing_course_description = $request->marketing_course_description;
        $marketing ->marketing_course_price = $request->marketing_course_price;
        $marketing ->marketing_course_teacher_name = $request->marketing_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $marketing->image=$filename;}
        $marketing ->save();
        return redirect('admin_home/index_marketing')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'marketing_course_name'      => 'required|max:25',
            'marketing_course_description'       => 'required|max:25',
            'marketing_course_price'           => 'required|numeric',
            'marketing_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'marketing_course_name.required'      => __('Course name of the Marketing is required'),
            'marketing_course_description.required'       => __('Description of the Marketing course is required'),
            'marketing_course_price.required' => __('Price of the Marketing course is required'),
            'marketing_course_teacher_name.required'         => __('Name of the Marketing course is required'),
            'image.required'         => __('Image of the Marketing course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function show(Marketing $marketing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function edit( $marketing)
    {
        $marketing = Marketing::find($marketing);
        return view('admin.Training_courses.Marketing.edit_marketing_course')->with('Marketing',Marketing::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $marketing)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $marketing = Marketing::find($marketing);
        $marketing ->marketing_course_name = $request->marketing_course_name;
        $marketing ->marketing_course_price = $request->marketing_course_price;
        $marketing ->marketing_course_teacher_name = $request->marketing_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $marketing->image=$filename;}
        $marketing ->save();
        return redirect('admin_home/index_marketing')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function destroy( $marketing)
    {
        $marketing = Marketing::find($marketing);
        Storage::disk('public')->delete($marketing->image);
        $marketing->delete();
        return redirect('/admin_home/index_marketing')->with(['success'=> __('Marketing Deleted successfuly')]);
    }
}

<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\Business_english;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BusinessEnglishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business_english = \App\Models\ProfessionalEnglish\Business_english::all();
        return view('admin.Professional_English.Business_english.index_bussiness_english')->with('Business_english',Business_english::all());
    }

    public function indexx()
    {
        $business_english = \App\Models\ProfessionalEnglish\Business_english::all();
        return view('Project.Professional_English.Business_English')->with('Business_english',Business_english::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.Business_english.add_bussiness_english_course');
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
        $business_english = new Business_english();
        $business_english ->business_english_course_name = $request->business_english_course_name;
        $business_english ->business_english_course_description = $request->business_english_course_description;
        $business_english ->business_english_course_price = $request->business_english_course_price;
        $business_english ->business_english_course_teacher_name = $request->business_english_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $business_english->image=$filename;}
        $business_english->save();
        return redirect('admin_home/index_business_english')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'business_english_course_name'      => 'required|max:25',
            'business_english_course_description'       => 'required|max:25',
            'business_english_course_price'           => 'required|numeric',
            'business_english_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'business_english_course_name.required'      => __('Course name of the Business English is required'),
            'business_english_course_description.required'       => __('Description of the Business English course is required'),
            'business_english_course_price.required' => __('Price of the Business English course is required'),
            'business_english_course_teacher_name.required'         => __('Name of the Business English course is required'),
            'image.required'         => __('Image of the Business English course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business_english  $business_english
     * @return \Illuminate\Http\Response
     */
    public function show(Business_english $business_english)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business_english  $business_english
     * @return \Illuminate\Http\Response
     */
    public function edit( $business_english)
    {
        $business_english = Business_english::find($business_english);
        return view('admin.Professional_English.Business_english.edit_bussiness_english_course')->with('Business_english',Business_english::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business_english  $business_english
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $business_english)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $business_english = Business_english::find($business_english);
        $business_english->business_english_course_name = $request->business_english_course_name;
        $business_english->business_english_course_price = $request->business_english_course_price;
        $business_english->business_english_course_teacher_name = $request->business_english_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $business_english->image=$filename;}
        $business_english ->save();
        return redirect('admin_home/index_business_english')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business_english  $business_english
     * @return \Illuminate\Http\Response
     */
    public function destroy( $business_english)
    {
        $business_english = Business_english::find($business_english);
        Storage::disk('public')->delete($business_english->image);
        $business_english->delete();
        return redirect('/admin_home/index_business_english')->with(['success'=> __('Business English Deleted successfuly')]);
    }
}

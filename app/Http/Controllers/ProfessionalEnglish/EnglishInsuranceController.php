<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\English_insurance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_banking = \App\Models\ProfessionalEnglish\English_insurance::all();
        return view('admin.Professional_English.English_Insurance.index_English_insurance')->with('English_insurance',English_insurance::all());
    }

    public function indexx()
    {
        $english_insurance = \App\Models\ProfessionalEnglish\English_insurance::all();
        return view('Project.Professional_English.English_Insurance')->with('English_insurance',English_insurance::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_Insurance.add_english_insurance_course');
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
        $english_insurance = new English_insurance();
        $english_insurance ->english_insurance_course_name = $request->english_insurance_course_name;
        $english_insurance ->english_insurance_course_description = $request->english_insurance_course_description;
        $english_insurance ->english_insurance_course_price = $request->english_insurance_course_price;
        $english_insurance ->english_insurance_course_teacher_name = $request->english_insurance_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_insurance->image=$filename;}
        $english_insurance->save();
        return redirect('admin_home/index_english_insurance')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_insurance_course_name'              => 'required|max:25',
            'english_insurance_course_description'       => 'required|max:25',
            'english_insurance_course_price'             => 'required|numeric',
            'english_insurance_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_insurance_course_name.required'               => __('Course name of the English Insurance is required'),
            'english_insurance_course_description.required'        => __('Description of the English Insurance course is required'),
            'english_insurance_course_price.required'              => __('Price of the English Insurance course is required'),
            'english_insurance_course_teacher_name.required'       => __('Name of the English Insurance course is required'),
            'image.required'                                     => __('Image of the English Insurance course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_insurance  $english_insurance
     * @return \Illuminate\Http\Response
     */
    public function show(English_insurance $english_insurance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_insurance  $english_insurance
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_insurance)
    {
        $english_insurance = English_insurance::find($english_insurance);
        return view('admin.Professional_English.English_Insurance.edit_english_insurance_course')->with('English_insurance',English_insurance::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_insurance  $english_insurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_insurance)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_insurance = English_insurance::find($english_insurance);
        $english_insurance->english_insurance_course_name = $request->english_insurance_course_name;
        $english_insurance->english_insurance_course_price = $request->english_insurance_course_price;
        $english_insurance->english_insurance_course_teacher_name = $request->english_insurance_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_insurance->image=$filename;}
        $english_insurance ->save();
        return redirect('admin_home/index_english_insurance')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_insurance  $english_insurance
     * @return \Illuminate\Http\Response
     */
    public function destroy( $english_insurance)
    {
        $english_insurance = English_insurance::find($english_insurance);
        Storage::disk('public')->delete($english_insurance->image);
        $english_insurance->delete();
        return redirect('/admin_home/index_english_insurance')->with(['success'=> __('English Insurance Deleted successfuly')]);
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Professional_English;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfessionalEnglishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professional_English = \App\Models\Professional_English::all();
        return view('admin.Professional_English.index_professional_english')->with('Professional_English',Professional_English::all());
    }


    public function indexx()
    {
        $professional_English = \App\Models\Professional_English::all();
        return view('Project.Professional_English')->with('Professional_English',Professional_English::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.add_professional_english_course');
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
        $professional_English = new Professional_English();
        $professional_English ->professional_english_course_name = $request->professional_english_course_name;
        $professional_English ->professional_english_course_description = $request->professional_english_course_description;
        $professional_English ->professional_english_course_price = $request->professional_english_course_price;
        $professional_English ->professional_english_course_teacher_name = $request->professional_english_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $professional_English->image=$filename;}
        $professional_English ->save();
        return redirect('admin_home/index_professional_english')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'professional_english_course_name'      => 'required|max:25',
            'professional_english_course_description'       => 'required|max:25',
            'professional_english_course_price'           => 'required|numeric',
            'professional_english_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'professional_english_course_name.required'      => __('Course name of the Professional English is required'),
            'professional_english_course_description.required'       => __('Description of the Professional English course is required'),
            'professional_english_course_price.required' => __('Price of the Professional English course is required'),
            'professional_english_course_teacher_name.required'         => __('Name of the Professional English course is required'),
            'image.required'         => __('Image of the Professional English course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professional_English  $professional_English
     * @return \Illuminate\Http\Response
     */
    public function show(Professional_English $professional_English)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professional_English  $professional_English
     * @return \Illuminate\Http\Response
     */
    public function edit( $professional_English)
    {
        $professional_English = Professional_English::find($professional_English);
        return view('admin.Professional_English.edit_professional_english_course')->with('Professional_English',Professional_English::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professional_English  $professional_English
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $professional_English)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $professional_English = Professional_English::find($professional_English);
        $professional_English ->professional_english_course_name = $request->professional_english_course_name;
        $professional_English ->professional_english_course_price = $request->professional_english_course_price;
        $professional_English ->professional_english_course_teacher_name = $request->professional_english_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $professional_English->image=$filename;}
        $professional_English ->save();
        return redirect('admin_home/index_professional_english')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professional_English  $professional_English
     * @return \Illuminate\Http\Response
     */
    public function destroy( $professional_English)
    {
        $professional_English = Professional_English::find($professional_English);
        Storage::disk('public')->delete($professional_English->image);
        $professional_English->delete();
        return redirect('/admin_home/index_professional_english')->with(['success'=> __('Professional English Deleted successfuly')]);
    }
}

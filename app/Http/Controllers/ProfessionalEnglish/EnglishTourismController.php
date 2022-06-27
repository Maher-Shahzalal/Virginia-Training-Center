<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\English_tourism;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishTourismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_tourism = \App\Models\ProfessionalEnglish\English_tourism::all();
        return view('admin.Professional_English.English_Tourism.index_English_tourism')->with('English_tourism',English_tourism::all());
    }

    public function indexx()
    {
        $english_tourism = \App\Models\ProfessionalEnglish\English_tourism::all();
        return view('Project.Professional_English.English_Tourism')->with('English_tourism',English_tourism::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_Tourism.add_english_tourism_course');
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
        $english_tourism = new English_tourism();
        $english_tourism ->english_tourism_course_name = $request->english_tourism_course_name;
        $english_tourism ->english_tourism_course_description = $request->english_tourism_course_description;
        $english_tourism ->english_tourism_course_price = $request->english_tourism_course_price;
        $english_tourism ->english_tourism_course_teacher_name = $request->english_tourism_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_tourism->image=$filename;}
        $english_tourism->save();
        return redirect('admin_home/index_english_tourism')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_tourism_course_name'              => 'required|max:25',
            'english_tourism_course_description'       => 'required|max:25',
            'english_tourism_course_price'             => 'required|numeric',
            'english_tourism_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_tourism_course_name.required'               => __('Course name of the English Tourism is required'),
            'english_tourism_course_description.required'        => __('Description of the English Tourism course is required'),
            'english_tourism_course_price.required'              => __('Price of the English Tourism course is required'),
            'english_tourism_course_teacher_name.required'       => __('Name of the English Tourism course is required'),
            'image.required'                                     => __('Image of the English Tourism course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_tourism  $english_tourism
     * @return \Illuminate\Http\Response
     */
    public function show(English_tourism $english_tourism)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_tourism  $english_tourism
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_tourism)
    {
        $english_tourism = English_tourism::find($english_tourism);
        return view('admin.Professional_English.English_Tourism.edit_english_tourism_course')->with('English_tourism',English_tourism::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_tourism  $english_tourism
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_tourism)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_tourism = English_tourism::find($english_tourism);
        $english_tourism->english_tourism_course_name = $request->english_tourism_course_name;
        $english_tourism->english_tourism_course_price = $request->english_tourism_course_price;
        $english_tourism->english_tourism_course_teacher_name = $request->english_tourism_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_tourism->image=$filename;}
        $english_tourism ->save();
        return redirect('admin_home/index_english_tourism')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_tourism  $english_tourism
     * @return \Illuminate\Http\Response
     */
    public function destroy( $english_tourism)
    {
        $english_tourism = English_tourism::find($english_tourism);
        Storage::disk('public')->delete($english_tourism->image);
        $english_tourism->delete();
        return redirect('/admin_home/index_english_tourism')->with(['success'=> __('English Tourism Deleted successfuly')]);
    }
}

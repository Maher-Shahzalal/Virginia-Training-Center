<?php

namespace App\Http\Controllers\ProfessionalEnglish;


use App\Models\ProfessionalEnglish\English_Diplomatic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishDiplomaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_Diplomatic = \App\Models\ProfessionalEnglish\English_Diplomatic::all();
        return view('admin.Professional_English.English_Diplomatic.index_english_diplomatic')->with('English_Diplomatic',English_Diplomatic::all());
    }

    public function indexx()
    {
        $english_Diplomatic = \App\Models\ProfessionalEnglish\English_Diplomatic::all();
        return view('Project.Professional_English.English_diplomatic')->with('English_Diplomatic',English_Diplomatic::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_diplomatic.add_english_diplomatic_course');
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
        $english_Diplomatic = new English_Diplomatic();
        $english_Diplomatic ->english_diplomatic_course_name = $request->english_diplomatic_course_name;
        $english_Diplomatic ->english_diplomatic_course_description = $request->english_diplomatic_course_description;
        $english_Diplomatic ->english_diplomatic_course_price = $request->english_diplomatic_course_price;
        $english_Diplomatic ->english_diplomatic_course_teacher_name = $request->english_diplomatic_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_Diplomatic->image=$filename;}
        $english_Diplomatic->save();
        return redirect('admin_home/index_english_diplomatic')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_diplomatic_course_name'              => 'required|max:25',
            'english_diplomatic_course_description'       => 'required|max:25',
            'english_diplomatic_course_price'             => 'required|numeric',
            'english_diplomatic_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_diplomatic_course_name.required'               => __('Course name of the English Diplomatic is required'),
            'english_diplomatic_course_description.required'        => __('Description of the English Diplomatic course is required'),
            'english_diplomatic_course_price.required'              => __('Price of the English Diplomatic course is required'),
            'english_diplomatic_course_teacher_name.required'       => __('Name of the English Diplomatic course is required'),
            'image.required'                                        => __('Image of the English Diplomatic course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_Diplomatic  $english_Diplomatic
     * @return \Illuminate\Http\Response
     */
    public function show(English_Diplomatic $english_Diplomatic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_Diplomatic  $english_Diplomatic
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_Diplomatic)
    {
        $english_Diplomatic = English_Diplomatic::find($english_Diplomatic);
        return view('admin.Professional_English.English_Diplomatic.edit_english_diplomatic_course')->with('English_Diplomatic',English_Diplomatic::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_Diplomatic  $english_Diplomatic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_Diplomatic)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_Diplomatic = English_Diplomatic::find($english_Diplomatic);
        $english_Diplomatic->english_diplomatic_course_name = $request->english_diplomatic_course_name;
        $english_Diplomatic->english_diplomatic_course_price = $request->english_diplomatic_course_price;
        $english_Diplomatic->english_diplomatic_course_teacher_name = $request->english_diplomatic_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_Diplomatic->image=$filename;}
        $english_Diplomatic ->save();
        return redirect('admin_home/index_english_diplomatic')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_Diplomatic  $english_Diplomatic
     * @return \Illuminate\Http\Response
     */
    public function destroy($english_Diplomatic)
    {
        $english_Diplomatic = English_Diplomatic::find($english_Diplomatic);
        Storage::disk('public')->delete($english_Diplomatic->image);
        $english_Diplomatic->delete();
        return redirect('/admin_home/index_english_diplomatic')->with(['success'=> __('English Diplomatic Deleted successfuly')]);
    }
}

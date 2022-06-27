<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\English_legal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishLegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_legal = \App\Models\ProfessionalEnglish\English_legal::all();
        return view('admin.Professional_English.English_Legal.index_english_legal')->with('English_legal',English_legal::all());
    }

    public function indexx()
    {
        $english_legal = \App\Models\ProfessionalEnglish\English_legal::all();
        return view('Project.Professional_English.English_Legal')->with('English_legal',English_legal::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_Legal.add_english_legal_course');
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
        $english_legal = new English_legal();
        $english_legal ->english_legal_course_name = $request->english_legal_course_name;
        $english_legal ->english_legal_course_description = $request->english_legal_course_description;
        $english_legal ->english_legal_course_price = $request->english_legal_course_price;
        $english_legal ->english_legal_course_teacher_name = $request->english_legal_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_legal->image=$filename;}
        $english_legal->save();
        return redirect('admin_home/index_english_legal')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_legal_course_name'              => 'required|max:25',
            'english_legal_course_description'       => 'required|max:25',
            'english_legal_course_price'             => 'required|numeric',
            'english_legal_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_legal_course_name.required'               => __('Course name of the English Legal is required'),
            'english_legal_course_description.required'        => __('Description of the English Legal course is required'),
            'english_legal_course_price.required'              => __('Price of the English Legal course is required'),
            'english_legal_course_teacher_name.required'       => __('Name of the English Legal course is required'),
            'image.required'                                        => __('Image of the English Legal course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_legal  $english_legal
     * @return \Illuminate\Http\Response
     */
    public function show(English_legal $english_legal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_legal  $english_legal
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_legal)
    {
        $english_legal = English_legal::find($english_legal);
        return view('admin.Professional_English.English_Legal.edit_english_legal_course')->with('English_legal',English_legal::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_legal  $english_legal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_legal)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_legal = English_legal::find($english_legal);
        $english_legal->english_legal_course_name = $request->english_legal_course_name;
        $english_legal->english_legal_course_price = $request->english_legal_course_price;
        $english_legal->english_legal_course_teacher_name = $request->english_legal_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_legal->image=$filename;}
        $english_legal ->save();
        return redirect('admin_home/index_english_legal')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_legal  $english_legal
     * @return \Illuminate\Http\Response
     */
    public function destroy( $english_legal)
    {
        $english_legal = English_legal::find($english_legal);
        Storage::disk('public')->delete($english_legal->image);
        $english_legal->delete();
        return redirect('/admin_home/index_english_legal')->with(['success'=> __('English Legal Deleted successfuly')]);
    }
}

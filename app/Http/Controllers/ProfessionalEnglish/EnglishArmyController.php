<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\English_army;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishArmyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_army = \App\Models\ProfessionalEnglish\English_army::all();
        return view('admin.Professional_English.English_Army.index_English_army')->with('English_army',English_army::all());
    }

    public function indexx()
    {
        $english_army = \App\Models\ProfessionalEnglish\English_army::all();
        return view('Project.Professional_English.English_Army')->with('English_army',English_army::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_Army.add_english_army_course');
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
        $english_army = new English_army();
        $english_army ->english_army_course_name = $request->english_army_course_name;
        $english_army ->english_army_course_description = $request->english_army_course_description;
        $english_army ->english_army_course_price = $request->english_army_course_price;
        $english_army ->english_army_course_teacher_name = $request->english_army_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_army->image=$filename;}
        $english_army->save();
        return redirect('admin_home/index_english_army')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_army_course_name'              => 'required|max:25',
            'english_army_course_description'       => 'required|max:25',
            'english_army_course_price'             => 'required|numeric',
            'english_army_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_army_course_name.required'               => __('Course name of the English Army is required'),
            'english_army_course_description.required'        => __('Description of the English Army course is required'),
            'english_army_course_price.required'              => __('Price of the English Army course is required'),
            'english_army_course_teacher_name.required'       => __('Name of the English Army course is required'),
            'image.required'                                     => __('Image of the English Army course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_army  $english_army
     * @return \Illuminate\Http\Response
     */
    public function show(English_army $english_army)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_army  $english_army
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_army)
    {
        $english_army = English_army::find($english_army);
        return view('admin.Professional_English.English_Army.edit_english_army_course')->with('English_army',English_army::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_army  $english_army
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_army)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_army = English_army::find($english_army);
        $english_army ->english_army_course_name = $request->english_army_course_name;
        $english_army->english_army_course_price = $request->english_army_course_price;
        $english_army->english_army_course_teacher_name = $request->english_army_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_army->image=$filename;}
        $english_army ->save();
        return redirect('admin_home/index_english_army')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_army  $english_army
     * @return \Illuminate\Http\Response
     */
    public function destroy( $english_army)
    {
        $english_army = English_army::find($english_army);
        Storage::disk('public')->delete($english_army->image);
        $english_army->delete();
        return redirect('/admin_home/index_english_army')->with(['success'=> __('English Banking Deleted successfuly')]);
    }
}

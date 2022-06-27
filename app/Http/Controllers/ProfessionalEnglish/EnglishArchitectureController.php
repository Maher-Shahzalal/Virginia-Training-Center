<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\English_architecture;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishArchitectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_architecture = \App\Models\ProfessionalEnglish\English_architecture::all();
        return view('admin.Professional_English.English_Architecture.index_English_architecture')->with('English_architecture',English_architecture::all());
    }

    public function indexx()
    {
        $english_architecture = \App\Models\ProfessionalEnglish\English_architecture::all();
        return view('Project.Professional_English.English_Architecture')->with('English_architecture',English_architecture::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_Architecture.add_english_architecture_course');
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
        $english_architecture = new English_architecture();
        $english_architecture ->english_architecture_course_name = $request->english_architecture_course_name;
        $english_architecture ->english_architecture_course_description = $request->english_architecture_course_description;
        $english_architecture ->english_architecture_course_price = $request->english_architecture_course_price;
        $english_architecture ->english_architecture_course_teacher_name = $request->english_architecture_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_architecture->image=$filename;}
        $english_architecture->save();
        return redirect('admin_home/index_english_architecture')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_architecture_course_name'              => 'required|max:25',
            'english_architecture_course_description'       => 'required|max:25',
            'english_architecture_course_price'             => 'required|numeric',
            'english_architecture_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_architecture_course_name.required'               => __('Course name of the English Architecture is required'),
            'english_architecture_course_description.required'        => __('Description of the English Architecture course is required'),
            'english_architecture_course_price.required'              => __('Price of the English Architecture course is required'),
            'english_architecture_course_teacher_name.required'       => __('Name of the English Architecture course is required'),
            'image.required'                                          => __('Image of the English Architecture course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_architecture  $english_architecture
     * @return \Illuminate\Http\Response
     */
    public function show(English_architecture $english_architecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_architecture  $english_architecture
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_architecture)
    {
        $english_architecture = English_architecture::find($english_architecture);
        return view('admin.Professional_English.English_Architecture.edit_english_architecture_course')->with('English_architecture',English_architecture::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_architecture  $english_architecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_architecture)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_architecture = English_architecture::find($english_architecture);
        $english_architecture->english_architecture_course_name = $request->english_architecture_course_name;
        $english_architecture->english_architecture_course_price = $request->english_architecture_course_price;
        $english_architecture->english_architecture_course_teacher_name = $request->english_architecture_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_architecture->image=$filename;}
        $english_architecture ->save();
        return redirect('admin_home/index_english_architecture')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_architecture  $english_architecture
     * @return \Illuminate\Http\Response
     */
    public function destroy( $english_architecture)
    {
        $english_architecture = English_architecture::find($english_architecture);
        Storage::disk('public')->delete($english_architecture->image);
        $english_architecture->delete();
        return redirect('/admin_home/index_english_architecture')->with(['success'=> __('English Architecture Deleted successfuly')]);
    }
}

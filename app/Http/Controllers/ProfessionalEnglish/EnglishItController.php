<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\English_it;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishItController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_it = \App\Models\ProfessionalEnglish\English_it::all();
        return view('admin.Professional_English.English_IT.index_English_it')->with('English_it',English_it::all());
    }

    public function indexx()
    {
        $english_it = \App\Models\ProfessionalEnglish\English_it::all();
        return view('Project.Professional_English.English_IT')->with('English_it',English_it::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_IT.add_english_it_course');
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
        $english_it = new English_it();
        $english_it ->english_it_course_name = $request->english_it_course_name;
        $english_it ->english_it_course_description = $request->english_it_course_description;
        $english_it ->english_it_course_price = $request->english_it_course_price;
        $english_it ->english_it_course_teacher_name = $request->english_it_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_it->image=$filename;}
        $english_it->save();
        return redirect('admin_home/index_english_it')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_it_course_name'              => 'required|max:25',
            'english_it_course_description'       => 'required|max:25',
            'english_it_course_price'             => 'required|numeric',
            'english_it_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_it_course_name.required'               => __('Course name of the English IT is required'),
            'english_it_course_description.required'        => __('Description of the English IT course is required'),
            'english_it_course_price.required'              => __('Price of the English IT course is required'),
            'english_it_course_teacher_name.required'       => __('Name of the English IT course is required'),
            'image.required'                                => __('Image of the English IT course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_it  $english_it
     * @return \Illuminate\Http\Response
     */
    public function show(English_it $english_it)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_it  $english_it
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_it)
    {
        $english_banking = English_it::find($english_it);
        return view('admin.Professional_English.English_IT.edit_english_it_course')->with('English_it',English_it::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_it  $english_it
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_it)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_it = English_it::find($english_it);
        $english_it->english_it_course_name = $request->english_it_course_name;
        $english_it->english_it_course_price = $request->english_it_course_price;
        $english_it->english_it_course_teacher_name = $request->english_it_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_it->image=$filename;}
        $english_it ->save();
        return redirect('admin_home/index_english_it')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_it  $english_it
     * @return \Illuminate\Http\Response
     */
    public function destroy( $english_it)
    {
        $english_it = English_it::find($english_it);
        Storage::disk('public')->delete($english_it->image);
        $english_it->delete();
        return redirect('/admin_home/index_english_it')->with(['success'=> __('English Banking Deleted successfuly')]);
    }
}

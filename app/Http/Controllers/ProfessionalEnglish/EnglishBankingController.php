<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\English_banking;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishBankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_banking = \App\Models\ProfessionalEnglish\English_banking::all();
        return view('admin.Professional_English.English_Banking.index_English_banking')->with('English_banking',English_banking::all());
    }

    public function indexx()
    {
        $english_banking = \App\Models\ProfessionalEnglish\English_banking::all();
        return view('Project.Professional_English.English_banking')->with('English_banking',English_banking::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_Banking.add_english_banking_course');
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
        $english_banking = new English_banking();
        $english_banking ->english_banking_course_name = $request->english_banking_course_name;
        $english_banking ->english_banking_course_description = $request->english_banking_course_description;
        $english_banking ->english_banking_course_price = $request->english_banking_course_price;
        $english_banking ->english_banking_course_teacher_name = $request->english_banking_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_banking->image=$filename;}
        $english_banking->save();
        return redirect('admin_home/index_english_banking')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_banking_course_name'              => 'required|max:25',
            'english_banking_course_description'       => 'required|max:25',
            'english_banking_course_price'             => 'required|numeric',
            'english_banking_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_banking_course_name.required'               => __('Course name of the English Banking is required'),
            'english_banking_course_description.required'        => __('Description of the English Banking course is required'),
            'english_banking_course_price.required'              => __('Price of the English Banking course is required'),
            'english_banking_course_teacher_name.required'       => __('Name of the English Banking course is required'),
            'image.required'                                     => __('Image of the English Banking course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_banking  $english_banking
     * @return \Illuminate\Http\Response
     */
    public function show(English_banking $english_banking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_banking  $english_banking
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_banking)
    {
        $english_banking = English_banking::find($english_banking);
        return view('admin.Professional_English.English_Banking.edit_english_banking_course')->with('English_banking',English_banking::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_banking  $english_banking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_banking)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_banking = English_banking::find($english_banking);
        $english_banking->english_banking_course_name = $request->english_banking_course_name;
        $english_banking->english_banking_course_price = $request->english_banking_course_price;
        $english_banking->english_banking_course_teacher_name = $request->english_banking_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_banking->image=$filename;}
        $english_banking ->save();
        return redirect('admin_home/index_english_banking')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_banking  $english_banking
     * @return \Illuminate\Http\Response
     */
    public function destroy( $english_banking)
    {
        $english_banking = English_banking::find($english_banking);
        Storage::disk('public')->delete($english_banking->image);
        $english_banking->delete();
        return redirect('/admin_home/index_english_banking')->with(['success'=> __('English Banking Deleted successfuly')]);
    }
}

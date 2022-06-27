<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\English_medicine;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_medicine = \App\Models\ProfessionalEnglish\English_medicine::all();
        return view('admin.Professional_English.English_Medicine.index_english_medicine')->with('English_medicine',English_medicine::all());
    }

    public function indexx()
    {
        $english_medicine = \App\Models\ProfessionalEnglish\English_medicine::all();
        return view('Project.Professional_English.English_Medicine')->with('English_medicine',English_medicine::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_Medicine.add_english_medicine_course');
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
        $english_medicine = new English_medicine();
        $english_medicine ->english_medicine_course_name = $request->english_medicine_course_name;
        $english_medicine ->english_medicine_course_description = $request->english_medicine_course_description;
        $english_medicine ->english_medicine_course_price = $request->english_medicine_course_price;
        $english_medicine ->english_medicine_course_teacher_name = $request->english_medicine_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_medicine->image=$filename;}
        $english_medicine->save();
        return redirect('admin_home/index_english_medicine')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_medicine_course_name'              => 'required|max:25',
            'english_medicine_course_description'       => 'required|max:25',
            'english_medicine_course_price'             => 'required|numeric',
            'english_medicine_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_medicine_course_name.required'               => __('Course name of the English Medicine is required'),
            'english_medicine_course_description.required'        => __('Description of the English Medicine course is required'),
            'english_medicine_course_price.required'              => __('Price of the English Medicine course is required'),
            'english_medicine_course_teacher_name.required'       => __('Name of the English Medicine course is required'),
            'image.required'                                      => __('Image of the English Medicine course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_medicine  $english_medicine
     * @return \Illuminate\Http\Response
     */
    public function show(English_medicine $english_medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_medicine  $english_medicine
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_medicine)
    {
        $english_medicine = English_medicine::find($english_medicine);
        return view('admin.Professional_English.English_Medicine.edit_english_medicine_course')->with('English_medicine',English_medicine::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_medicine  $english_medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_medicine)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_medicine = English_medicine::find($english_medicine);
        $english_medicine->english_medicine_course_name = $request->english_medicine_course_name;
        $english_medicine->english_medicine_course_price = $request->english_medicine_course_price;
        $english_medicine->english_medicine_course_teacher_name = $request->english_medicine_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_medicine->image=$filename;}
        $english_medicine ->save();
        return redirect('admin_home/index_english_medicine')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_medicine  $english_medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy( $english_medicine)
    {
        $english_medicine = English_medicine::find($english_medicine);
        Storage::disk('public')->delete($english_medicine->image);
        $english_medicine->delete();
        return redirect('/admin_home/index_english_medicine')->with(['success'=> __('English Medicine Deleted successfuly')]);
    }
}

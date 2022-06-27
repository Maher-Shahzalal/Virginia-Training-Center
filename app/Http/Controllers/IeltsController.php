<?php

namespace App\Http\Controllers;

use App\Models\Ielts;
use App\Models\Oet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class IeltsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ielts = \App\Models\Ielts::all();
        return view('admin.IELTS.index_ielts')->with('Ielts',Ielts::all());
    }

    public function indexx()
    {
        $ielts = \App\Models\Ielts::all();
        return view('Project.Professional_Courses.IELTS_OET')->with('Ielts',Ielts::all())->with('Oet',Oet::all());;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.IELTS.add_ielts_course');
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
        $ielts = new Ielts();
        $ielts ->ielts_course_name = $request->ielts_course_name;
        $ielts ->ielts_course_description = $request->ielts_course_description;
        $ielts ->ielts_course_price = $request->ielts_course_price;
        $ielts ->ielts_course_teacher_name = $request->ielts_course_teacher_name;
            if($request->file('image')){
               $file=$request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $request->image->move('storage/',$filename);
        $ielts->image=$filename;}
        $ielts ->save();
        return redirect('admin_home/index_ielts')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'ielts_course_name'      => 'required|max:25',
            'ielts_course_description'       => 'required|max:25',
            'ielts_course_price'           => 'required|numeric',
            'ielts_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'ielts_course_name.required'      => __('Course name of the IELTS is required'),
            'ielts_course_description.required'       => __('Description of the IELTS course is required'),
            'ielts_course_price.required' => __('Price of the IELTS course is required'),
            'ielts_course_teacher_name.required'         => __('Name of the IELTS course is required'),
            'image.required'         => __('Image of the IELTS course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ielts  $ielts
     * @return \Illuminate\Http\Response
     */
    public function show(Ielts $ielts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ielts  $ielts
     * @return \Illuminate\Http\Response
     */
    public function edit($ielts)
    {
        $ielts = Ielts::find($ielts);
        return view('admin.IELTS.edit_ielts_course')->with('Ielts',Ielts::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ielts  $ielts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$ielts)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $ielts = Ielts::find($ielts);
        $ielts ->ielts_course_name = $request->ielts_course_name;
        $ielts ->ielts_course_description = $request->ielts_course_description;
        $ielts ->ielts_course_price = $request->ielts_course_price;
        $ielts ->ielts_course_teacher_name = $request->ielts_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $ielts->image=$filename;}
        $ielts ->save();
        return redirect('admin_home/index_ielts')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ielts  $ielts
     * @return \Illuminate\Http\Response
     */
    public function destroy($ielts)
    {
        $ielts = Ielts::find($ielts);
        Storage::disk('public')->delete($ielts->image);
        $ielts->delete();
        return redirect('/admin_home/index_ielts')->with(['success'=> __('IELTS Deleted successfuly')]);
    }
}

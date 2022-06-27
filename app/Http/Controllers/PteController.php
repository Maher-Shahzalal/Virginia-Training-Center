<?php

namespace App\Http\Controllers;

use App\Models\Pte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class PteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pte = \App\Models\Pte::all();
        return view('admin.PTE.index_pte')->with('Pte',Pte::all());
    }

    public function indexx()
    {
        $pte = \App\Models\Pte::all();
        return view('Project.Professional_Courses.PTE')->with('Pte',Pte::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.PTE.add_pte_course');
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
        $pte = new Pte();
        $pte ->pte_course_name = $request->pte_course_name;
        $pte ->pte_course_description = $request->pte_course_description;
        $pte ->pte_course_price = $request->pte_course_price;
        $pte ->pte_course_teacher_name = $request->pte_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $pte->image=$filename;}
        $pte ->save();
        return redirect('admin_home/index_pte')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'pte_course_name'      => 'required|max:25',
            'pte_course_description'       => 'required|max:25',
            'pte_course_price'           => 'required|numeric',
            'pte_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'pte_course_name.required'      => __('Course name of the PTE is required'),
            'pte_course_description.required'       => __('Description of the PTE course is required'),
            'pte_course_price.required' => __('Price of the PTE course is required'),
            'pte_course_teacher_name.required'         => __('Name of the PTE course is required'),
            'image.required'         => __('Image of the PTE course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pte  $pte
     * @return \Illuminate\Http\Response
     */
    public function show(Pte $pte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pte  $pte
     * @return \Illuminate\Http\Response
     */
    public function edit(Pte $pte)
    {
        $pte = Pte::find($pte);
        return view('admin.PTE.edit_pte_course')->with('Pte',Pte::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pte  $pte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$pte)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $pte = Pte::find($pte);
        $pte ->pte_course_name = $request->pte_course_name;
        $pte ->pte_course_description = $request->pte_course_description;
        $pte ->pte_course_price = $request->pte_course_price;
        $pte ->pte_course_teacher_name = $request->pte_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $pte->image=$filename;}
        $pte ->save();
        return redirect('admin_home/index_pte')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pte  $pte
     * @return \Illuminate\Http\Response
     */
    public function destroy($pte)
    {
        $pte = Pte::find($pte);
        Storage::disk('public')->delete($pte->image);
        $pte->delete();
        return redirect('/admin_home/index_pte')->with(['success'=> __('PTE Deleted successfuly')]);
    }
}

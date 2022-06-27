<?php

namespace App\Http\Controllers\ProfessionalEnglish;

use App\Models\ProfessionalEnglish\English_Media;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EnglishMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english_Media = \App\Models\ProfessionalEnglish\English_Media::all();
        return view('admin.Professional_English.English_Media.index_english_media')->with('English_Media',English_Media::all());
    }

    public function indexx()
    {
        $english_Media = \App\Models\ProfessionalEnglish\English_Media::all();
        return view('Project.Professional_English.English_Media')->with('English_Media',English_Media::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Professional_English.English_Media.add_english_media_course');
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
        $english_Media = new English_Media();
        $english_Media ->english_media_course_name = $request->english_media_course_name;
        $english_Media ->english_media_course_description = $request->english_media_course_description;
        $english_Media ->english_media_course_price = $request->english_media_course_price;
        $english_Media ->english_media_course_teacher_name = $request->english_media_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_Media->image=$filename;}
        $english_Media->save();
        return redirect('admin_home/index_english_media')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'english_media_course_name'              => 'required|max:25',
            'english_media_course_description'       => 'required|max:25',
            'english_media_course_price'             => 'required|numeric',
            'english_media_course_teacher_name'      => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'english_media_course_name.required'               => __('Course name of the English Media is required'),
            'english_media_course_description.required'        => __('Description of the English Media course is required'),
            'english_media_course_price.required'              => __('Price of the English Media course is required'),
            'english_media_course_teacher_name.required'       => __('Name of the English Media course is required'),
            'image.required'                                        => __('Image of the English Media course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\English_Media  $english_Media
     * @return \Illuminate\Http\Response
     */
    public function show(English_Media $english_Media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\English_Media  $english_Media
     * @return \Illuminate\Http\Response
     */
    public function edit( $english_Media)
    {
        $english_Media = English_Media::find($english_Media);
        return view('admin.Professional_English.English_Media.edit_english_media_course')->with('English_Media',English_Media::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\English_Media  $english_Media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $english_Media)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $english_Media = English_Media::find($english_Media);
        $english_Media->english_media_course_name = $request->english_media_course_name;
        $english_Media->english_media_course_price = $request->english_media_course_price;
        $english_Media->english_media_course_teacher_name = $request->english_media_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $english_Media->image=$filename;}
        $english_Media ->save();
        return redirect('admin_home/index_english_media')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\English_Media  $english_Media
     * @return \Illuminate\Http\Response
     */
    public function destroy( $english_Media)
    {
        $english_Media = English_Media::find($english_Media);
        Storage::disk('public')->delete($english_Media->image);
        $english_Media->delete();
        return redirect('/admin_home/index_english_media')->with(['success'=> __('English Media Deleted successfuly')]);
    }
}

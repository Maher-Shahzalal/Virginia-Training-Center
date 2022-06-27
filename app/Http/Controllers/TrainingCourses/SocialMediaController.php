<?php

namespace App\Http\Controllers\TrainingCourses;


use App\Models\TrainingCourses\Social_Media;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_Media = \App\Models\TrainingCourses\Social_Media::all();
        return view('admin.Training_courses.Social_Media.index_social_media')->with('Social_Media',Social_Media::all());
    }


    public function indexx()
    {
        $social_Media = \App\Models\TrainingCourses\Social_Media::all();
        return view('Project.Training_courses.Social_Media')->with('Social_Media',Social_Media::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Training_courses.Social_Media.add_social_media_course');
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
        $social_Media = new Social_Media();
        $social_Media ->social_media_course_name = $request->social_media_course_name;
        $social_Media ->social_media_course_description = $request->social_media_course_description;
        $social_Media ->social_media_course_price = $request->social_media_course_price;
        $social_Media ->social_media_course_teacher_name = $request->social_media_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $social_Media->image=$filename;}
        $social_Media ->save();
        return redirect('admin_home/index_social_media')->with(['success'=> __('Inserted successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'social_media_course_name'      => 'required|max:25',
            'social_media_course_description'       => 'required|max:25',
            'social_media_course_price'           => 'required|numeric',
            'social_media_course_teacher_name' => 'required|max:25',
            'image' => 'required',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'social_media_course_name.required'      => __('Course name of the Social Media is required'),
            'social_media_course_description.required'       => __('Description of the Social Media course is required'),
            'social_media_course_price.required' => __('Price of the Social Media course is required'),
            'social_media_course_teacher_name.required'         => __('Name of the Social Media course is required'),
            'image.required'         => __('Image of the Social Media course is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Social_Media  $social_Media
     * @return \Illuminate\Http\Response
     */
    public function show(Social_Media $social_Media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Social_Media  $social_Media
     * @return \Illuminate\Http\Response
     */
    public function edit( $social_Media)
    {
        $social_Media = Social_Media::find($social_Media);
        return view('admin.Training_courses.Social_Media.edit_social_media_course')->with('Social_Media',Social_Media::all());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Social_Media  $social_Media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $social_Media)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $social_Media = Social_Media::find($social_Media);
        $social_Media ->social_media_course_name = $request->social_media_course_name;
        $social_Media ->social_media_course_price = $request->social_media_course_price;
        $social_Media ->social_media_course_teacher_name = $request->social_media_course_teacher_name;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/',$filename);
            $social_Media->image=$filename;}
        $social_Media ->save();
        return redirect('admin_home/index_social_media')->with(['success'=> __('Updated successfuly')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social_Media  $social_Media
     * @return \Illuminate\Http\Response
     */
    public function destroy( $social_Media)
    {
        $social_Media = Social_Media::find($social_Media);
        Storage::disk('public')->delete($social_Media->image);
        $social_Media->delete();
        return redirect('/admin_home/index_social_media')->with(['success'=> __('Social Media Deleted successfuly')]);
    }
}

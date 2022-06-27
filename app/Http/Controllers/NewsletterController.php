<?php

namespace App\Http\Controllers;


use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletter = \App\Models\Newsletter::all();
        return view('admin.Newsletter.index_newsletter')->with('Newsletter',Newsletter::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $newsletter = new Newsletter();
        $newsletter ->email = $request->email;
        $newsletter ->save();
        return redirect('..')->with(['success'=> __('Sent it successfuly')]);
    }

    protected function getRules()
    {
        $rules =[
            'email'      => 'required|max:25',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'email.required'      => __('Email is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy( $newsletter)
    {
        $newsletter = Newsletter::find($newsletter);
        $newsletter->delete();
        return redirect('/admin_home/index_newsletter')->with(['success'=> __('Newsletter Deleted successfuly')]);
    }
}

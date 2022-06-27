<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = \App\Models\Contact::all();
        return view('admin.index_contact')->with('Contact',Contact::all());
    }

    public function indexx()
    {
        $contact = \App\Models\Contact::all();
        return view('about')->with('Contact',Contact::all());
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
        $contact = new Contact();
        $contact ->contact_name = $request->contact_name;
        $contact ->contact_email = $request->contact_email;
        $contact ->contact_subject = $request->contact_subject;
        $contact ->contact_message = $request->contact_message;
        $contact ->save();
        return redirect('..')->with(['success'=> __('Sent it successfuly')]);
    }


    protected function getRules()
    {
        $rules =[
            'contact_name'      => 'required|max:25',
            'contact_email'       => 'required|max:25',
            'contact_subject'           => 'required|max:25',
            'contact_message' => 'required|max:50',
        ];
        return $rules;
    }

    protected function getMessages()
    {
        $messages =[
            'contact_name.required'      => __('Your name is required'),
            'contact_email.required'       => __('Your email is required'),
            'contact_subject.required' => __('Subject is required'),
            'contact_message.required'         => __('Your message is required'),
        ];
        return $messages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($contact)
    {
        $contact = Contact::find($contact);
        $contact->delete();
        return redirect('/admin_home/index_contact')->with(['success'=> __('Contact Deleted successfuly')]);
    }
}

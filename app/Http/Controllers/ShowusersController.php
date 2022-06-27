<?php

namespace App\Http\Controllers;

use App\Showusers;
use App\User;
use Illuminate\Http\Request;

class ShowusersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = \App\Showusers::all();
        return view('admin.showusers')->with('Showusers',Showusers::all())->with('User',User::all());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Showusers  $showusers
     * @return \Illuminate\Http\Response
     */
    public function show(Showusers $showusers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Showusers  $showusers
     * @return \Illuminate\Http\Response
     */
    public function edit(Showusers $showusers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Showusers  $showusers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showusers $showusers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Showusers  $showusers
     * @return \Illuminate\Http\Response
     */
    public function destroy($showusers)
    {
        //
    }
}

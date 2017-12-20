<?php

namespace App\Http\Controllers;

use App\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees = Degree::orderBy('name')->get();

        return view('degrees.home',compact('degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('degrees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required'
        ]);
        Degree::create([
            'name' => $request['name']
        ]);

        return redirect('/degrees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Degree  $degrees
     * @return \Illuminate\Http\Response
     */
    public function show(Degree $degree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Degree  $degrees
     * @return \Illuminate\Http\Response
     */
    public function edit(Degree $degree)
    {
        return view('degrees.edit',compact('degree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Degree  $degrees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Degree $degree)
    {
        $degree->update([
            'name'=>$request['name']
        ]);

        return redirect('/degrees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Degree  $degrees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Degree $degree)
    {
        $degree->delete();

        return redirect('/degrees');
    }
}

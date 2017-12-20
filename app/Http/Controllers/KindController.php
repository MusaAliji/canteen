<?php

namespace App\Http\Controllers;

use App\Kind;
use Illuminate\Http\Request;

class KindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kinds = Kind::all();

        return view('kinds.home', compact('kinds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kinds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kind::create([
            'name'=>$request['name']
        ]);

        return redirect('/kinds');
    }

    /**
     * Display the specified resource.
     *
     * @param Kind $kind
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Kind $kind)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Kind $kind
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Kind $kind)
    {
        return view('kinds.edit', compact('kind'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Kind $kind
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Kind $kind)
    {
        $kind->update([
            'name' => $request['name']
        ]);

        return redirect('/kinds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Kind $kind
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Kind $kind)
    {
        $kind->delete();

        return redirect('/kinds');
    }
}

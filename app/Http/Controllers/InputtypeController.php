<?php

namespace App\Http\Controllers;

use App\Models\Inputtype;
use Illuminate\Http\Request;

class InputtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Inputtype::all();

        return view('/inputtypes/index', ['types'=>$types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/inputtypes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        //dd($request);
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        Inputtype::create([
            'name' => request('name')
        ]);

        return back()->with('success', 'Sucessfully inserted a new type!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inputtype  $inputtype
     * @return \Illuminate\Http\Response
     */
    public function show(Inputtype $inputtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inputtype  $inputtype
     * @return \Illuminate\Http\Response
     */
    public function edit(Inputtype $inputtype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inputtype  $inputtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inputtype $inputtype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inputtype  $inputtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inputtype $inputtype)
    {
        //
    }
}

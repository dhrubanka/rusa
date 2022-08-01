<?php

namespace App\Http\Controllers;

use App\Models\Input;
use App\Models\Inputtype;
use App\Models\Record;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTypes(Request $request, $id)
    {

        echo json_encode(['inputs' => Input::where('input_type_id', '=', $id)->get()]);;
    }
    public function stockCount(Request $request, $name)
    {

        echo json_encode(['inputs' => Input::where('input_type_id', '=', $id)->get()]);;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // $record = Record::find($id);
        // $stock = Stock::where('record_id','=', $id)->sum('stock_number');
        // dd($stock);
        $input_types = Inputtype::all();

        return view('stock/create',['record_id' => $id, 'inputtypes' => $input_types]);
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
            'record_id' => 'required',
            'name' => 'required',
            'stock_number' => 'required',
            'issue_person' => 'required',
            'receive_person' => 'required',
            'date_of_receive' => 'required', 
        ]);

        $stock = Stock::create([
             
            'record_id' => request('record_id'),
            'name' => request('name'),
            'stock_number' => request('stock_number'),
            'issue_person' => request('issue_person'),
            'receive_person' => request('receive_person'),
            'date_of_receive' => request('date_of_receive')
        ]);

         

        return back()->with('success', 'Sucessfully inserted !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Input;
use App\Models\Inputtype;
use App\Models\Record;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create(Request $request)
    {   
        $record_id = request('record_id');
        $available = request('available');
        $name = request('name');
        // $record = Record::find($id);
        // $stock = Stock::where('record_id','=', $id)->sum('stock_number');
        //dd($request);
        $input_types = Inputtype::all();

        return view('stock/create', ['record_id' => $record_id, 'available' => $available, 'name' => $name]);
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
            
            'name' => 'required',
            'stock_number' => 'required',
             
            'receive_person' => 'required',
            'date_of_receive' => 'required', 
        ]);

        $stock = Stock::create([
             
            'user_id' =>Auth::user()->id,
            'name' => request('name'),
            'stock_number' => request('stock_number'),
            'issue_person' => Auth::user()->name,
            'receive_person' => request('receive_person'),
            'date_of_receive' => request('date_of_receive')
        ]);

        return redirect('/stocks/'.request('record_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $total_stocks = Record::where('user_id', Auth::user()->id)->with('particulars')->with('monetaries')->get();
        //dd($total_stocks);
        if($total_stocks[0]){
            $particulars = $total_stocks[0]->particulars;
        }
        $sum  = 0;
        $found = 0;
        foreach($total_stocks as $total_stock){
            foreach($total_stock->particulars as $particular){
                    foreach($particulars as $p){
                        if($p->name == $particular->name ){
                            $p->value += $particular->value;
                            $found = 1;
                        }
                    }
                    if($found==0){
                        $particulars->push($particular);
                    }
                    
                    $sum += $particular->stock_number;
            }
            $found = 0;
         //   print($total_stock->particulars);
        }
        //print($particulars);
       // $particulars = $total_stocks->particulars;
        $total = $particulars->sum('value');
        foreach($particulars as $particular){
            $stock_sum = Stock::where('user_id', Auth::user()->id)->where('name', $particular->name)->sum('stock_number');
            //array_push($particular, ['used' => $stock_sum]);
            $particular->used = $stock_sum;
            $particular->available = $particular->value - $stock_sum;
           // print('used'.$stock_sum);
          //  print($particular.'\n');
        }
       // print($particulars);
        // $mon = $total_stocks->particulars->sum('value');
        $stocks = Stock::where('user_id',Auth::user()->id)->get();
        $used = $stocks->sum('stock_number');
       // dd($stocks);
        return view('stock/index', ['stocks'=>$stocks, 'total'=> $total, 'used'=>$used, 'free'=>($total-$used), 'particulars'=>$particulars, 'user_id'=>Auth::user()->id]);
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

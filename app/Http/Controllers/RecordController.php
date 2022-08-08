<?php

namespace App\Http\Controllers;

use App\Models\Input;
use App\Models\Inputtype;
use App\Models\Monetary;
use App\Models\Particular;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function __construct()  
    {  
        // $this->middleware('regular')->only(['create','store', 'show']);  
    }  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $record = Record::where('user_id',Auth::user()->id)->with('particulars')->with('monetaries')->get();
        //dd($record);
        return view('/records/index',['records'=>$record]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $inputtypes = Inputtype::all();

        return view('/records/create', ['inputtypes'=>$inputtypes]);
    }

    public function getTypes(Request $request, $id)
    {

        echo json_encode(Input::where('input_type_id', '=', $id)->get());;
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
            'inputtype' => 'required',
            'particulars' => 'required',
            'monetary' => 'required',
            'fund' => 'required',
            'specification' => 'required',
            'unique_id' => 'required',
            'mode_of_purchase' => 'required',
            'date_of_purchase' => 'required',
        ]);

        $record = Record::create([
            'user_id' => Auth::user()->id,
            'input_type_id' => request('inputtype'),
            'fund_source' => request('fund'),
            'specification_of_the_asset' => request('specification'),
            'unique_id' => request('unique_id'),
            'mode_of_purchase' => request('mode_of_purchase'),
            'date_of_purchase' => request('date_of_purchase')
        ]);

        if(request('particulars')){
            foreach ($request->particulars as $key => $value) {
                Particular::create([
                    'record_id' => $record->id,
                    'name' => $value['name'],
                    'value' => $value['value'], 
                ]);
            }
        }

        if(request('monetary')){
            foreach ($request->monetary as $key => $value) {
                Monetary::create([
                    'record_id' => $record->id,
                    'name' => $value['name'],
                    'value' => $value['value'], 
                ]);
            }
        }

        return back()->with('success', 'Sucessfully inserted a new type!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $record = Record::where('id',$id)->with('particulars')->with('monetaries')->get();
        //dd($record);
        if($record->isNotEmpty()){
                if(  (Auth::user()->id == $record[0]->user_id)){
                    return view('/records/show',['record'=>$record]);
                }else{
                    abort(403);
                }
        }else{
                 return view('/records/show',['record'=>$record]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record, $id)
    {
        $record = Record::find($id);
        //dd($record);
        $inputtypes = Inputtype::all();
        return view('/records/edit',['record'=> $record, 'inputtypes'=>$inputtypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Record::find($id);
        //dd('gg');
        $record->update([
            
            // 'input_type_id' => request('inputtype'),
            'fund_source' => request('fund'),
            'specification_of_the_asset' => request('specification'),
            'unique_id' => request('unique_id'),
            'mode_of_purchase' => request('mode_of_purchase'),
            'date_of_purchase' => request('date_of_purchase')
        ]);

        return back()->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $record = Record::find($id);
        $record->delete();

        return redirect('/records');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Coin;
use App\Models\Record;
use App\Models\Subcategory;
use Illuminate\Http\Request;


class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $records = Record::whereNotIn('subcategory_id', [1,2,3])
        ->orderBy('created_at', 'desc');
        
        $start = $request->start;
        $finish = $request->finish;
        $type = $request->type;
        $subcategory_id = $request->subcategory_id;
        $account_id = $request->account_id;

        if (!empty($start && $finish)) {
            $records = $records->whereBetween('created_at', [$request->start, $request->finish]);
        } 
        if ($type > 0) {
            $records = $records->where('type', $type);
        }
        if (!empty($subcategory_id)) {
            $records = $records->where('subcategory_id', $subcategory_id);
        }
        if (!empty($account_id)) {
            $records = $records->where('account_id', $account_id);
        }
        $records = $records->paginate(10);


        $subcategories = Subcategory::whereNotIn('category_id', [1,2,3])->get(); 
        $accounts = Account::all();  
        
        /* $array = json_decode($records, true);
        $filtro_type = $request->type;
        $filtro_account = $request->account_id;
        $fil = array_filter($array, function ($var) use ($filtro_type, $filtro_account) {
            return ($var['type'] == $filtro_type && $var['account_id'] == $filtro_account);
        });
        $suma = array_sum(array_column($fil, 'amount')); */                                                                            
        

        return view('record.index', compact('records', 'subcategories', 'accounts'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('record.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        return view('record.edit', ['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $record->update($request->all());

        return redirect()->route('record.index', $record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record->delete();

        session()->flash('mensaje', 'El Registro se elimino con Exito');

        return redirect()->route('record.index');
    }
}

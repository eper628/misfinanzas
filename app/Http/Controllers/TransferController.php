<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $records = Record::select('records.*', 'transfers.id AS idtransf')
        ->join('transfers', 'records.id_transfer', '=', 'transfers.id')
        ->where('records.subcategory_id', 3)
        ->orderBy('created_at', 'desc')->paginate(10);
        
        return view('transfer.index', compact('records'));
    }

    public function create()
    {
        return view('transfer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    public function edit(Record $record)
    {
        return view('transfer.edit', ['record' => $record]);
    }
    /* {
        
        $transfers = Transfer::where('id', $record->id_transfer)->get();
        
        foreach ($transfers as $transfer) {
            $a = $transfer->id_add;
            $b = $transfer->id_out;
        }
        
        $accounts = Account::all();
        $out = Record::where('id', $a)->first();
        $add = Record::where('id', $b)->first();
        
        return view('transfer.edit', compact('record', 'accounts', 'out', 'add'));
    } */

    public function update(Request $request, Record $record)
    {
        /* $transfers = Transfer::where('id', $record->id_transfer)->get();
        
        foreach ($transfers as $transfer) {
            $a = $transfer->id_add;
            $b = $transfer->id_out;
        }

        $record = Record::find($a);
        $record->created_at = $request->created_at;
        $record->concept = 'Transf Interna';
        $record->type = 2;
        $record->amount = $request->amount;
        $record->account_id = $request->account_id_out;
        $record->subcategory_id = 3;
        $record->save();

        $record = Record::find($b);
        $record->created_at = $request->created_at;
        $record->concept = 'Transf Interna';
        $record->type = 1;
        $record->amount = $request->amount;
        $record->account_id = $request->account_id_add;
        $record->subcategory_id = 3;
        $record->save(); */

        return redirect()->route('transfer.index');
    }

    public function destroy(Record $record)
    {
        $transfers = Transfer::where('id', $record->id_transfer)->get();
        
        foreach ($transfers as $transfer) {
            $a = $transfer->id_add;
            $b = $transfer->id_out;
        }

        $record = Record::find($a)->delete();
        $record = Record::find($b)->delete();
        
        session()->flash('mensaje', 'La Transferencia se elimino con Exito');

        return redirect()->route('transfer.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Record;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AccountSettingController extends Controller
{
    public function index()
    {
        $records = Record::whereIn('subcategory_id', [1,2])
        ->orderBy('created_at', 'desc')
        ->get();

        return view('account-setting.index', compact('records'));
    }

    public function create()
    {
        $accounts = Account::all();

        $subcategories = Subcategory::whereIn('category_id', [1,2])->get();

        return view('account-setting.create', compact('accounts', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['created_at' => 'required',
             'concept' => 'required',
             'type' => 'required',
             'amount' => 'required',
             'account_id' => 'required',
             'subcategory_id' => 'required',
            ]
        );

        $record = new Record();
        $record->created_at = $request->created_at;
        $record->concept = $request->concept;
        $record->type = $request->type;
        $record->amount = $request->amount;
        $record->account_id = $request->account_id;
        $record->subcategory_id = $request->subcategory_id;

        $record->save();

        session()->flash('mensaje', 'El Ajuste se generó con Éxito');

        return redirect()->route('account-setting.index');
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
        $accounts = Account::all();

        $subcategories = Subcategory::whereIn('category_id', [1,2])->get();

        return view('account-setting.edit', compact('record', 'accounts', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $request->validate(
            ['created_at' => 'required',
             'concept' => 'required',
             'type' => 'required',
             'amount' => 'required',
             'account_id' => 'required',
             'subcategory_id' => 'required',
            ]
        );

        $record->created_at = $request->created_at;
        $record->concept = $request->concept;
        $record->type = $request->type;
        $record->amount = $request->amount;
        $record->account_id = $request->account_id;
        $record->subcategory_id = $request->subcategory_id;

        $record->save();

        session()->flash('mensaje', 'El Ajuste se actualizo con Éxito');

        return redirect()->route('account-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        session()->flash('mensaje', 'El Ajuste se Elimino con Éxito');

        return redirect()->route('account-setting.index');
    }
}

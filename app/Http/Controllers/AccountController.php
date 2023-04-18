<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Coin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $accounts = Account::all();

        return view('account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coins = Coin::all();

        return view('account.create', compact('coins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required',
             'type' => 'required',
             'coin_id' => 'required',
             'status' => 'required',
            ]
        );
        
        $account = new Account;
        $account->name = Str::upper($request->name);
        $account->slug = Str::slug($request->name);
        $account->type = $request->type;
        $account->coin_id = $request->coin_id;
        $account->status = $request->status;
        $account->save();
        
        session()->flash('mensaje', 'La Cuenta se genero con Exito');

        return redirect()->route('account.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $coins = Coin::all();

        return view('account.edit', compact('account', 'coins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $request->validate(
            ['name' => 'required',
             'type' => 'required',
             'coin_id' => 'required',
             'status' => 'required',
            ]
        );

        $account->name = Str::upper($request->name);
        $account->slug = Str::slug($request->name);
        $account->type = $request->type;
        $account->coin_id = $request->coin_id;
        $account->status = $request->status;
        $account->save();

        session()->flash('mensaje', 'La Cuenta se actualizo con Exito');

        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        session()->flash('mensaje', 'La Cuenta se elimino con Exito');

        return redirect()->route('account.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $accounts = DB::table('accounts')
        
        ->select('accounts.name', 'accounts.type', 'accounts.coin_id', 'coins.name AS moneda', 'accounts.status', DB::raw("SUM( CASE WHEN records.type = 2 THEN records.amount * -1 WHEN records.type = 1 THEN records.amount ELSE 0 END ) AS saldo"))
        ->join('records', 'records.account_id', '=', 'accounts.id')
        ->join('coins', 'coins.id', '=', 'accounts.coin_id')
        ->groupBy('account_id') 
        ->get();
        
        return view('home', compact('accounts'));
        

        
        /* $accounts = Account::with('record')
        ->whereHas('record', function($query) {
            $query->where('type', 1);
        })
        ->get();
        foreach ($accounts as $account) {
            $total = $account->record->sum('amount');
        }
        dd($total); */
        
        /* $accounts = DB::table('accounts')
        ->select('accounts.*', 'coins.name AS moneda')
        ->join('coins', 'coins.id', '=', 'accounts.coin_id')
        ->where('type', '1') 
        ->orwhere(function($query){
            $query->where('coin_id', 1);
        })
        ->get();
        return view('home', compact('accounts')); */

        /* $accounts = Account::select("name", "type", "coin_id", "status")
                ->withSum(['record' => function($query) {
                        $query->where('type', '1');
                    }], 'amount')          
                ->get();  */ 
                
        
             
        
        /* $accounts = Account::select("id", "name")
                ->withSum('record', 'amount')
                ->get()
                ->toArray(); */
        /* ->addSelect(DB::raw("'type' as someValues")) */
        /* $accounts = Account::all();
        $ids = 0;
            Record::where('account_id', $ids)->where('type', "1")->sum('amount') -
            Record::where('account_id', $ids)->where('type', "2")->sum('amount'); */
        
        
        /* $id = 1;
        $saldo = Record::where('account_id', $id)->where('type', "1")->sum('amount') -
        Record::where('account_id', $id)->where('type', "2")->sum('amount'); */
        
    }
}

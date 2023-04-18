<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Coin;
use App\Models\Record;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CreateTransfer extends Component
{
    public $created_at;
    public $amount;
    public $account_id_out;
    public $account_id_add = "";

    public $accountsOut;
    public $accountsAdd;

    public $coinsOut;
    public $coinsAdd;

    public $saldoOut;
    public $saldoAdd;

    public function mount()
    {
        $this->accountsOut = Account::all();
        $this->accountsAdd = Account::all();
        $this->coinsOut = Coin::all();
        $this->coinsAdd = Coin::all();
    }

    public function updatedAccountIdOut($value)
    {
        $this->coinsOut = Coin::whereHas('account', function(Builder $query) use ($value){
            $query->where('id', $value); 
        })->get();
        
        $this->saldoOut = Record::where('account_id', $value)->where('type', "1")->sum('amount') -
        Record::where('account_id', $value)->where('type', "2")->sum('amount');

        $this->accountsAdd = Account::where('id', '<>', $value)->get();
    }

    public function updatedAccountIdAdd($value)
    {
        $this->coinsAdd = Coin::whereHas('account', function(Builder $query) use ($value){
            $query->where('id', $value); 
        })->get();
        
        $this->saldoAdd = Record::where('account_id', $value)->where('type', "1")->sum('amount') -
        Record::where('account_id', $value)->where('type', "2")->sum('amount');
    }

    protected $rules = [
        'created_at' => 'required',
        'account_id_out' => 'required',
        'account_id_add' => 'required',
        'amount' => 'required',
    ];

    public function crearTransfer()
    {
        $rules = $this->rules;
        $this->validate($rules);

        $record_add = Record::insertGetId([
            'created_at' => $this->created_at,
            'concept' => 'Transf Interna',
            'type' => 2,
            'amount' => $this->amount,
            'account_id' => $this->account_id_out,
            'subcategory_id' => 3,
            'updated_at' => now()
            ]);

        $record_out = Record::insertGetId([
            'created_at' => $this->created_at,
            'concept' => 'Transf Interna',
            'type' => 1,
            'amount' => $this->amount,
            'account_id' => $this->account_id_add,
            'subcategory_id' => 3,
            'updated_at' => now()
            ]);
        
        $transfer = new Transfer();
        $transfer->id_add = $record_add;
        $transfer->id_out = $record_out;
        $transfer->save();
        
        $record = Record::find($record_add);
        $record->id_transfer = $transfer->id;
        $record->save();
        
        $record = Record::find($record_out);
        $record->id_transfer = $transfer->id;
        $record->save(); 

        session()->flash('mensaje', 'La Transferencia se generó con Éxito');

        return redirect()->route('transfer.index');
    }

    public function render()
    {
        return view('livewire.create-transfer');
    }
}

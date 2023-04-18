<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Record;
use App\Models\Coin;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CreateRecord extends Component
{
    public $created_at;
    public $concept;
    public $type;
    public $amount;
    public $account_id;
    public $categories = [];
    public $subcategories = [];
    public $category_id = "";
    public $subcategory_id = "";
    public $coins;
    public $saldo;

    public function mount()
    {
        $this->categories = Category::where('type', '<>', 3)->where('type', '<>', 4)->get();
        $this->coins = Coin::all();
    }

    public function updatedType($value)
    {    
        $this->categories = Category::where('type', $value)->get();
        $this->reset(['category_id', 'subcategory_id']);
    }

    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id', $value)->get();
        $this->reset(['subcategory_id']);
    }

    public function updatedAccountId($value)
    {
        $this->coins = Coin::whereHas('account', function(Builder $query) use ($value){
            $query->where('id', $value); 
        })->get();
        
        $this->saldo = Record::where('account_id', $value)->where('type', "1")->sum('amount') -
        Record::where('account_id', $value)->where('type', "2")->sum('amount');
    }
    
    protected $rules = [
        'created_at' => 'required',
        'concept' => 'required',
        'type' => 'required',
        'amount' => 'required',
        'account_id' => 'required',
        'category_id' => 'required',
        'subcategory_id' => 'required'
    ];

    public function crearRecord()
    {
        $rules = $this->rules;
        $this->validate($rules);

        $record = new Record();
        $record->created_at = $this->created_at;
        $record->concept = $this->concept;
        $record->type = $this->type;
        $record->amount = $this->amount;
        $record->account_id = $this->account_id;
        $record->subcategory_id = $this->subcategory_id;
        $record->save();
        
        session()->flash('mensaje', 'El Registro se generó con Éxito');

        return redirect()->route('record.index');
    }

    public function render()
    {
        $accounts = Account::all();
        return view('livewire.create-record', [
            'accounts' => $accounts
        ]);
    }
}

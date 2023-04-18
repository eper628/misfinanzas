<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Record;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EditRecord extends Component
{
    public $record_id;
    public $created_at;
    public $concept;
    public $type;
    public $amount;
    public $account_id;
    public $subcategory_id;

    public function mount(Record $record)
    {
        $this->record_id = $record->id;
        $this->created_at = Carbon::parse( $record->created_at )->format('Y-m-d');
        $this->concept = $record->concept;
        $this->type = $record->type;
        $this->amount = $record->amount;
        $this->account_id = $record->account_id;
        $this->subcategory_id = $record->subcategory_id;
    }

    protected $rules = [
        'created_at' => 'required',
        'concept' => 'required',
        'type' => 'required',
        'amount' => 'required',
        'account_id' => 'required',
        'subcategory_id' => 'required'
    ];

    public function editarRecord()
    {
        $datos = $this->validate();

        $record = Record::find($this->record_id);
        $record->created_at = $datos['created_at'];
        $record->concept = $datos['concept'];
        $record->type = $datos['type'];
        $record->amount = $datos['amount'];
        $record->account_id = $datos['account_id'];
        $record->subcategory_id = $datos['subcategory_id'];
        $record->save();

        session()->flash('mensaje', 'El Registro se actualizo con Exito');
        
        return redirect()->route('record.index');
    }

    public function render()
    {
        $accounts = Account::all();
        $subcategories = Subcategory::whereNotIn('category_id', [1,2,3])->get();
        return view('livewire.edit-record', [
            'accounts' => $accounts,
            'subcategories' => $subcategories
        ]);
    }
}

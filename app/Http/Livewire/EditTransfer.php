<?php

namespace App\Http\Livewire;

use App\Models\Record;
use App\Models\Transfer;
use App\Models\Account;
use App\Models\Coin;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;


class EditTransfer extends Component
{
    public $recordOut_id;
    public $recordAdd_id;

    public $created_at;
    public $amount;
    public $account_id_out;
    public $account_id_add;
    public $accountsOut;
    public $accountsAdd;
    public $out;
    public $add;

    public function mount(Record $record)
    {
        $transfers = Transfer::where('id', $record->id_transfer)->get();
        
        foreach ($transfers as $transfer) {
            $a = $transfer->id_add;
            $b = $transfer->id_out;
        }
        
        $this->accountsOut = Account::all();
        $this->accountsAdd = Account::all();

        $this->out = Record::where('id', $a)->first();
        $this->recordOut_id = $this->out->id;
        $this->created_at = Carbon::parse( $this->out->created_at )->format('Y-m-d');
        $this->amount = $this->out->amount;
        $this->account_id_out = $this->out->account_id;

        $this->add = Record::where('id', $b)->first();
        $this->recordAdd_id = $this->add->id;
        $this->account_id_add = $this->add->account_id;

    }

    protected $rules = [
        'created_at' => 'required',
        'account_id_out' => 'required',
        'account_id_add' => 'required',
        'amount' => 'required',
    ];

    public function editarTransfer()
    {
        $datos = $this->validate();

        $record = Record::find($this->recordOut_id);
        $record->created_at = $datos['created_at'];
        $record->concept = 'Transf Interna';
        $record->type = 2;
        $record->amount = $datos['amount'];
        $record->account_id = $datos['account_id_out'];
        $record->subcategory_id = 3;
        $record->save();

        $record = Record::find($this->recordAdd_id);
        $record->created_at = $datos['created_at'];
        $record->concept = 'Transf Interna';
        $record->type = 1;
        $record->amount = $datos['amount'];
        $record->account_id = $datos['account_id_add'];
        $record->subcategory_id = 3;
        $record->save();
        

        session()->flash('mensaje', 'La Transferencia se actualizo con Exito');
        
        return redirect()->route('transfer.index');
    }

    public function render()
    {
        return view('livewire.edit-transfer');
    }
}

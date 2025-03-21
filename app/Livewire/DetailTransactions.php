<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class DetailTransactions extends Component
{
    use WithPagination,WithoutUrlPagination;
    #[On('detail-transaction')]
    public function render()
    {
        return view('livewire.detail-transactions',[
            'transactions' => Transaction::paginate(5)
        ]);
    }

    public function proccess($id){
        $proccessStatus = Transaction::find($id);
        
        $proccessStatus->update([
            'status' => 'proccess'
        ]);
        
        session()->flash('success','Berhasil proses data');
        $this->reset();
    }
    
    public function finish($id){
        $finishStatus = Transaction::find($id);

        $finishStatus->update([
            'status' => 'finish'
        ]);
        session()->flash('success','Berhasil selesai data');
        $this->reset();
    }
}

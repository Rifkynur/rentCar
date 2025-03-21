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
}

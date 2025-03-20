<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class TransactionsComponent extends Component
{
    use WithPagination,WithoutUrlPagination;
    public $car_id,$name,$phone,$address,$rentTime,$rentDate,$total,$status;
    public $addPage,$editPage = false;

    protected $rules = [
        'name' => ['required'],
        'phone' => ['required','regex:/^08[0-9]{8,12}$/'],
        'address' => ['required'],
        'rentTime' => ['required','gt:0'],
        'rentDate' => ['required'],
    ];

    protected $messages = [
        'name.required' => "Nama wajib diisi",
        'phone.required' => "Nomer ponsel wajib diisi",
        'phone.regex' => "Nomer ponsel tidak valid",
        'address.required' => "Alamat wajib diisi",
        'rentTime.required' => "Lama sewa wajib diisi",
        'rentTime.gt' => "Lama sewa harus lebih dari 0",
        'rentDate.required' => "Tanggal sewa wajib diisi",
    ];
    
    public function render()
    {
        return view('livewire.transactions-component',[
            'cars' => Car::paginate(5)
        ]);
    }

    public function create($id){
        $this->reset();
        $this->car_id = $id;
        $this->addPage = true;
    }

    public function store (){
        $this->validate();
        
        Transaction::create([
            'name' => $this->name,
            'car_id' => $this->car_id,
            'user_id' => Auth::user()->id,
            ''

        ]);
    }
}

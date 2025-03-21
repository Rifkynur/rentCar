<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;

class TransactionsComponent extends Component
{
    use WithPagination,WithoutUrlPagination;
    public $car_id,$name,$phone,$address,$rentTime,$rentDate,$total,$status,$price;
    public $addPage,$detailPage = false;

    public function totalPrice(){
        $this->total = $this->rentTime * $this->price;
    }

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

    public function create($id,$price){
        $this->reset();
        $this->car_id = $id;
        $this->price = $price;
        $this->addPage = true;
    }

    public function store (){
        $this->validate();
        
        $availableCar = Transaction::where('car_id',$this->car_id)->whereNot('status','finish')->first();


        if($availableCar){
            session()->flash('error','Mobil sudah ada yang memesan');
        }else{
            Transaction::create([
                'name' => $this->name,
                'car_id' => $this->car_id,
                'user_id' => Auth::user()->id,
                'phone' => $this->phone,
                'address' => $this->address,
                'rentTime' => $this->rentTime,
                'rentDate' => $this->rentDate,
                'total' => $this->total,
                'status' => 'wait'
            ]);
    
            session()->flash('success','Transaksi berhasil dibuat');    
        }
        $this->dispatch('detail-transaction');
        $this->reset();

    }

    public function detail(){
        $this->reset();

        // $this->
    }
}

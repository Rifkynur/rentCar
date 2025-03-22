<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithoutUrlPagination;

class ReportComponent extends Component
{
    use WithPagination,WithoutUrlPagination;

    public $date1,$date2;
    #[On('report')]
    public function render()
    {
        if($this->date2){
        return view('livewire.report-component',[
            'reports' => Transaction::where('status','finish')->whereBetween('rentDate',[$this->date1,$this->date2])->paginate(5) 
        ]);
        }else{
        return view('livewire.report-component',[
            "reports" => Transaction::Where('status','finish')->paginate(5)
        ]);
        }
    }

    public function find(){
        $this->validate([
            'date1' => ['required'],
            'date2' => ['required','after:date1']
        ],[
            'date1.required' => 'Tanggal wajib diisi',
            'date2.required' => 'Tanggal wajib diisi',
            'date2.after' => 'Tanggal yang anda masukan salah',
        ]);

        $this->dispatch('report');
    }

    public function export(){
        if($this->date2){
            $data = Transaction::where('status','finish')->whereBetween('rentDate',[$this->date1,$this->date2])->get(); 
            $pdf = Pdf::loadView('reports.export',['transactions' => $data])->output();
            return response()->streamDownload(
                fn () => print($pdf),
                'invoice.pdf');
        }else{
            $data = Transaction::where('status','finish')->get();
            $pdf = Pdf::loadView('reports.export',['transactions' => $data])->output();
            return response()->streamDownload(
                fn () => print($pdf),
                'invoice.pdf');
        }
    }
}

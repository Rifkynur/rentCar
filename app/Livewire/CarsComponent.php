<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarsComponent extends Component
{
    use WithPagination,WithFileUploads,WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public $addPage,$editPage = false;

    public $user_id,$policeNumber,$merk,$type,$capacity,$price,$photo,$id;

    protected $rules = [
        'policeNumber' => ['required'],
        'merk' => ['required'],
        'type' => ['required','in:suv,mpv,sedan'],
        'capacity' => ['required'],
        'price' => ['required'],
        'photo' => ['required','image','max:2024'],
    ];

    protected $messages = [
        'policeNumber.required' => "Nomer polisi wajib diisi",
        'merk.required' => "Merk wajib diisi",
        'type.required' => "Tipe wajib diisi",
        'type.in' => "Tipe tidak sesuai",
        'capacity.required' => "Kapasitas wajib diisi",
        'price.required' => "Harga wajib diisi",
        'photo.required' => "Foto wajib diisi",
        'photo.image' => "File harus berupa gambar",
        'photo.max' => "Foto maksimal 2 Mb",
    ];
    public function render()
    {
        return view('livewire.cars-component',[
            'cars' => Car::paginate(5)
        ]);
    }

    public function create(){
        $this->reset();
        $this->addPage = true;
    }

    public function store(){
        $this->validate();

        $filename = 'IMG_'.now()->format('Ymd_His') . '_' . Str::random(5) . '.' .$this->photo->getClientOriginalExtension();
        $path = $this->photo->storeAs('cars',$filename,'public');
        
        Car::create([
            'merk' => $this->merk,
            'policeNumber' => $this->policeNumber,
            'type' => $this->type,
            'capacity' => $this->capacity,
            'price' => $this->price,
            'photo' => $filename,
            'user_id' => Auth::user()->id
        ]);

        session()->flash('success','Berhasil menambahkan data');
        $this->reset();
    }

    public function destroy($id){
        $deletedCar  = Car::find($id);
        Storage::disk('public')->delete('cars/' . $deletedCar->image);
        $deletedCar->delete();
        session()->flash('success', 'Berhasil menghapus data');

        $this->reset();
    }

    public function edit($id){
        $this->reset();
        $this->editPage = true;

        $editedCar = Car::find($id);
        $this->id = $editedCar->id;
        $this->merk = $editedCar->merk;
        $this->type = $editedCar->type;
        $this->capacity = $editedCar->capacity;
        $this->price = $editedCar->price;
        $this->policeNumber = $editedCar->policeNumber;
    }

    public function update(){
        $updatedCar = Car::find($this->id);
        if(empty($this->photo)){
            $updatedCar->update([
                'merk' => $this->merk,
                'policeNumber' => $this->policeNumber,
                'type' => $this->type,
                'capacity' => $this->capacity,
                'price' => $this->price,
            ]);
        }else{
           unlink(public_path('storage/cars/'.$updatedCar->photo));
            $filename = 'IMG_'.now()->format('Ymd_His') . '_' . Str::random(5) . '.' .$this->photo->getClientOriginalExtension();
            $path = $this->photo->storeAs('cars',$filename,'public');

            $updatedCar->update([
                'merk' => $this->merk,
                'policeNumber' => $this->policeNumber,
                'type' => $this->type,
                'capacity' => $this->capacity,
                'price' => $this->price,
                'photo' => $filename
            ]);
        }

        session()->flash('success','Berhasil mengubah data');
        $this->reset();
    }
}

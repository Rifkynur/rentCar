<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination,WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';

    public $addPage,$editPage = false;

    public $name,$email,$password,$role,$id;

    public function render()
    {
        return view('livewire.user-component',[
            'users' => User::paginate(5)
        ]);
    }

    public function create(){
        $this->reset();
        $this->addPage = true;
    }

    public function store(){
        $this->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6'],
            'role' => ['required','in:admin,pemilik']
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.email' => 'Format email salah',
            'email.unique' => 'Email sudah digunakan',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus lebih dari 6',
            'role.required' => 'Role tidak boleh kosong',
            'role.in' => 'Role tidak sesuai',

        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role
        ]);
        session()->flash('success','Berhasil menambahkan data');
        $this->reset();
    }

    public function destroy($id){
        $deletedUser = User::find($id);
        $deletedUser->delete();

        session()->flash('success','Berhasil menghapus data');

        $this->reset();
    }

    public function edit($id){
        $this->reset();

        $editedUser = User::find($id);

        $this->name = $editedUser->name;
        $this->email = $editedUser->email;
        $this->id = $editedUser->id;
        $this->role = $editedUser->role;
        $this->editPage = true;
    }

    public function update(){
        $updatedUser = User::find($this->id);

        if($this->password == ""){
            $updatedUser->Update([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
            ]);
        }else{
            $updatedUser->Update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => $this->role,
            ]);
        }

        session()->flash('success','Berhasil mengubah data'); 

        $this->reset();
    }
}

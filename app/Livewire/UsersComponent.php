<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use WithPagination,WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';

    public $addPage, $editPage = false;
    public $nama, $email, $password, $role, $id;

    public function render()
    {
        $data['user'] = User::paginate(2);
        return view('livewire.users-component', $data);
    }

    public function create()
    {
        $this->reset();
        $this->addPage = true;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ], [
            'nama.required' => 'Nama Tidak Boleh kosong!',
            'email.required' => 'Email Tidak Boleh kosong!',
            'email.email' => 'Format Email Salah!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password Tidak Boleh kosong!',
            'password.min' => 'Password minimal 6 karakter!',
            'role.required' => 'Role Tidak Boleh kosong!'
        ]);
        User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role
        ]);

        session()->flash('success', 'Berhasil Simpan Data!');
        $this->reset(['nama', 'email', 'password', 'role']);
        $this->addPage = false;
    }

    public function distroy($id)
    {
        $cari = User::find($id);
        $cari->delete();
        session()->flash('success', 'Berhasil hapus data!');
        $this->reset();
    }

    public function edit($id)
    {
        $this->reset();
        $cari = User::find($id);
        $this->nama = $cari->name;
        $this->email = $cari->email;
        $this->role = $cari->role;
        $this->id = $cari->id;
        $this->editPage = true;
    }

    public function update()
    {
        $cari = User::find($this->id);
        if($this->password == ""){
            $cari->update([
                'name'=>$this->nama,
                'email'=>$this->email,
                'role'=>$this->role,
            ]);
        }

        else {
            $cari->update([
                'name'=>$this->nama,
                'email'=>$this->email,
                'password'=> Hash::make($this->password),
                'role'=>$this->role,
            ]);
        }
        session()->flash('success', 'Berhasil ubah data!');
        $this->reset();
    }
}

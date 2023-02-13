<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    public $showTable = true;
    public $createForm = false;
    public $updateForm = false;

    public $name;
    public $email;
    public $is_admin;
    public $password;
    

    public $user_id;
    public $edit_name;
    public $edit_email;
    public $edit_is_admin;

    public $search;
    public $totalUser;
    use WithPagination;
    public function render()
    {
        $this->totalUser = ModelsUser::count();
        if ($this->search) {
            $users = ModelsUser::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(6);
            return view('livewire.user', compact('users'))->layout('layout.app');
        }
        $users = ModelsUser::orderBy('id', 'DESC')->paginate(6);

        return view('livewire.user', compact('users'))->layout('layout.app');
    }

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }

    public function resetField()
    {

        $this->name = "";
        $this->email = "";
        $this->is_admin = "";

        $this->user_id = "";
        $this->edit_name = "";
        $this->edit_email = "";
        $this->edit_is_admin = "";

    }
    public function goBack()
    {
        $this->showTable = true;
        $this->createForm = false;
        $this->updateForm = false;
    }


    public function store()
    {
        $validate = $this->validate([
            'name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'unique:users'],
            'is_admin' => ['required'],
            'password' => ['string'],

        ]);

        $validate['password'] = bcrypt($validate['password']);

        $result = ModelsUser::create($validate);
        if ($result) {
            session()->flash('success', 'User Add Successfully');
            $this->showTable = true;
            $this->createForm = false;
            $this->resetField();
        } else {
            session()->flash('error', 'User Not Add Successfully');
        }
    }

    public function editUser($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $users = ModelsUser::findOrFail($id);

        $this->user_id = $users->id;
        $this->edit_name = $users->name;
        $this->edit_email = $users->email;
        $this->edit_is_admin = $users->is_admin;
    }

    public function update($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $users = ModelsUser::findOrFail($id);

        $users->name = $this->edit_name;
        $users->email = $this->edit_email;
        $users->is_admin = $this->edit_is_admin;
        $result = $users->save();
        if ($result) {
            session()->flash('success', 'User Update Successfully');
            $this->showTable = true;
            $this->updateForm = false;
            $this->resetField();
        } else {
            session()->flash('error', 'User Not Update Successfully');
        }
    }

    public function deleteUser($id)
    {
        $result = ModelsUser::findOrFail($id)->delete();
        if ($result) {
            session()->flash('success', 'User Delete Successfully');
        } else {
            session()->flash('error', 'User Not Delete Successfully');
        }
    }
}

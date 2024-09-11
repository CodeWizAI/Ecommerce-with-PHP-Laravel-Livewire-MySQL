<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($fields){
        $this->validateOnly($fields,[
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);
    }
    public function changePassword(){
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);

        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user = User::findOrfail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('success_message',"Password Has Been Changed Successfully");
        }
        else
        {
            session()->flash('password_error','Current Password Does Not Match');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-change-password-component')->layout('layouts.dashboard');
    }
}

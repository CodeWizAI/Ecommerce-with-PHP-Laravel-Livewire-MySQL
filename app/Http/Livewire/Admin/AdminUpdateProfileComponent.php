<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminUpdateProfileComponent extends Component
{
    use WithFileUploads;
    public $user_id;
    public $email;
    public $newimage;
    public $name;
    public $image;

    public function mount($user_id)
    {
        $user = User::find($user_id); 
        $this->name = $user->name;
        $this->email = $user->email;
        $this->image = $user->profile_photo_path;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' =>  ['required', Rule::unique('users')->ignore($this->user_id)],
            'newimage' => 'mimes:jpeg,png',

        ]);

    }
    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($this->user_id)],
            'newimage' => 'mimes:jpeg,png',

        ]);
        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('admin',$imageName);
            $user->profile_photo_path = $imageName;
        }
        $user->save();
        session()->flash('success_message','Profile Updated Successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-update-profile-component')->layout('layouts.dashboard');
    }
}

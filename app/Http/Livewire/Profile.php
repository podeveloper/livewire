<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{

    public $name;
    public $email;
    public $user;
    public $user_id;
    public $success = false;
    public $toggle = false;

    protected $rules = [
        'user.name' => 'min:3',
        'user.email' => 'email',
    ];

    public function mount()
    {
        $this->user = User::find(request()->user_id);
    }
    public function render()
    {
        return view('livewire.profile');
    }

    public function updateprofile()
    {
        $this->validate();

        $this->user->save();

        $this->success = true;
    }

    public function updatedUserName($name)
    {
          $this->validateOnly('user.name');
    }

    public function toggle()
    {
        $this->toggle = !$this->toggle;
    }

}

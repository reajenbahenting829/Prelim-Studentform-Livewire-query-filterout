<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Edit extends Component
{

    public $userId;
    public $lname, $fname, $address, $email, $year, $course;

    public function mount() {
        $this->lname    = $this->user->lname;
        $this->fname    = $this->user->fname;
        $this->address  = $this->user->address;
        $this->email    = $this->user->email;
        $this->year     = $this->user->year;
        $this->course   = $this->user->course;
    }

    public function updateStudent() {
        $this->validate([
            'lname'       =>      ['required', 'string', 'max:255'],
            'fname'       =>      ['required', 'string', 'max:255'],
            'address'     =>      ['required', 'string', 'max:255'],
            'email'       =>      ['required', 'string', 'email', 'max:255', 'unique:users,email,' .$this->user->id],
            'year'        =>      ['required', 'string', 'max:255'],
            'course'      =>      ['required', 'string', 'max:255']
        ]);
        $this->user->update([
            'lname'       =>      $this->lname,
            'fname'       =>      $this->fname,
            'address'     =>      $this->address,
            'email'       =>      $this->email,
            'year'        =>      $this->year,
            'course'      =>      $this->course
        ]);

        return redirect('/')->with('message', 'Updated successfully');
    }

    public function getUserProperty() {
        return User::find($this->userId);
    }
    public function render()
    {
        return view('livewire.edit');
    }
}

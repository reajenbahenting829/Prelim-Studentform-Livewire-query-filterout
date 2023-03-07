<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;

class Counter extends Component
{
    public $lname, $fname, $address, $email, $year = 'All', $course = 'All', $search;
    public $userId, $studentDelete;
    use WithPagination;

    protected $paginationTheme= 'bootstrap';

    public function loadStudents() {
        $query = User::orderBy('fname', 'asc')->search($this->search);

        if($this->course != 'All') {
            $query->where('course', $this->course);
        }
        if($this->year != 'All') {
            $query->where('year', $this->year);
        }

        $users = $query->paginate(5);

        return compact('users');
    }

    public function addStudent() {
        $this->validate([
            'lname'              =>      ['required', 'string', 'max:255'],
            'fname'              =>      ['required', 'string', 'max:255'],
            'address'            =>      ['required', 'string', 'max:255'],
            'email'              =>      ['required', 'email', 'string', 'max:255', 'unique:users'],
            'year'               =>      ['required', 'string', 'max:255'],
            'course'             =>      ['required', 'string', 'max:255']
        ]);

        $users = User::create([
            'lname'      =>      $this->lname,
            'fname'      =>      $this->fname,
            'address'    =>      $this->address,
            'email'      =>      $this->email,
            'year'       =>      $this->year,
            'course'     =>      $this->course
        ]);

        return redirect('/')->with('message', 'Student Added Successfully');
    }
    public function todelete($userId) {
        $this->studentDelete = $userId;
    }

    public function deleteStudent() {
        $users = User::find($this->studentDelete)->delete();

        return redirect('/')->with('deleted', 'Student deleted successfully');
    }
    public function render()
    {
        return view('livewire.counter',
         $this->loadStudents() );
    }

    }


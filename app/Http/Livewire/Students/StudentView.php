<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Livewire\Component;

class StudentView extends Component
{
  public $student;

  public function mount(Student $student)
  {
    $this->student = $student;
  }

  public function render()
  {
    return view('livewire.students.student-view');
  }
}

<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
  use WithPagination;
  public $search_term;

  public $addingItemToModel = false;
  public $deletingItemFromModel = false;

  public function render()
  {
    $students = Student::when(!empty($this->search_term), function ($q) {
      return $q->where('name', 'like', '%' . $this->search_term . '%');
    })
      ->orderByDesc('id')
      ->paginate(10);

    return view('livewire.students.students', ["students" => $students]);
  }


  public function confirmDeletingItem($id)
  {
    $this->deletingItemFromModel = $id;
  }


  public function deleteRecord(Student $student)
  {
    $student->delete();

    return redirect()->route('students.list')
      ->with('flash.banner', 'Student deleted successfully')
      ->with('flash.bannerStyle', 'success');
  }
}

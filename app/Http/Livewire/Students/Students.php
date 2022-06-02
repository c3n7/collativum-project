<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Students extends Component
{
  use WithPagination, WithFileUploads;

  public $search_term;

  public $addingItemToModel = false;
  public $deletingItemFromModel = false;

  public $name;
  public $image;
  public $brief_description;
  public $background;
  public $dob;
  public $kcpe_marks;
  public $high_school_name;
  public $ambition;
  public $siblings;
  public $language;
  public $liaison_officer;

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

  public function confirmAddingItem()
  {
    $this->addingItemToModel = true;
  }



  protected $rules = [
    "name" => 'required|string',
    'image' => 'nullable|sometimes|image|max:2048', // 2MB Max
    "brief_description" => 'nullable|string',
    "background" => 'nullable|string',
    "dob" => 'nullable|date',
    "kcpe_marks" => 'nullable|numeric|max:500',
    "high_school_name" => 'nullable|string',
    "ambition" => 'nullable|string',
    "siblings" => 'nullable|string',
    "language" => 'nullable|string',
    "liaison_officer" => 'nullable|string',
  ];

  public function saveNewRecord()
  {
    $fields = $this->validate();
    if ($this->image) {
      $filename = $this->image->store('public/photos');
      $this->image_name = substr($filename, 7);
      Student::create(
        array_merge($fields, ['image' => $this->image_name])
      );
    } else {
      Student::create($fields);
    }

    return redirect()->route('students.list')
      ->with('flash.banner', 'Student added successfully')
      ->with('flash.bannerStyle', 'success');
  }
}

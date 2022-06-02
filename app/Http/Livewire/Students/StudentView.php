<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentView extends Component
{
  use WithFileUploads;
  public $student;

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
  public $current_image;



  public function mount(Student $student)
  {
    $this->student = $student;
    $this->name = $student->name;
    $this->brief_description = $student->brief_description;
    $this->background = $student->background;
    $this->dob = $student->dob;
    $this->kcpe_marks = $student->kcpe_marks;
    $this->high_school_name = $student->high_school_name;
    $this->ambition = $student->ambition;
    $this->siblings = $student->siblings;
    $this->language = $student->language;
    $this->liaison_officer = $student->liaison_officer;

    $this->current_image = $student->image;
  }

  public function render()
  {
    return view('livewire.students.student-view');
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
    "siblings" => 'nullable|numeric',
    "language" => 'nullable|string',
    "liaison_officer" => 'nullable|string',
  ];

  public function updateRecord()
  {
    $fields = $this->validate();

    if ($this->image) {
      if ($this->student->image) {
        try {
          unlink(storage_path('app/public/' . $this->student->image));
        } catch (Exception $e) {
          Log::error("StudentView", $e->getmessage());
        }
      }
      $filename = $this->image->store('public/photos');
      $image_name = substr($filename, 7);
      $this->student->update(
        array_merge($fields, ['image' => $image_name])
      );
    } else {
      $this->student->update([
        "name" => $this->name,
        "brief_description" => $this->brief_description,
        "background" => $this->background,
        "dob" => $this->dob,
        "kcpe_marks" => $this->kcpe_marks,
        "high_school_name" => $this->high_school_name,
        "ambition" => $this->ambition,
        "siblings" => $this->siblings,
        "language" => $this->language,
        "liaison_officer" => $this->liaison_officer,
      ]);
    }

    return redirect()->route('students.view', $this->student->id)
      ->with('flash.banner', 'Student updated successfully')
      ->with('flash.bannerStyle', 'success');
  }
}

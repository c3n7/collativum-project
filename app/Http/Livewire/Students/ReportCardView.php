<?php

namespace App\Http\Livewire\Students;

use App\Models\ReportCard;
use App\Models\Student;
use App\Models\SubjectGrades;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReportCardView extends Component
{
  use WithFileUploads;
  public $student, $reportCard;


  public $addingItemToModel = false;
  public $deletingItemFromModel = false;

  public function mount(Student $student, ReportCard $reportCard)
  {
    $this->student = $student;
    $this->reportCard = $reportCard;

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
    $subject_grades = SubjectGrades::where('report_card_id', $this->reportCard->id)
      ->orderByDesc('id')
      ->paginate(10);
    return view('livewire.students.report-card-view', [
      "subject_grades" => $subject_grades
    ]);
  }
}

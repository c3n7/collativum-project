<?php

namespace App\Http\Livewire\Students;

use App\Models\ReportCard;
use App\Models\Student;
use App\Models\SubjectGrades;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReportCardView extends Component
{
  use WithFileUploads;
  public $student, $reportCard;

  public $teachers_comment;
  public $original_report_card_file;
  public $current_report_card;
  public $term;
  public $year;

  public $addingItemToModel = false;
  public $deletingItemFromModel = false;


  public function mount(Student $student, ReportCard $reportCard)
  {
    $this->student = $student;
    $this->reportCard = $reportCard;

    $this->teachers_comment = $reportCard->teachers_comment;
    $this->term = $reportCard->term;
    $this->year = $reportCard->year;

    $this->current_report_card = $reportCard->original_report_card_file;

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

  public function updateRecord()
  {
    $fields = $this->validate([
      "teachers_comment" => 'required|string',
      'original_report_card_file' => 'nullable|sometimes|file|max:2048', // 2MB Max
      "term" => 'required|numeric',
      "year" => 'required|numeric',
    ]);

    if ($this->original_report_card_file) {
      if ($this->reportCard->original_report_card_file) {
        try {
          Storage::delete('/public/' . $this->reportCard->original_report_card_file);
        } catch (Exception $e) {
          Log::error("ReportCardView", $e->getmessage());
        }
      }
      $filename = $this->original_report_card_file->store('public/documents');
      $filename = substr($filename, 7);
      $this->reportCard->update(
        array_merge($fields, ['original_report_card_file' => $filename])
      );
    } else {
      $this->reportCard->update($fields);
    }

    return redirect()->route('students.view.report-card', [
      "student" => $this->student->id,
      "reportCard" => $this->reportCard->id
    ])
      ->with('flash.banner', 'Record updated successfully')
      ->with('flash.bannerStyle', 'success');
  }



  public function confirmDeletingItem($id)
  {
    $this->deletingItemFromModel = $id;
  }


  public function deleteRecord(SubjectGrades $subjectGrades)
  {
    $subjectGrades->delete();
    return redirect()->route('students.view.report-card', [
      "student" => $this->student->id,
      "reportCard" => $this->reportCard->id
    ])
      ->with('flash.banner', 'Record deleted successfully')
      ->with('flash.bannerStyle', 'success');
  }
}

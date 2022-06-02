<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCard extends Model
{
  use HasFactory;
  protected $fillable = [
    'student_id',
    'teachers_comment',
    'original_report_card_file',
    'term',
    'year'
  ];

  public function student()
  {
    return $this->belongsTo(Student::class, "student_id");
  }

  public function subjectGrades()
  {
    return  $this->hasMany(SubjectGrades::class, "report_card_id");
  }
}

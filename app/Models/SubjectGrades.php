<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectGrades extends Model
{
  use HasFactory;

  protected $fillable = [
    'report_card_id',
    'subject_name',
    'mark',
    'grade'
  ];

  public function reportCard()
  {
    return  $this->belongsTo(ReportCard::class, "report_card_id");
  }
}

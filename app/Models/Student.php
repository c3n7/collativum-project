<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'image',
    'brief_description',
    'background',
    'dob',
    'kcpe_marks',
    'high_school_name',
    'ambition',
    'siblings',
    'language',
    'liaison_officer',
    'identifier_key',
  ];

  protected $dates = [
    'dob'
  ];


  public function reportCards()
  {
    return $this->belongsTo(ReportCard::class, "student_id");
  }
}

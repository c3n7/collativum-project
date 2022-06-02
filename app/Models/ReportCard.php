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
}

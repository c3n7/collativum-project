<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('subject_grades', function (Blueprint $table) {
      $table->id();
      $table->foreignId('report_card_id')
        ->constrained('report_cards')
        ->onUpdate('cascade')
        ->onDelete('cascade');

      $table->string('subject_name');
      $table->integer('mark');
      $table->string('grade', 10);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('subject_grades');
  }
};

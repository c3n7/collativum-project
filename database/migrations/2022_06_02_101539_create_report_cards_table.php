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
    Schema::create('report_cards', function (Blueprint $table) {
      $table->id();

      // TODO:: Side effect of this is there will be report cards left hanging
      // On delete student prevent this
      $table->foreignId('student_id')
        ->constrained('students')
        ->onUpdate('cascade')
        ->onDelete('cascade');

      $table->text('teachers_comment')->nullable();
      $table->string('original_report_card_file')->nullable();
      $table->integer('term');
      $table->integer('year');
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
    Schema::dropIfExists('report_cards');
  }
};

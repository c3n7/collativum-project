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
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->string('image')->nullable();
      $table->string('brief_description')->nullable();
      $table->text('background')->nullable();

      $table->date('dob')->nullable();
      $table->decimal('kcpe_marks')->nullable();
      $table->string('high_school_name')->nullable();
      $table->string('ambition')->nullable();
      $table->integer('siblings')->nullable();
      $table->string('language')->nullable();
      $table->string('liaison_officer')->nullable();

      $table->string('identifier_key')->nullable();
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
    Schema::dropIfExists('students');
  }
};

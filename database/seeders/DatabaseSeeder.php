<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    $role = Role::create(['name' => 'admin']);
    $permission = Permission::create(['name' => 'edit users']);
    $role->givePermissionTo($permission);


    $user = \App\Models\User::factory()->create([
      'name' => 'Admin',
      'email' => 'admin@elimishawatoto.com',
      'password' => Hash::make('sirikali')
    ]);

    $user->assignRole('admin');


    \App\Models\User::factory(50)->create();
    \App\Models\Student::factory(20)->create();
    \App\Models\ReportCard::factory(100)->create();
    \App\Models\SubjectGrades::factory(1000)->create();
  }
}

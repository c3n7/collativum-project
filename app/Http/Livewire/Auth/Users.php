<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;
use Str;

class Users extends Component
{
  use WithPagination;
  public $search_term;

  public $email, $name;


  public $addingItemToModel = false;

  protected $rules = [
    'name' => 'required|max:255',
    'email' => 'required|email|max:255|unique:users,email'
  ];

  public function render()
  {
    $users = User::when(!empty($this->search_term), function ($q) {
      return $q->where('name', 'like', '%' . $this->search_term . '%');
    })
      ->orderByDesc('id')
      ->paginate(10);
    return view(
      'livewire.auth.users',
      ["users" => $users]
    );
  }


  public function confirmAddingItem()
  {
    $this->addingItemToModel = true;
  }

  public function saveNewRecord()
  {
    $fields = $this->validate();

    $password = Str::random(8);
    $fields['password'] = Hash::make($password);
    Log::info("User Created", ["user" => $fields, "password" => $password]);

    $user = User::create(
      [
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => $fields['password'],
      ]
    );

    $this->addingItemToModel = false;
    return redirect()->route('auth.user-management')
      ->with('flash.banner', 'User added successfully')
      ->with('flash.bannerStyle', 'success');

    // Mail::to($user)->send(new UserRegistered($user, $password));
  }
}

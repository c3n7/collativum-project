<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
  use WithPagination;
  public $search_term;

  public function render()
  {
    $users = User::when(!empty($this->search_term), function ($q) {
      return $q->where('name', 'like', '%' . $this->search_term . '%');
    })
      ->paginate(10);
    return view(
      'livewire.auth.users',
      ["users" => $users]
    );
  }
}

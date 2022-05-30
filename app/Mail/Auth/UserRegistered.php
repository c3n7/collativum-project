<?php

namespace App\Mail\Auth;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * User Instance
   * @var \App\Models\User
   */
  public $user, $password;

  /**
   * Create a new message instance.
   * @param \App\Models\User
   * @param str
   * @return void
   */
  public function __construct(User $user, $password)
  {
    $this->user = $user;
    $this->password = $password;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->markdown('emails.auth.user-registered')
      ->subject('Account Created')
      ->with([
        'name' => $this->user->name,
        'email' => $this->user->email,
        'password' => $this->password
      ]);
  }
}

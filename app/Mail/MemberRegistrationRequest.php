<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Member;

class MemberRegistrationRequest extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(Member $member)
  {
    $this->member = $member;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    $mail = $this->from(['address' => \Config::get('client.email.from')])
                 ->subject('Anmeldung Mitgliedschaft')
                 ->with(['member' => $this->member])
                 ->markdown('mails.member.registration');
    return $mail;
  }
}

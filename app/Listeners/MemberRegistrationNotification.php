<?php
namespace App\Listeners;
use App\Events\MemberRegistration;
use App\Mail\MemberRegistrationRequest;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MemberRegistrationNotification
{

  /**
   * Handle the event.
   *
   * @param  MemberRegistration $event
   * @return void
   */
  public function handle(MemberRegistration $event)
  {
    $this->sendRequest($event->member);
  }

  /**
   * Send request
   * 
   * @param Member $member
   * @return void
   */

  public function sendRequest(Member $member)
  {
    Mail::to(\Config::get('client.email.recipient'))->send(new MemberRegistrationRequest($member));
  }
}

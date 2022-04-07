<?php

namespace App\Providers;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\MemberRegistration;
use App\Listeners\MemberRegistrationNotification;
use App\Listeners\SubscriberVerifyEmailNotification;
use App\Models\Page;
use App\Observers\PageObserver;
use App\Models\Article;
use App\Observers\ArticleObserver;
class EventServiceProvider extends ServiceProvider
{
  /**
   * The event listener mappings for the application.
   *
   * @var array
   */
  protected $listen = [

    Registered::class => [
      SendEmailVerificationNotification::class,
    ],

    MemberRegistration::class => [
      MemberRegistrationNotification::class,
    ],
  ];

  /**
   * Register any events for your application.
   *
   * @return void
   */
  public function boot()
  {
    parent::boot();
    Page::observe(PageObserver::class);
    Article::observe(ArticleObserver::class);
  }
}

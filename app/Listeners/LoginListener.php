<?php

namespace App\Listeners;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Client\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected Request $request

    )
    {
       
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {


      $user = $event->user;


      $user->logins()->create([
        'ip' => $this->request->ip(),
        'session_name' => session()->getid(),
        'browser' => null,
        'agent' => $this->request->userAgent(),
        'login_at' => now(),
        'login_successfully' => true,
        'location' => geoip()->getLocation($this->request->ip())->toArray()


      ]);
    }
}

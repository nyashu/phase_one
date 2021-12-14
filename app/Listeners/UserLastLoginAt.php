<?php

namespace App\Listeners;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserLastLoginAt
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
       
        $event->user->last_login_at = $event->user->current_login_at ? $event->user->current_login_at : Carbon::now();
        $event->user->current_login_at = Carbon::now();
        $event->user->save();
    }
}

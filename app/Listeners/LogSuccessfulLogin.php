<?php

namespace App\Listeners;

use App\AccessLog;

use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
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
     * Handle the event. Add log entry to access_logs table using the AccessLog model.
     *
     * @param  PodcastWasPurchased  $event
     * @return void
     */
    public function handle(Login $event)
    {

        $log = new AccessLog;
        $log->user_id = $event->user->id;
        $log->save();
    }
}
?>
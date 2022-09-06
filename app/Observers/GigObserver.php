<?php

namespace App\Observers;
use App\Notifications\GigCreated;
use App\Notifications\GigDeleted;

use App\Models\Gig;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GigObserver
{
    /**
     * Handle the Gig "created" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function created(Gig $gig)
    {
        $users = User::where('is_admin', 1)->get();
        foreach($users as $user){
            $user->notify(new GigCreated($gig));
        }
    }

    /**
     * Handle the Gig "updated" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function updated(Gig $gig)
    {
        //
    }

    /**
     * Handle the Gig "deleted" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function deleted(Gig $gig)
    {
        $users = User::where('is_admin', 1)->get();
        foreach($users as $user){
            $user->notify(new GigDeleted($gig));
        }
    }

    /**
     * Handle the Gig "restored" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function restored(Gig $gig)
    {
        //
    }

    /**
     * Handle the Gig "force deleted" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function forceDeleted(Gig $gig)
    {
        //
    }
}

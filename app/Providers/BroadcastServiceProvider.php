<?php

namespace App\Providers;

use App\Models\Users;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::channel('order.*', function ($user, $id) {
            return $user->id === Users::findOrFail($id)->id;
        });


//        Broadcast::routes();

//        require base_path('routes/channels.php');
    }
}

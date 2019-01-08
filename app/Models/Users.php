<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Notifiable;

class Users extends Model
{
    use Notifiable;
    //
    protected $table = 'users';
    protected $fillable = ['is_vip'];

    public function makeAsVip() {
        $this->update(['is_vip'=> 1]);
    }


    public static function noti() {
        $users = self::find(1);
        $users->notify(new InvoicePaid($users));
        echo '发送Notification消息成功啦';


        $user = Users::find(1);
        foreach ($user->notifications as $notification) {
            echo $notification->type;
        }
    }


}

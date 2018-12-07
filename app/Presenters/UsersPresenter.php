<?php

namespace App\Presenters;

class UsersPresenter
{
    public function judgeIfVip($gender, $name) {
        if ($gender)
            $res = 'this is vip member' . $name;
        else
            $res = 'this is normal member' . $name;

        return $res;
    }
}
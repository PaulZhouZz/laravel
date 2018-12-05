<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Users;

class UsersRepository
{
    private $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function getAgeLargeThan($votes)
    {
        return $this->users->where('votes', '>', $votes)->get();
    }
}
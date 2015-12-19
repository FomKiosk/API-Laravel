<?php

namespace App\Repositories;

use App\Models\Kiosk;

class KioskRepository
{
    public function findByUidAndSecret($uid, $secret)
    {
        return Kiosk::where('uid', $uid)
            ->where('secret', $secret)
            ->first();
    }
}
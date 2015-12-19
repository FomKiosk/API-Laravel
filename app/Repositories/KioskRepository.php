<?php

namespace App\Repositories;

use App\Models\Kiosk;

class KioskRepository
{
    /**
     * Find the kiosk by uid and secret
     *
     * @param $uid
     * @param $secret
     * @return mixed
     */
    public function findByUidAndSecret($uid, $secret)
    {
        return Kiosk::where('uid', $uid)
            ->where('secret', $secret)
            ->first();
    }
}
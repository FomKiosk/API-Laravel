<?php

namespace App\Http\Middleware;

use App\Repositories\KioskRepository;
use Closure;

class Kiosk
{
    protected $kioskRepository;

    /**
     * Kiosk constructor.
     * @param KioskRepository $kioskRepository
     */
    public function __construct(KioskRepository $kioskRepository)
    {
        $this->kioskRepository = $kioskRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $uid = $request->get('uid');
        $secret = $request->get('secret');

        $kiosk = $this->kioskRepository->findByUidAndSecret($uid, $secret);

        if($kiosk) {
            return $next($request);
        }
        
        return ['success' => false];
    }
}

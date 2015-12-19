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
        $kiosk = $this->kioskRepository->findByUid($request->get('uid'));
        $token = $request->get('token');
        $values = $request->except('token');

        $values = json_encode($values) . $kiosk->secret;

        $md5 = md5($values);

        if($md5 == $token) {
            return $next($request);
        }

        return response()->json(['success' => false]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Repositories\ParticipantRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ParticipantsController extends Controller
{
    protected $participantRepository;

    /**
     * ParticipantsController constructor.
     * @param ParticipantRepository $participantRepository
     */
    public function __construct(ParticipantRepository $participantRepository)
    {
        $this->participantRepository = $participantRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $barcode = $request->get('barcode');
        $participant = $this->participantRepository->findByBarcode($barcode);

        return response()->json($participant, 200);
    }
}

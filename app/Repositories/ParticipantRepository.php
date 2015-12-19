<?php
/**************************************
 ***  Created By:   matthieu
 ***  Date:         19/12/15 : 18:13
 **************************************/

namespace App\Repositories;


use App\Models\Participant;

class ParticipantRepository
{
    /**
     * Find a user by barcode
     *
     * @param $barcode
     * @return array
     */
    public function findByBarcode($barcode)
    {
        $participant = Participant::where('barcode', $barcode)->first();

        return [
            'id' => $participant->id,
            'name' => $participant->name,
            'image' => $participant->image,
            'crew' => $participant->crew
        ];
    }
}
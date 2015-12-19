<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\StationRepository;

class StationsController extends Controller
{
    /**
     * @var StationRepository
     */
    protected $stationRepository;

    /**
     * StationsController constructor.
     * @param StationRepository $stationRepository
     */
    public function __construct(StationRepository $stationRepository)
    {
        $this->stationRepository = $stationRepository;
    }

    /**
     * Retrieve all Stations with their products
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $stations = $this->stationRepository->getStationsWithProducts();

        return $stations;
    }
}

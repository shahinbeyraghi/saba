<?php


namespace App\Controllers\Trip;


use App\Handlers\SortTrip;

/**
 * Class TripController
 *
 * @package App\Controllers\Trip
 */
class TripController
{
    /**
     * sort trip cards as visit sort
     *
     * @return array
     */
    public function sort($request)
    {
        $list = (new SortTrip(json_decode($request->rawBody)))->sort();
        return $list;
    }
}
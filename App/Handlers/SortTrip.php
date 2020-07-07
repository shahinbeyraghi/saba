<?php


namespace App\Handlers;


class SortTrip
{
    public $list = [];
    private $firstItem;
    private $arrivals = [];
    private $departures = [];


    /**
     * SortTrip constructor.
     *
     * @param $trips
     */
    public function __construct($trips)
    {
        foreach ($trips as $item) {
            $item = (array)$item;
            $this->arrivals[$item['Arrival']] = $item;
            $this->departures[$item['Departure']] = $item;
        }
        $this->getFirstItem($trips);
    }

    /**
     * @param $trips
     */
    private function getFirstItem($trips)
    {
        foreach ($trips as $item) {
            $item = (array)$item;
            if (!($this->arrivals[$item['Departure']] ?? false)) {
                $this->firstItem = $item;
                break;
            }

        }
    }

    /**
     * sort list
     *
     * @return array
     */
    public function sort()
    {
        $counter = 0;
        foreach ($this->arrivals as $item) {
            if ($counter == 0)
                $this->list[$counter] = $this->departures[$this->firstItem['Departure']];
            else
                $this->list[$counter] = $this->departures[$this->list[$counter-1]['Arrival']];
            $counter++;
        }

        return $this->list;
    }
}
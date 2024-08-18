<?php

class Warehouse
{
    public int $id;
    public int $capacity;
    public ?int $occupancy;

    public function __construct(int $id, int $capacity, ?int $occupancy) {
        $this->id = $id;
        $this->capacity = $capacity;
        $this->occupancy = $occupancy;
    }
}
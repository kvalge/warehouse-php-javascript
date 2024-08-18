<?php

require_once 'Repository.php';

function get_warehouse_occupancy(): int|float {
    $repository = new Repository();

    $warehouse = $repository->getWarehouse();

    $wh_capacity = 0;
    if ($warehouse->occupancy != 0) {
        $wh_capacity = $warehouse->capacity / $warehouse->occupancy * 100;
    }
    return $wh_capacity;
}
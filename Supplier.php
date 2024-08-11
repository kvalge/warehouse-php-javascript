<?php

class Supplier
{
    public int $id;
    public int $contactId;

    public function __construct(int $id, int $contactId) {
        $this->id = $id;
        $this->contactId = $contactId;
    }
}
<?php

class Contact
{
    public ?int $id;
    public string $name;
    public string $contactPerson;
    public string $address;
    public string $phone;
    public string $email;

    public function __construct(?int $id, string $name, string $contactPerson, string $address, string $phone, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->contactPerson = $contactPerson;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }
}
<?php

class UserContact
{
    public ?string $id = null;
    public string $userAccountId;
    public string $firstName;
    public string $lastName;
    public ?string $email;
    public ?string $photo;

    public function __construct(?string $id,
                                string  $userAccountId,
                                string  $firstName,
                                string  $lastName,
                                ?string $email,
                                ?string $photo) {
        $this->id = $id;
        $this->userAccountId = $userAccountId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->photo = $photo;
    }

}
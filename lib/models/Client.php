<?php

class Client
{
    function __construct(
        private string $name,
        private Location $address,
        private string $email,
        private string $phone
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): Location
    {
        return $this->address;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
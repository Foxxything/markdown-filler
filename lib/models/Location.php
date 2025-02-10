<?php

class Location
{
    function __construct(
        private string $address,
        private string $postalCode,
        private string $city = "Winnipeg",
        private string $province = "Manitoba"
    ) {
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getProvince(): string
    {
        return $this->province;
    }

    public function __toString(): string
    {
        $parts = [
            $this->address,
            $this->city,
            $this->province,
            $this->postalCode,
        ];

        return implode(", ", $parts);
    }
}
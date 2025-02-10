<?php

enum Services: string
{
    case Mini = "Mini Session";
    case Standard = "Standard Session";
    case Extended = "Extended Session";

    // Method to get price for the service
    public function getPrice(): int
    {
        return match ($this) {
            self::Mini => 125,
            self::Standard => 250,
            self::Extended => 400,
        };
    }

    // Method to get description for the service
    public function getDescription(): string
    {
        return match ($this) {
            self::Mini => "30 min, 5-15 images",
            self::Standard => "60 min, 20-30 images",
            self::Extended => "90+ min, 40+ images",
        };
    }

    // Optionally, you can create a method that returns all information in one
    public function getInfo(): string
    {
        return $this->value .
            ": " .
            $this->getDescription() .
            ' - Price: $' .
            $this->getPrice();
    }
}
<?php

class Contract
{
    function __construct(
        private Client $client,
        private DateTime $date,
        private Location $location,
        private Service $service
    ) {
    }
}
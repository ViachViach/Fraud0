<?php

declare(strict_types=1);

namespace App\Dtos\Integration;

final class ItemIP
{
    private string $address;
    private string $numDays;
    private string $autonomousSystem;

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): ItemIP
    {
        $this->address = $address;
        return $this;
    }

    public function getNumDays(): string
    {
        return $this->numDays;
    }

    public function setNumDays(string $numDays): ItemIP
    {
        $this->numDays = $numDays;
        return $this;
    }

    public function getAutonomousSystem(): string
    {
        return $this->autonomousSystem;
    }

    public function setAutonomousSystem(string $autonomousSystem): ItemIP
    {
        $this->autonomousSystem = $autonomousSystem;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Dtos;

class InternalAdaptedMessage
{
    private string $key;
    private string $timestamp;
    private bool $isBot;
    private bool $isConversion;

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): InternalAdaptedMessage
    {
        $this->key = $key;
        return $this;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): InternalAdaptedMessage
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function isBot(): bool
    {
        return $this->isBot;
    }

    public function setIsBot(bool $isBot): InternalAdaptedMessage
    {
        $this->isBot = $isBot;
        return $this;
    }

    public function isConversion(): bool
    {
        return $this->isConversion;
    }

    public function setIsConversion(bool $isConversion): InternalAdaptedMessage
    {
        $this->isConversion = $isConversion;
        return $this;
    }
}

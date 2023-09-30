<?php

declare(strict_types=1);

namespace App\Dtos\Integration;

final class ItemDto
{
    private string $key;
    private string $timestamp;
    private string $ip;
    private string $url;

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): ItemDto
    {
        $this->key = $key;
        return $this;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): ItemDto
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): ItemDto
    {
        $this->ip = $ip;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): ItemDto
    {
        $this->url = $url;
        return $this;
    }
}

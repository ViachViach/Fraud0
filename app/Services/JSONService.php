<?php

declare(strict_types=1);

namespace App\Services;

use DateTimeImmutable;
use WayOfDev\Serializer\Contracts\SerializerInterface;

final class JSONService
{
    public function __construct(
        private readonly SerializerInterface $serializer
    ) {}

    public function saveJsonFromCollections(array $item): void {

        $result = $this->serializer->serialize($item);
        $date = new DateTimeImmutable();
        $fileName = env('FILE_DIR_STORAGE') . $date->getTimestamp() . '.json';
        file_put_contents($fileName, $result);
    }
}

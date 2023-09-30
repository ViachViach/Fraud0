<?php

declare(strict_types=1);

namespace App\Integration;

use App\Dtos\Integration\MessagesDto;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use WayOfDev\Serializer\Contracts\SerializerInterface;

final class Message implements MessageInterface
{
    public function __construct(
        private readonly SerializerInterface $serializer
    ) {}

    public function get(): MessagesDto {

        $path = env('MESSAGE_PATH');
        $content = file_get_contents($path);

        return  $this->serializer->unserialize(
            $content,
            MessagesDto::class,
            JsonEncoder::FORMAT,
        );
    }


}

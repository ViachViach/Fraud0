<?php

declare(strict_types=1);

namespace App\Integration;


use App\Dtos\Integration\MessagesDto;

interface MessageInterface
{
    public function get(): MessagesDto;
}

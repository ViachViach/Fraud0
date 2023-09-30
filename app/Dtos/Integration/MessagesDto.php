<?php

declare(strict_types=1);

namespace App\Dtos\Integration;

final class MessagesDto
{
    /**
     * @var ItemDto[]
    */
    private array $items;

    /**
     * @return ItemDto[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ItemDto[] $items
     */
    public function setItems(array $items): MessagesDto
    {
        $this->items = $items;
        return $this;
    }
}

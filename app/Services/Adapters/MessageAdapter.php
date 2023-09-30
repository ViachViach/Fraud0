<?php

declare(strict_types=1);

namespace App\Services\Adapters;

use App\Dtos\Integration\ItemDto;
use App\Dtos\Integration\ItemIP;
use App\Dtos\Integration\MessagesDto;
use App\Dtos\InternalAdaptedMessage;
use App\Integration\IP;
use DateTimeInterface;
use DateTimeImmutable;

final class MessageAdapter
{
    private const IS_CONVERSION_KEY_WORDS = [
        'thank-you'
    ];

    public function __construct(
        private readonly IP $ipSdk,
    ) { }

    /**
     * @return InternalAdaptedMessage[]
    */
    public function handle(MessagesDto $message): array
    {
        $result = [];

        $botIps = $this->ipSdk->get();

        foreach ($message->getItems() as $item) {
            $result[] = $this->adaptItem($item, $botIps);
        }

        return $result;
    }

    /**
     * @param ItemDto $item
     * @param ItemIP[] $botIps
     */
    private function adaptItem(ItemDto $item, array $botIps): InternalAdaptedMessage {
        $result = new InternalAdaptedMessage();

        $date = new DateTimeImmutable();
        $date->setTimestamp((int) $item->getTimestamp());

        $result
            ->setKey($item->getKey())
            ->setTimestamp($date->format(DateTimeInterface::ATOM))
            ->setIsBot($this->validateIsBot($item->getIp(), $botIps))
            ->setIsConversion($this->validateISConversation($item->getUrl()))
        ;

        return $result;
    }

    /**
     * @param ItemIP[] $botIps
     */
    private function validateIsBot(string $ip, array $botIps): bool {
        $result = array_filter($botIps, function($item) use ($ip){
            return ($item->getAddress() === $ip);
        });

        return !empty($result);
    }

    private function validateISConversation(string $url): bool {
        foreach (self::IS_CONVERSION_KEY_WORDS as $word) {
            return (bool) strpos($url, $word);
        }

        return false;
    }
}

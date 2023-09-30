<?php

declare(strict_types=1);

namespace App\Integration;

use App\Dtos\Integration\ItemIP;
use GuzzleHttp\Client;

final class IP
{
    public function __construct(
        private Client $client,
    ) {
        $this->client = new Client();
    }

    /**
     * @return ItemIP[]
    */
    public function get(): array
    {
        $result = [];
        $response = $this->client->get(env('IP_PATH'));
        $line = explode("\n", $response->getBody()->getContents());

        foreach ($line as $key => $item) {
            if ($key < 5) continue;
            $result[] = $this->buildItem($item);

        }
        return $result;
    }

    // This function require validations of each element
    private function buildItem(string $item): ItemIP {
        $values = explode(";", $item);

        $result = new ItemIP();
        $result
            ->setAddress($values[0])
            ->setNumDays($values[1])
            ->setAutonomousSystem($values[2])
        ;

        return $result;
    }
}

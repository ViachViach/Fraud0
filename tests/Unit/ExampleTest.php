<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Dtos\Integration\ItemDto;
use App\Dtos\Integration\MessagesDto;
use App\Integration\IP;
use App\Services\Adapters\MessageAdapter;
use PHPUnit\Framework\TestCase;

final class MessageAdapterTest extends TestCase
{
    private IP $ipSdk;

    protected function setUp(): void
    {
        $this->ipSdk = $this->getMockBuilder(IP::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->ipSdk->expects($this->any())
            ->method('get')
            ->willReturn([]);
    }

    public function test(): void
    {

        $service = new MessageAdapter($this->ipSdk);

        $dto = new MessagesDto();
        $item = new ItemDto();
        $item
            ->setKey("0b50c1a7-d006-4661-960c-10b88da8ee01")
            ->setTimestamp("1673889466163")
            ->setIp("103.147.42.101")
            ->setUrl("https://example.com/product/some-product")
        ;
        $dto->setItems([$item]);

        $result = $service->handle($dto);

        $this->assertEquals($result[0]->getTimestamp(), $item->getTimestamp());
        $this->assertEquals($result[0]->getKey(), $item->getKey());
        $this->assertEquals($result[0]->isConversion(), false);
        $this->assertEquals($result[0]->isConversion(), false);
    }
}

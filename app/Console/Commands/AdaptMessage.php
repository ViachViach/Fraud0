<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Integration\MessageInterface;
use App\Services\Adapters\MessageAdapter;
use App\Services\JSONService;
use Illuminate\Console\Command;

final class AdaptMessage extends Command
{

    public function __construct(
        private readonly MessageInterface $sdk,
        private readonly MessageAdapter $adapter,
        private readonly JSONService $JSONService,
    ) {
        parent::__construct();
    }

    /**
     * @var string
     */
    protected $signature = 'app:adapt-message';

    public function handle(): void
    {
        $messages = $this->sdk->get();
        $adaptedMessages = $this->adapter->handle($messages);
        $this->JSONService->saveJsonFromCollections($adaptedMessages);
    }
}

<?php

declare(strict_types=1);

namespace App\Providers;

use App\Console\Commands\AdaptMessage;
use App\Integration\Message;
use App\Services\Adapters\MessageAdapter;
use App\Services\JSONService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use WayOfDev\Serializer\Contracts\SerializerInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(MessageAdapter::class);
        $this->app->singleton(JSONService::class, function (Application $app) {
            return new JSONService(
                $app->get(SerializerInterface::class),
            );
        });

        $this->app->singleton(AdaptMessage::class, function (Application $app) {
            return new AdaptMessage(
                new Message($app->get(SerializerInterface::class)),
                $app->get(MessageAdapter::class),
                $app->get(JSONService::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}

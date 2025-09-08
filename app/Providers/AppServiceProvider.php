<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Support\Repositories\TicketRepositoryInterface;
use App\Domain\Support\Repositories\TicketStatusRepositoryInterface;
use App\Domain\Support\Repositories\UserRepositoryInterface;
use App\Infrastructure\Support\Persistence\TicketRepository;
use App\Infrastructure\Support\Persistence\TicketStatusRepository;
use App\Infrastructure\Support\Persistence\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        TicketStatusRepositoryInterface::class => TicketStatusRepository::class,
        TicketRepositoryInterface::class => TicketRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace Thantzin\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Thantzin\Modules\Contracts\RepositoryInterface;
use Thantzin\Modules\Laravel\Repository;

class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Register some binding.
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, Repository::class);
    }
}

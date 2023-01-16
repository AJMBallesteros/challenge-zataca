<?php

namespace App\Providers;

use App\src\domain\Blueflag\BlueflagRepositoryInterface;
use App\src\domain\InvoiceRepositoryInterface;
use App\src\domain\Municipality\MunicipalityRepositoryInterface;
use App\src\infrastructure\Blueflag\BlueflagRepository;
use App\src\infrastructure\InvoiceRepository;
use App\src\infrastructure\Municipality\MunicipalityRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

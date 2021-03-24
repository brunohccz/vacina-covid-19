<?php

namespace App\Providers;

use App\Vaccinate\Contracts\VaccinateValidator;
use App\Vaccinate\VaccinateValidatorComposite;
use App\Vaccinate\Validators\DoseIntervalVaccinateValidator;
use App\Vaccinate\Validators\DoseLimitVaccinateValidator;
use App\Vaccinate\Validators\DueVaccineValidator;
use App\Vaccinate\Validators\SameManufacturerVaccinateValidator;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VaccinateValidator::class, function () {
            return new VaccinateValidatorComposite([
                new DueVaccineValidator(),
                new SameManufacturerVaccinateValidator(),
                new DoseLimitVaccinateValidator(),
                new DoseIntervalVaccinateValidator()
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ResourceCollection::withoutWrapping();
    }
}

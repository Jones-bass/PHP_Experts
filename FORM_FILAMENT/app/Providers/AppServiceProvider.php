<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class AppServiceProvider extends ServiceProvider
{
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
        Placeholder::macro('required', function () {
            return $this->label(new HtmlString($this->getLabel().' <sup class="text-danger-600">*</sup>'));
        });
    }
}

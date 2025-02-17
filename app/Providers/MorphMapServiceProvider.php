<?php

namespace App\Providers;

use App\Models\Opportunity;
use App\Models\Project\Application;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class MorphMapServiceProvider extends ServiceProvider {
    /**
     * Register services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {
        Relation::morphMap([
            'opportunity' => Opportunity::class,
            'application' => Application::class,
        ]);
    }
}

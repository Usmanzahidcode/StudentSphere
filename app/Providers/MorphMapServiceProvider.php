<?php

namespace App\Providers;

use App\Models\Project\Application;
use App\Models\Project\Opportunity;
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

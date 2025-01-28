<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

// TODO: Implemetn this
class SetupApplication extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run seeders and perform other setup tasks';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $this->info('Running database seeders...');
        Artisan::call('db:seed');
        $this->info(Artisan::output());

        // Perform other setup tasks here
        $this->info('Setting up configurations...');
        // Example: Set up some default configuration
        // config(['app.custom_setting' => 'value']);

        $this->info('Setup complete.');
        return 0;
    }
}

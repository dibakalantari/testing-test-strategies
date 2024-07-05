<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB; // Add this line
abstract class TestCase extends BaseTestCase
{
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();

        $app->make(Kernel::class)->bootstrap();

        $environmentFile = env('APP_ENV_FILE', '.env');

        if (file_exists($file = $app->environmentPath() . '/' . $environmentFile)) {
            $app->loadEnvironmentFrom($environmentFile);
        }

        return $app;
    }

    // public function changeConnection($connection)
    // {
    //     DB::setDefaultConnection($connection); 


    // }

}

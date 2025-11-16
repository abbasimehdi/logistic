<?php
namespace Logistic\Modules\Domain\Driver;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DriverServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->registerRoutes();
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    /**
     * @return void
     */
    private function registerRoutes(): void
    {
        $path = __DIR__ . '/routes/api.php';

        if (file_exists($path)) {
            Route::prefix('api')
                ->group($path);
        }
    }
}

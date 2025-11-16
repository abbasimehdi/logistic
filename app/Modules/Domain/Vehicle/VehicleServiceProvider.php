<?php
namespace Logistic\Modules\Domain\Vehicle;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class VehicleServiceProvider extends ServiceProvider
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

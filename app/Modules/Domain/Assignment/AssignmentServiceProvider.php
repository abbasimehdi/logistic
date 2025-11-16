<?php
namespace Logistic\Modules\Domain\Assignment;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Logistic\Modules\Domain\Assignment\src\Models\Assignment;
use Logistic\Modules\Domain\Assignment\src\Repository\AssignmentRepository;

class AssignmentServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->registerRoutes();
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->app->bind(AssignmentRepository::class, function($app) {
            return new AssignmentRepository(new Assignment());
        });
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

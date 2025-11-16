<?php

namespace Logistic\Modules\Domain\Assignment\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Logistic\Modules\Domain\Assignment\src\Http\Requests\AssignDriverRequest;
use Logistic\Modules\Domain\Assignment\src\Resources\AssignmentResource;
use Logistic\Modules\Domain\Assignment\src\Services\AssignmentService;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class AssignmentController extends Controller
{
    /**
     * @param AssignmentService $service
     */
    public function __construct(
        protected AssignmentService $service
    )
    {
    }

    /**
     * @param AssignDriverRequest $request
     * @return JsonResponse
     */
    public function assign(AssignDriverRequest $request): JsonResponse
    {
        return ((new AssignmentResource(
            $this->service->assign($request->vehicle_id, $request->driver_id)
            ))
            ->additional(['message' => 'Vehicle created'])
            ->response()
            ->setStatusCode(SymfonyResponse::HTTP_CREATED));
    }

    /**
     * @return JsonResponse
     */
    public function vehiclesWithDriver(): JsonResponse
    {
        return response()->json(['data' => $this->service->vehiclesWithDriver()]);
    }
}

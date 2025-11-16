<?php

namespace Logistic\Modules\Domain\Driver\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Domain\Driver\src\Resources\DriverCollection;
use Illuminate\Http\JsonResponse;
use Logistic\Modules\Domain\Driver\src\Http\Requests\DriverStoreRequest;
use Logistic\Modules\Domain\Driver\src\Resources\DriverResource;
use Logistic\Modules\Domain\Driver\src\Services\DriverService;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class DriverController extends Controller
{
    public function __construct(
        protected DriverService $service
    )
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return (new DriverCollection($this->service->list()))
            ->additional(['message' => 'Vehicle created'])
            ->response()
            ->setStatusCode(SymfonyResponse::HTTP_OK);
    }

    /**
     * @param DriverStoreRequest $request
     * @return JsonResponse
     */
    public function store(DriverStoreRequest $request): JsonResponse
    {
        return ((new DriverResource(
            $this->service->create($request->validated()
            )))
            ->additional(['message' => 'Vehicle created'])
            ->response()
            ->setStatusCode(SymfonyResponse::HTTP_CREATED));
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        return ((new DriverResource(
            $this->service->show($id)
        ))
            ->additional(['message' => 'Vehicle created'])
            ->response()
            ->setStatusCode(SymfonyResponse::HTTP_CREATED));
    }
}

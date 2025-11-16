<?php

namespace Logistic\Modules\Domain\Vehicle\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Domain\Vehicle\src\Http\Requests\VehicleStoreRequest;
use Illuminate\Http\JsonResponse;
use Logistic\Modules\Domain\Vehicle\src\Resources\VehicleCollection;
use Logistic\Modules\Domain\Vehicle\src\Resources\VehicleResource;
use Logistic\Modules\Domain\Vehicle\src\Services\VehicleService;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class VehicleController extends Controller
{
    public function __construct(protected VehicleService $service)
    {
    }

    public function index()
    {
        return (new VehicleCollection($this->service->list()))
            ->additional(['message' => 'Vehicle created'])
            ->response()
            ->setStatusCode(SymfonyResponse::HTTP_OK);
    }

    public function store(VehicleStoreRequest $request)
    {
        return (new VehicleResource(
            $this->service->create($request->validated())
        ))
            ->additional(['message' => 'Vehicle created'])
            ->response()
            ->setStatusCode(SymfonyResponse::HTTP_CREATED);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        return (new VehicleResource(
            $this->service->show($id)
        ))
            ->additional(['message' => 'Vehicle created'])
            ->response()
            ->setStatusCode(SymfonyResponse::HTTP_OK);
    }
}


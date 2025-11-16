<?php

namespace App\Modules\Domain\Vehicle\src\Http\Schemas;

/**
 * @OA\Schema(
 *     schema="Vehicle",
 *     type="object",
 *     title="Vehicle",
 *     description="Vehicle model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="brand", type="string", example="Toyota"),
 *     @OA\Property(property="model", type="string", example="Hilux"),
 *     @OA\Property(property="year", type="integer", example=2023),
 *     @OA\Property(property="driver_id", type="integer", example=1),
 *     @OA\Property(property="driver", ref="#/components/schemas/Driver"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T12:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T12:00:00.000000Z")
 * )
 */

/**
 * @OA\Schema(
 *     schema="Driver",
 *     type="object",
 *     title="Driver",
 *     description="Driver model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="license_number", type="string", example="DRV001"),
 *     @OA\Property(property="email", type="string", example="john@example.com"),
 *     @OA\Property(property="phone", type="string", example="+1234567890"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

/**
 * @OA\Schema(
 *     schema="VehicleStoreRequest",
 *     type="object",
 *     title="Vehicle Store Request",
 *     required={"brand", "model", "year"},
 *     @OA\Property(property="brand", type="string", example="Toyota", maxLength=255),
 *     @OA\Property(property="model", type="string", example="Hilux", maxLength=255),
 *     @OA\Property(property="year", type="integer", example=2023, minimum=1900, maximum=2030),
 *     @OA\Property(property="driver_id", type="integer", example=1, nullable=true)
 * )
 */

/**
 * @OA\Schema(
 *     schema="PaginationMeta",
 *     type="object",
 *     title="Pagination Meta",
 *     @OA\Property(property="current_page", type="integer", example=1),
 *     @OA\Property(property="from", type="integer", example=1),
 *     @OA\Property(property="last_page", type="integer", example=5),
 *     @OA\Property(property="links", type="array",
 *         @OA\Items(
 *             @OA\Property(property="url", type="string", example="http://localhost:8000/api/vehicles?page=2"),
 *             @OA\Property(property="label", type="string", example="Next"),
 *             @OA\Property(property="active", type="boolean", example=true)
 *         )
 *     ),
 *     @OA\Property(property="path", type="string", example="http://localhost:8000/api/vehicles"),
 *     @OA\Property(property="per_page", type="integer", example=15),
 *     @OA\Property(property="to", type="integer", example=15),
 *     @OA\Property(property="total", type="integer", example=75)
 * )
 */

/**
 * @OA\Schema(
 *     schema="Error",
 *     type="object",
 *     title="Error",
 *     @OA\Property(property="message", type="string", example="Error message"),
 *     @OA\Property(property="errors", type="object", example={"field": ["Error message"]})
 * )
 */

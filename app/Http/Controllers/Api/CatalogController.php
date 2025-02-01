<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Services\CatalogService;
use Illuminate\Http\Request;

 /**
 * @OA\Get(
 *     path="/api/catalogs",
 *     summary="Retrieve all catalogs",
 *     tags={"Catalogs"},
 *     @OA\Response(
 *         response=200,
 *         description="List of all catalogs"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */
class CatalogController extends Controller
{
    protected $catalogService;

    public function __construct(CatalogService $catalogService)
    {
        $this->catalogService = $catalogService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function catalogs()
    {
        $catalogs = $this->catalogService->catalogs();
        return CatalogResource::collection($catalogs);
    }
}

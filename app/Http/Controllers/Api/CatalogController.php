<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SubCategoryResource;
use App\Services\CatalogService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    protected $catalogService;

    public function __construct(CatalogService $catalogService)
    {
        $this->catalogService = $catalogService;
    }

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
    public function catalogs()
    {
        $catalogs = $this->catalogService->catalogs();
        return CatalogResource::collection($catalogs);
    }

    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Retrieve all categories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="List of all categories"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function categories()
    {
        $categories = $this->catalogService->categories();
        return CategoryResource::collection($categories);
    }

    /**
     * @OA\Get(
     *     path="/api/sub-categories",
     *     summary="Retrieve all sub-categories",
     *     tags={"Sub-Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="List of all sub-categories"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function subCategories()
    {
        $subCategories = $this->catalogService->subCategories();
        return SubCategoryResource::collection($subCategories);
    }

    /**
     * @OA\Get(
     *     path="/api/top-products",
     *     summary="Retrieve top products",
     *     tags={"Products"},
     *     @OA\Response(
     *         response=200,
     *         description="List of all top products"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function products()
    {
        $products = $this->catalogService->products();
        return ProductResource::collection($products);
    }
}

<?php

namespace App\Services;

use App\Repositories\CatalogRepository;

class CatalogService
{
    protected $catalogRepository;


    public function __construct(CatalogRepository $catalogRepository)
    {
        $this->catalogRepository = $catalogRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function catalogs()
    {
        return $this->catalogRepository->catalogs();
    }

    public function categories()
    {
        return $this->catalogRepository->categories();
    }

    public function subCategories()
    {
        return $this->catalogRepository->subCategories();
    }
}

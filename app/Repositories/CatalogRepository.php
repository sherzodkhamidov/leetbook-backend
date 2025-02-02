<?php

namespace App\Repositories;

use App\Models\Catalog;
use App\Models\Category;
use App\Models\SubCategory;

class CatalogRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function catalogs()
    {
        return Catalog::get();
    }
    public function categories()
    {
        return Category::get();
    }
    public function subCategories()
    {
        return SubCategory::get();
    }
}

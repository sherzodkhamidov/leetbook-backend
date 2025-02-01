<?php

namespace App\Repositories;

use App\Models\Catalog;
use App\Models\Category;

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
}

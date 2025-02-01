<?php

namespace App\Repositories;

use App\Models\Catalog;

class CatalogRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function catalogs()
    {
        return Catalog::get();
    }
}

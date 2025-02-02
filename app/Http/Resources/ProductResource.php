<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sub_category_id' => $this->sub_category_id,
            // 'sub_category_name' => $this->subCategory->name_en,
            'name_en' => $this->name_en,
            'name_uz' => $this->name_uz,
            'name_ru' => $this->name_ru,
            'description_en' => $this->description_en,
            'description_uz' => $this->description_uz,
            'description_ru' => $this->description_ru,
            'is_top' => $this->is_top,
            'icon' => $this->icon ? url(Storage::url($this->icon)) : null,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SubCategoryResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name_en,
            'name_en' => $this->name_en,
            'name_uz' => $this->name_uz,
            'name_ru' => $this->name_ru,
            'icon' => $this->icon ? url(Storage::url($this->icon)) : null,
        ];
    }
}

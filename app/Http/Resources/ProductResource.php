<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    // ProductResource.php

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'price' => $this->getPrice(),
            'image' => $this->getImage(),
            'category' => $this->getCategory() ? $this->getCategory()->getName() : null,
            'species' => $this->getSpecies() ? $this->getSpecies()->getName() : null,
            'link' => url(route('api.product.show', ['id' => $this->getId()], false)),

        ];
    }
}

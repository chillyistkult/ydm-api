<?php
namespace App\Api\V1\Transformers;

use App\Models\CommonProductGroup as ProductGroup;
use League\Fractal\TransformerAbstract;

class ProductGroupTransformer extends TransformerAbstract
{
    public function transform(ProductGroup $productGroup)
    {
        return [
            'id' => (int) $productGroup->productGroupID,
            'description' => $productGroup->description
        ];
    }
}
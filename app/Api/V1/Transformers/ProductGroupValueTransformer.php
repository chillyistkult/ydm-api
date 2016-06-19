<?php
namespace App\Api\V1\Transformers;

use App\Models\CommonProductGroupValue as ProductGroupValue;
use League\Fractal\TransformerAbstract;

class ProductGroupValueTransformer extends TransformerAbstract
{
    public function transform(ProductGroupValue $productGroupValue)
    {
        return [
            'id' => (int) $productGroupValue->productGroupID,
            'name' => $productGroupValue->productGroup->description
        ];
    }
}
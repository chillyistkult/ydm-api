<?php
namespace App\Api\V1\Transformers;

use App\Models\CommonProductLineGroup as ProductLineGroup;
use League\Fractal\TransformerAbstract;

class ProductLineGroupTransformer extends TransformerAbstract
{
    public function transform(ProductLineGroup $productLineGroup)
    {
        return [
            'id' => (int) $productLineGroup->productLineGroupID,
        ];
    }
}
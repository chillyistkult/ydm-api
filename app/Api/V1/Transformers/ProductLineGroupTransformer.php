<?php
namespace App\Api\V1\Transformers;

use App\Models\CommonProductLineGroup as ProductLineGroup;
use League\Fractal\TransformerAbstract;

class ProductLineGroupTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'productLineGroup', 'productGroups'
    ];

    public function transform(ProductLineGroup $productLineGroup)
    {
        return [
            'id' => (int) $productLineGroup->productLineGroupID,
            'description' => $productLineGroup->translation->en->first()->word,
        ];
    }

    public function includeProductLineGroup(ProductLineGroup $productLineGroup)
    {
        $productLineGroup = $productLineGroup->productLineGroup;
        if ($productLineGroup) {
            return $this->item($productLineGroup, new ProductLineGroupTransformer(), null);
        }
    }

    public function includeProductGroups(ProductLineGroup $productLineGroup)
    {
        $productGroups = $productLineGroup->productGroups;
        if (!$productGroups->isEmpty()) {
            return $this->collection($productGroups, new ProductGroupValueTransformer(), null);
        }
    }
}
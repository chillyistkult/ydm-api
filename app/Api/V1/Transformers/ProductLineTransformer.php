<?php
namespace App\Api\V1\Transformers;

use App\Models\CommonProductLine as ProductLine;
use League\Fractal\TransformerAbstract;

class ProductLineTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'productLineGroup', //'productGroups'
    ];

    public function transform(ProductLine $productLine)
    {
        return [
            'id' 	        => (int) $productLine->productLineID,
            'name'          => $productLine->shortName,
            'description'   => $productLine->translation->en->first()->word,
            'sequenze'	    => (int) $productLine->displaySequence,
        ];
    }

    public function includeProductLineGroup(ProductLine $productLine)
    {
        $productLineGroup = $productLine->productLineGroup;
        if ($productLineGroup) {
            return $this->item($productLineGroup, new ProductLineGroupTransformer(), null);
        }
    }

    public function includeProductGroups(ProductLine $productLine)
    {
        $productGroups = $productLine->productGroups;
        if (!$productGroups->isEmpty()) {
            return $this->collection($productGroups, new ProductGroupValueTransformer(), null);
        }
    }
}
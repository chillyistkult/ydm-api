<?php
namespace App\Api\V1\Transformers;

use App\Models\CommonProductFamily as ProductFamily;
use League\Fractal\TransformerAbstract;

class ProductFamilyTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        //'productGroups'
    ];

    public function transform(ProductFamily $productFamily)
    {
        return [
            'id' 	        => (int) $productFamily->productFamilyID,
            'name'          => $productFamily->shortName,
            'description'   => $productFamily->translation->description,
            'sequenze'	    => (int) $productFamily->displaySequence
        ];
    }

    public function includeProductGroups(ProductFamily $productFamily)
    {
        $productGroups = $productFamily->productGroups;
        if (!$productGroups->isEmpty()) {
            return $this->collection($productGroups, new ProductGroupValueTransformer(), null);
        }
    }
}
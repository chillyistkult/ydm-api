<?php
namespace App\Api\V1\Transformers;

use App\Models\CommonProductLine as Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'productLineGroup'
    ];

    public function transform(Product $product)
    {
        return [
            'id' 	        => (int) $product->productLineID,
            'name'          => $product->shortName,
            'description'   => $product->translation->description,
            'sequenze'	    => (int) $product->displaySequence

        ];
    }

    public function includeProductLineGroup(Product $product)
    {
        $productLineGroup = $product->productLineGroup;
        if ($productLineGroup) {
            return $this->item($productLineGroup, new ProductLineGroupTransformer(), null);
        }
    }
}
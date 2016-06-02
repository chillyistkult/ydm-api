<?php
namespace App\Api\V1\Transformers;

use App\Models\CommonProductFamily as Technology;
use League\Fractal\TransformerAbstract;

class TechnologyTransformer extends TransformerAbstract
{
    public function transform(Technology $technology)
    {
        return [

            'id' 	        => (int) $technology->productFamilyID,
            'name'          => $technology->shortName,
            'description'   => $technology->translation->description,
            'sequenze'	    => (int) $technology->displaySequence
        ];
    }
}
<?php
namespace App\Api\V1\Transformers;

use App\Models\FilterFilterType as FilterType;
use League\Fractal\TransformerAbstract;

class FilterTypeTransformer extends TransformerAbstract
{
    
    public function transform(FilterType $filterType)
    {
        return [
            'id' => (int) $filterType->filterTypeID,
            'name' => $filterType->shortName
        ];
    }
    
}
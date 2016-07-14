<?php
namespace App\Api\V1\Transformers;

use App\Models\FilterFilterGroup as FilterGroup;
use League\Fractal\TransformerAbstract;

class FilterGroupTransformer extends TransformerAbstract
{
    
    public function transform(FilterGroup $filterGroup)
    {
        return [
            'id' => (int) $filterGroup->filterGroupID,
            'name' => $filterGroup->shortName
        ];
    }
    
}
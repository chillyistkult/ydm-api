<?php
namespace App\Api\V1\Transformers;

use App\Models\FilterPropertyGroupFilter as FilterPropertyGroupFilter;
use League\Fractal\TransformerAbstract;

class FilterPropertyGroupFilterTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'propertyGroup'
    ];
    
    public function transform(FilterPropertyGroupFilter $filterPropertyGroupFilter)
    {
        return [
            'name' => $filterPropertyGroupFilter->description
        ];
    }

    public function includePropertyGroup(FilterPropertyGroupFilter $filterPropertyGroupFilter)
    {
        $filterPropertyGroup = $filterPropertyGroupFilter->propertyGroup;
        if ($filterPropertyGroup) {
            return $this->item($filterPropertyGroup, new FilterPropertyGroupTransformer(), null);
        }
    }
    
}
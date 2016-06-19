<?php
namespace App\Api\V1\Transformers;

use App\Models\FilterPropertyGroup as FilterPropertyGroup;
use League\Fractal\TransformerAbstract;

class FilterPropertyGroupTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'properties'
    ];
    
    public function transform(FilterPropertyGroup $filterPropertyGroup)
    {
        return [
            'id' => (int) $filterPropertyGroup->propertyGroupID,
            'name' => $filterPropertyGroup->shortName
        ];
    }

    public function includeProperties(FilterPropertyGroup $filterPropertyGroup)
    {
        $filterProperties = $filterPropertyGroup->properties;
        if (!$filterProperties->isEmpty()) {
            return $this->collection($filterProperties, new FilterPropertyTransformer());
        }
    }
    
}
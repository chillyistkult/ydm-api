<?php
namespace App\Api\V1\Transformers;

use App\Models\FilterFilter as Filter;
use League\Fractal\TransformerAbstract;

class FilterTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'group', 'type', 'productGroup','propertyGroupFilter'
    ];
    
    public function transform(Filter $filter)
    {
        return [
            'id' => (int) $filter->filterID,
            'name' => $filter->translation->en->first()->word,
            'shortName' => $filter->shortName,
            'sequence' => (int) $filter->filterDisplaySequence,
            'spaceLeft' => (int) $filter->filterSpaceLeftInPixel,
            'spaceRight' => (int) $filter->filterSpaceRightInPixel
        ];
    }

    public function includeGroup(Filter $filter)
    {
        $filterGroup = $filter->group;
        if ($filterGroup) {
            return $this->item($filterGroup, new FilterGroupTransformer(), null);
        }
    }

    public function includeType(Filter $filter)
    {
        $filterType = $filter->type;
        if ($filterType) {
            return $this->item($filterType, new FilterTypeTransformer(), null);
        }
    }

    public function includeProductGroup(Filter $filter)
    {
        $productGroup = $filter->productGroup;
        if ($productGroup) {
            return $this->item($productGroup, new ProductGroupTransformer(), null);
        }
    }

    public function includePropertyGroupFilter(Filter $filter)
    {
        $filterPropertyGroupFilter = $filter->propertyGroupFilter;
        if ($filterPropertyGroupFilter) {
            return $this->item($filterPropertyGroupFilter, new FilterPropertyGroupFilterTransformer(), null);
        }
    }
    
}
<?php
namespace App\Api\V1\Transformers;

use App\Models\FilterProperty as FilterProperty;
use League\Fractal\TransformerAbstract;

class FilterPropertyTransformer extends TransformerAbstract
{
    
    public function transform(FilterProperty $filterProperty)
    {
        return [
            'id' => (int) $filterProperty->propertyID,
            'name' => $filterProperty->translation->en->first()->word,
            'sequence' => (int) $filterProperty->displaySequence,
            'minTemp' => $filterProperty->minTemperatureInCelsius,
            'maxTemp' => $filterProperty->maxTemperatureInCelsius,
            'maxPressure' => $filterProperty->maxPressureInBarAbsolute
        ];
    }
    
}
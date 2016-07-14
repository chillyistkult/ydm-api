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
            'minTemp' => $filterProperty->minTemperatureInCelsius,
            'maxTemp' => $filterProperty->maxTemperatureInCelsius,
            'minPressure' => $filterProperty->minPressureInBarAbsolute,
            'maxPressure' => $filterProperty->maxPressureInBarAbsolute
        ];
    }
    
}
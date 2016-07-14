<?php
namespace App\Api\V1\Transformers;

use App\Models\CharacteristicModel as Model;
use League\Fractal\TransformerAbstract;

class ModelTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'dependencies'
    ];
    
    public function transform(Model $model)
    {
        return [
            'id' => (int) $model->characteristicModelID,
            'code' => $model->code,
            'name' => $model->description,
            //'information' => $model->translation->en->first()->word,
        ];
    }

    public function includeDependencies(Model $model)
    {
        $dependencies = $model->dependencies;
        if (!$dependencies->isEmpty()) {
            return $this->collection($dependencies, new ModelDependencyTransformer(), null);
        }
    }
}
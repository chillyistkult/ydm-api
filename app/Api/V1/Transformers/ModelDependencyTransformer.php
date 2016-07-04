<?php
namespace App\Api\V1\Transformers;

use App\Models\CharacteristicModelDependency as ModelDependency;
use League\Fractal\TransformerAbstract;

class ModelDependencyTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'model'
    ];

    public function transform(ModelDependency $modelDependency)
    {
        return [
            //'baseId' => (int) $modelDependency->baseCharacteristicModelID,
        ];
    }

    public function includeModel(ModelDependency $modelDependency)
    {
        $model = $modelDependency->model;
        if ($model) {
            return $this->item($model, new ModelTransformer());
        }
    }
    
}
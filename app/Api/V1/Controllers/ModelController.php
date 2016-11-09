<?php
namespace App\Api\V1\Controllers;

use App\Models\CharacteristicModel as Model;
use App\Models\FilterCharacteristicModelProperty as PropertyModel;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Api\V1\Transformers\ModelTransformer;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class ModelController extends BaseController
{
    /**
     * Show all product groups and corresponding products
     *
     * Get a JSON representation of all the products
     *
     * @Get('/')
     */
    public function index(Request $request)
    {
        return $this->collection(Model::doesntHave('bases')->get(), new ModelTransformer());

    }

    public function getByFilterAndProperty(Request $request)
    {
        $propertyId = $request->route('pId');
        $filterId = $request->route('fId');

        return $this->collection(Model::doesntHave('bases')->whereHas('properties', function ($query) use ($propertyId) {
            $query->where('Filter_CharacteristicModelProperties.propertyID', '=', $propertyId);
        })->get(), new ModelTransformer());

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $modelId = $request->route('id');
        return $this->item(Model::where('characteristicModelID', '=', $modelId)->firstOrFail(), new ModelTransformer());
    }

    /**
     * Update the model in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $pId
     * @param  int $mId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pId, $mId)
    {

        DB::beginTransaction(); //Start transaction!

        try {
            $input = $request->json()->all();

            if ($input['isIncluded']) {
                $propertyModel = new PropertyModel;
                $propertyModel->characteristicModelID = $mId;
                $propertyModel->propertyID = $pId;
                $propertyModel->push();
            } else {
                $propertyModel = PropertyModel::where('propertyID', '=', $pId)->where('characteristicModelID', '=', $mId)->delete();
            }

            DB::commit();
            return $propertyModel;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
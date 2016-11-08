<?php
namespace App\Api\V1\Controllers;

use App\Models\CommonTranslateWord;
use App\Models\CommonTranslateWordId;
use App\Models\FilterFilter as Filter;
use App\Models\FilterProperty as FilterProperty;
use App\Models\FilterPropertyGroup as PropertyGroup;
use App\Models\FilterPropertyGroupFilter as PropertyGroupFilter;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Api\V1\Requests\FilterPropertyRequest;
use App\Api\V1\Transformers\FilterPropertyTransformer;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class FilterPropertyController extends BaseController
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
        return $this->collection(FilterProperty::orderBy('displaySequence')->get(), new FilterPropertyTransformer());

    }

    /**
     * Store a new Product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterPropertyRequest $request, $id)
    {
        DB::beginTransaction(); //Start transaction!

        try {
            $input = $request->json()->all();
            $filter = Filter::where('filterID', '=', $id)->firstOrFail();
            $propertyGroupFilter = PropertyGroupFilter::where('filterID', '=', $filter->filterID)->firstOrFail();
            $propertyGroup = PropertyGroup::where('propertyGroupID', '=', $propertyGroupFilter->propertyGroupID)->firstOrFail();
            $filterProperties = FilterProperty::where('propertyGroupID', '=', $propertyGroup->propertyGroupID)->get();
            $filterProperty = new FilterProperty;

            $rTranslation = new CommonTranslateWordId;
            $rTranslation->description = $input['name'];
            $rTranslation->save();

            //Create new translation
            $translation = new CommonTranslateWord;
            $translation->langID = 1;
            $translation->word = $input['name'];
            $translation->translation()->associate($rTranslation);
            $translation->save();


            //Associate translation
            $filterProperty->translation()->associate($rTranslation);

            //Associate property group
            $filterProperty->propertyGroup()->associate($propertyGroup);

            //Update meta informations
            $filterProperty->shortName = $input['name'];
            $filterProperty->minTemperatureInCelsius = $input['minTemp'];
            $filterProperty->maxTemperatureInCelsius = $input['maxTemp'];
            $filterProperty->maxPressureInBarAbsolute = $input['maxPressure'];

            $filterProperty->displaySequence = $filterProperties->sortByDesc('displaySequence')->first()->displaySequence + 1;

            if ($filterProperty->save()) {
                DB::commit();
                return $this->item($filterProperty, new FilterPropertyTransformer());
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $filterPropertyId = $request->route('id');
        return $this->item(FilterProperty::findOrFail($filterPropertyId), new FilterPropertyTransformer());
    }

    /**
     * Update the product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilterPropertyRequest $request, $id)
    {

        DB::beginTransaction(); //Start transaction!

        try{
            $input = $request->json()->all();

            //Search filter with given ID and include translation relation
            $filterProperty = FilterProperty::with('translation.en')->findOrFail($id);

            //Update translation
            $filterProperty->translation->en->first()->word = $input['name'];

            //Update meta informations
            $filterProperty->minTemperatureInCelsius = $input['minTemp'];
            $filterProperty->maxTemperatureInCelsius = $input['maxTemp'];
            $filterProperty->maxPressureInBarAbsolute = $input['maxPressure'];

            //Save filter and relations
            $filterProperty->push();
            DB::commit();
            return $this->item($filterProperty, new FilterPropertyTransformer());
        }
        catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return FilterProperty::destroy($id);
    }
}
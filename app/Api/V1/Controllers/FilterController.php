<?php
namespace App\Api\V1\Controllers;

use App\Models\CommonTranslateWord;
use App\Models\CommonTranslateWordId;
use App\Models\FilterFilter as Filter;
use App\Models\FilterFilterGroup as FilterGroup;
use App\Models\FilterFilterType as FilterType;
use App\Models\CommonProductGroup as ProductGroup;
use App\Models\CommonProductLine as ProductLine;
use App\Http\Requests;
use Dingo\Api\Dispatcher;
use DB;
use Illuminate\Http\Request;
use App\Api\V1\Requests\FilterRequest;
use App\Api\V1\Transformers\FilterTransformer;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class FilterController extends BaseController
{

    public function __construct(Dispatcher $dispatcher)
    {
        parent::__construct($dispatcher);
    }

    /**
     * Show all product groups and corresponding products
     *
     * Get a JSON representation of all the products
     *
     * @Get('/')
     */
    public function index(Request $request)
    {
        $productGroupId = $request->route('pgId');
        $productFamilyId = $request->route('pfId');

        // What I do here is complete garbage, please ignore this piece of code...
        if ($productGroupId && $productFamilyId) {
            $productGroupId = ProductLine::where('productLineID', $productGroupId)->value('productLineGroupID');
            return $this->collection(Filter::join('Common_ProductGroupValue', function ($q) use ($productGroupId, $productFamilyId) {
                $q->on('Filter_Filter.productGroupID', '=', 'Common_ProductGroupValue.productGroupID');
                $q->where('Common_ProductGroupValue.productFamilyID', '=', $productFamilyId);
                $q->whereIn('Common_ProductGroupValue.productLineGroupID', [$productGroupId, null]);
                $q->whereIn('Common_ProductGroupValue.productLineID', [$productGroupId, null]);
            })
                ->where('resultDisplaySequence', '!=', -1)
                ->orderBy('filterDisplaySequence')
                ->get(), new FilterTransformer());
        } else {
            return $this->collection(Filter::where('resultDisplaySequence', '!=', -1)->orderBy('filterDisplaySequence')->get(), new FilterTransformer());
        }

    }

    /**
     * Store a new Product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterRequest $request)
    {

        DB::beginTransaction(); //Start transaction!

        try {
            $input = $request->json()->all();
            $filters = Filter::where('productGroupID', '=', $input['productGroup']['id'])->where('resultDisplaySequence', '!=', -1)->get();
            $filter = new Filter;

            $rTranslation = new CommonTranslateWordId;
            $rTranslation->description = $input['name'];
            $rTranslation->save();

            //Create new translation
            $translation = new CommonTranslateWord;
            $translation->langID = 1;
            $translation->word = $input['name'];
            $translation->translation()->associate($rTranslation);
            $translation->save();


            //Search filter group and type with given ID
            $group = FilterGroup::findOrFail($input['group']['id']);
            $type = FilterType::findOrFail($input['type']['id']);
            $productGroup = ProductGroup::findOrFail($input['productGroup']['id']);

            //Update relations
            $filter->group()->associate($group);
            $filter->type()->associate($type);
            $filter->productGroup()->associate($productGroup);
            $filter->translation()->associate($rTranslation);

            $filter->filterDisplaySequence = $filters->sortByDesc('filterDisplaySequence')->first()->filterDisplaySequence + 1;
            $filter->resultDisplaySequence = $filters->sortByDesc('resultDisplaySequence')->first()->resultDisplaySequence + 1;
            $filter->shortName = $input['shortName'];

            if ($filter->save()) {
                DB::commit();
                return $this->item($filter, new FilterTransformer());
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
        $filterId = $request->route('id');
        return $this->item(Filter::where('filterID', '=', $filterId)->firstOrFail(), new FilterTransformer());
    }

    /**
     * Update the filter in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilterRequest $request, $id)
    {

        DB::beginTransaction(); //Start transaction!

        try {
            $input = $request->json()->all();

            //Search filter with given ID and include translation relation
            $filter = Filter::with('translation.en')->findOrFail($id);

            //Search filter group and type with given ID
            $group = FilterGroup::findOrFail($input['group']['id']);
            $type = FilterType::findOrFail($input['type']['id']);
            $productGroup = ProductGroup::findOrFail($input['productGroup']['id']);

            //Update translation
            $filter->translation->en->first()->word = $input['name'];
            $filter->shortName = $input['shortName'];
            $filter->filterDisplaySequence = $input['sequence'];

            //Update relations
            $filter->group()->associate($group);
            $filter->type()->associate($type);
            $filter->productGroup()->associate($productGroup);

            //Save filter and relations
            if ($filter->push()) {
                DB::commit();
                return $this->item($filter, new FilterTransformer());
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Update the filter in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        try {
            $input = $request->json()->all();
            $response = array();

            foreach ($input as $item) {
                if (isset($item['id'])) {
                    $response[] = $this->dispatcher->json($item)->put('filters/' . $item['id']);
                }
            }
            return $this->collection(collect($response), new FilterTransformer());
        } catch (\Exception $e) {
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
        DB::beginTransaction(); //Start transaction!

        try {
            $filter = Filter::findOrFail($id);
            if ($filter->delete()) {
                DB::commit();
                return $this->item($filter, new FilterTransformer());
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
<?php
namespace App\Api\V1\Controllers;

use App\Models\FilterFilter as Filter;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\V1\Requests\FilterRequest;
use App\Api\V1\Transformers\FilterTransformer;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class FilterController extends BaseController
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
        return $this->collection(Filter::where('resultDisplaySequence', '!=', -1)->orderBy('resultDisplaySequence')->get(), new FilterTransformer());

    }

    public function getByTechnologyAndProduct(Request $request)
    {
        $productGroupId = $request->route('pgId');
        $productFamilyId = $request->route('pfId');


        return $this->collection(Filter::join('Common_ProductGroupValue', function ($q) use ($productGroupId, $productFamilyId) {
            $q->on('Filter_Filter.productGroupID', '=', 'Common_ProductGroupValue.productGroupID');
            $q->where('Common_ProductGroupValue.productFamilyID', '=', $productFamilyId);
            $q->whereIn('Common_ProductGroupValue.productLineGroupID', [$productGroupId, null]);
            $q->whereIn('Common_ProductGroupValue.productLineID', [$productGroupId, null]);
        })
            ->where('resultDisplaySequence', '!=', -1)
            ->orderBy('resultDisplaySequence')
            ->get(), new FilterTransformer());
    }

    /**
     * Store a new Product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterRequest $request)
    {
        return Filter::create($request);
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
     * Update the product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilterRequest $request, $id)
    {
        $Product = Filter::findOrFail($id);
        $Product->update($request);
        return $Product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Filter::destroy($id);
    }
}
<?php
namespace App\Api\V1\Controllers;

use App\Models\FilterFilterType as FilterType;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\V1\Requests\FilterTypeRequest;
use App\Api\V1\Transformers\FilterTypeTransformer;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class FilterTypeController extends BaseController
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
        return $this->collection(FilterType::get(), new FilterTypeTransformer());

    }

    /**
     * Store a new Product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterTypeRequest $request)
    {
        return FilterType::create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $filterTypeId = $request->route('id');
        return $this->item(FilterType::where('filterTypeID', '=', $filterTypeId)->firstOrFail(), new FilterTypeTransformer());
    }

    /**
     * Update the product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilterTypeRequest $request, $id)
    {
        $filterType = FilterType::findOrFail($id);
        $filterType->update($request);
        return $filterType;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return FilterType::destroy($id);
    }
}
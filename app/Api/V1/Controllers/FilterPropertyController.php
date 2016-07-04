<?php
namespace App\Api\V1\Controllers;

use App\Models\FilterProperty as FilterProperty;
use App\Http\Requests;
use Illuminate\Http\Request;
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
        return $this->collection(FilterProperty::orderBy('resultDisplaySequence')->get(), new FilterPropertyTransformer());

    }

    /**
     * Store a new Product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterPropertyRequest $request)
    {
        return FilterProperty::create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $filterPropertyId = $request->route('id');
        return $this->item(FilterProperty::where('propertyID', '=', $filterPropertyId)->firstOrFail(), new FilterPropertyTransformer());
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
        $FilterProperty = FilterProperty::findOrFail($id);
        $FilterProperty->update($request);
        return $FilterProperty;
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
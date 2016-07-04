<?php
namespace App\Api\V1\Controllers;

use App\Models\FilterFilterGroup as FilterGroup;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\V1\Requests\FilterGroupRequest;
use App\Api\V1\Transformers\FilterGroupTransformer;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class FilterGroupController extends BaseController
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
        return $this->collection(FilterGroup::get(), new FilterGroupTransformer());

    }

    /**
     * Store a new Product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterGroupRequest $request)
    {
        return FilterGroup::create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $filterGroupId = $request->route('id');
        return $this->item(FilterGroup::where('filterGroupID', '=', $filterGroupId)->firstOrFail(), new FilterGroupTransformer());
    }

    /**
     * Update the product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilterGroupRequest $request, $id)
    {
        $filterGroup = FilterGroup::findOrFail($id);
        $filterGroup->update($request);
        return $filterGroup;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return FilterGroup::destroy($id);
    }
}
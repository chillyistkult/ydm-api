<?php
namespace App\Api\V1\Controllers;

use App\Models\CommonProductLine as ProductLine;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\V1\Requests\ProductLineRequest;
use App\Api\V1\Transformers\ProductLineTransformer;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class ProductLineController extends BaseController
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
        $productFamilyId = $request->route('id');
        return $this->collection(ProductLine::where('productFamilyID', '=', $productFamilyId)->where('displaySequence', '!=', -1)->orderBy('displaySequence')->get(), new ProductLineTransformer());
    }

    /**
     * Store a new Product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        return ProductLine::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $productLineId = $request->route('plId');
        return $this->item(ProductLine::findOrFail($productLineId), new ProductLineTransformer());
    }

    /**
     * Update the product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductLineRequest $request, $id)
    {
        $Product = ProductLineRequest::findOrFail($id);
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
        return ProductLine::destroy($id);
    }
}
<?php
namespace App\Api\V1\Controllers;

use App\Models\CommonProductLine as ProductLine;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\V1\Requests\ProductRequest;
use App\Api\V1\Transformers\ProductTransformer;

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
    public function index($id)
    {
        return ProductLine::where('productFamilyID', '=', $id)->with('translation', 'productLineGroup.productLineGroup.translation')->get()->all();
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
    public function show($id)
    {
        return $this->item(ProductLine::findOrFail($id), new ProductTransformer());
    }

    /**
     * Update the product in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $Product = ProductRequest::findOrFail($id);
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
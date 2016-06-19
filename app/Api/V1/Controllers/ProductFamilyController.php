<?php
namespace App\Api\V1\Controllers;

use App\Models\CommonProductFamily as ProductFamily;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\V1\Requests\ProductFamilyRequest;
use App\Api\V1\Transformers\ProductFamilyTransformer;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class ProductFamilyController extends BaseController
{
    /**
     * Show all technologies
     *
     * Get a JSON representation of all the technologies
     *
     * @Get('/')
     */
    public function index()
    {
        return $this->collection(ProductFamily::where('displaySequence', '!=', -1)->orderBy('displaySequence')->get(), new ProductFamilyTransformer());
    }
    /**
     * Store a new ProductFamily in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFamilyRequest $request)
    {
        return ProductFamily::create($request);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->item(ProductFamily::findOrFail($id), new ProductFamilyTransformer());
    }
    /**
     * Update the ProductFamily in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFamilyRequest $request, $id)
    {
        $productFamily = ProductFamilyRequest::findOrFail($id);
        $productFamily->update($request);
        return $productFamily;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ProductFamily::destroy($id);
    }
}
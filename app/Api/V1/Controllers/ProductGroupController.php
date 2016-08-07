<?php
namespace App\Api\V1\Controllers;

use App\Api\V1\Transformers\ProductGroupTransformer;
use App\Models\CommonProductGroup as ProductGroup;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class ProductGroupController extends BaseController
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
        return $this->collection(ProductGroup::get(), new ProductGroupTransformer());

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $productGroupId = $request->route('id');
        return $this->item(ProductGroup::where('productGroupID', '=', $productGroupId)->firstOrFail(), new ProductGroupTransformer());
    }
}
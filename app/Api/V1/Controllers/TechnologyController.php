<?php
namespace App\Api\V1\Controllers;

use App\Models\CommonProductFamily as Technology;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\V1\Requests\TechnologyRequest;
use App\Api\V1\Transformers\TechnologyTransformer;

/**
 * @Resource('Technologies', uri='/technologies')
 */
class TechnologyController extends BaseController
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
        return $this->collection(Technology::with(['translation'])->get(), new TechnologyTransformer());
    }
    /**
     * Store a new technology in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyRequest $request)
    {
        return Technology::create($request);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->item(Technology::findOrFail($id), new TechnologyTransformer());
    }
    /**
     * Update the technology in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TechnologyRequest $request, $id)
    {
        $technology = TechnologyRequest::findOrFail($id);
        $technology->update($request);
        return $technology;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Technology::destroy($id);
    }
}
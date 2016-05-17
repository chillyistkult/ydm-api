<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterFilterType extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_FilterType';
    protected $fillable = ['filterTypeID', 'shortName', 'description'];


    public function filterFilters() {
        return $this->hasMany(\App\Models\FilterFilter::class, 'filterTypeID', 'filterTypeID');
    }


}

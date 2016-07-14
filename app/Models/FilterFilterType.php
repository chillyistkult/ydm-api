<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterFilterType extends Model {

    /**
     * Generated
     */

    protected $primaryKey = 'filterTypeID';
    protected $table = 'Filter_FilterType';
    protected $fillable = ['shortName', 'description'];


    public function filterFilters() {
        return $this->hasMany(\App\Models\FilterFilter::class, 'filterTypeID', 'filterTypeID');
    }


}

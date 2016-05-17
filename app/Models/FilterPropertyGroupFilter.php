<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterPropertyGroupFilter extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_PropertyGroupFilter';
    protected $fillable = ['filterID', 'propertyGroupID', 'description'];


    public function filterFilter() {
        return $this->belongsTo(\App\Models\FilterFilter::class, 'filterID', 'filterID');
    }

    public function filterPropertyGroup() {
        return $this->belongsTo(\App\Models\FilterPropertyGroup::class, 'propertyGroupID', 'propertyGroupID');
    }


}

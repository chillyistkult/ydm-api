<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterPropertyGroup extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_PropertyGroup';
    protected $fillable = ['propertyGroupID', 'shortName', 'displaySequence'];


    public function filterFilters() {
        return $this->belongsToMany(\App\Models\FilterFilter::class, 'Filter_PropertyGroupFilter', 'propertyGroupID', 'filterID');
    }

    public function filterProperties() {
        return $this->hasMany(\App\Models\FilterProperty::class, 'propertyGroupID', 'propertyGroupID');
    }

    public function filterPropertyGroupFilters() {
        return $this->hasMany(\App\Models\FilterPropertyGroupFilter::class, 'propertyGroupID', 'propertyGroupID');
    }


}
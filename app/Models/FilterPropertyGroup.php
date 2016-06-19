<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterPropertyGroup extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_PropertyGroup';
    protected $fillable = ['propertyGroupID', 'shortName', 'displaySequence'];


    public function filters() {
        return $this->belongsToMany(\App\Models\FilterFilter::class, 'Filter_PropertyGroupFilter', 'propertyGroupID', 'filterID');
    }

    public function properties() {
        return $this->hasMany(\App\Models\FilterProperty::class, 'propertyGroupID', 'propertyGroupID');
    }

    public function propertyGroupFilters() {
        return $this->hasMany(\App\Models\FilterPropertyGroupFilter::class, 'propertyGroupID', 'propertyGroupID');
    }


}

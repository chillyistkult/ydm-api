<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterFilter extends Model {

    /**
     * Generated
     */

    protected $primaryKey = 'filterID';
    protected $table = 'Filter_Filter';
    protected $fillable = ['filterID', 'shortName', 'displayName', 'filterTypeID', 'productGroupID', 'filterGroupID', 'resultDisplaySequence', 'filterDisplaySequence', 'filterSpaceLeftInPixel', 'filterSpaceRightInPixel', 'preselectedValueID'];

    public $timestamps = false;

    public function productGroup() {
        return $this->belongsTo(\App\Models\CommonProductGroup::class, 'productGroupID', 'productGroupID');
    }

    public function translation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    public function group() {
        return $this->belongsTo(\App\Models\FilterFilterGroup::class, 'filterGroupID', 'filterGroupID');
    }

    public function type() {
        return $this->belongsTo(\App\Models\FilterFilterType::class, 'filterTypeID', 'filterTypeID');
    }

    public function customCharacteristics() {
        return $this->belongsToMany(\App\Models\CharacteristicCustomCharacteristic::class, 'Filter_CustomCharacteristicFilter', 'filterID', 'customCharacteristicID');
    }

    public function modelComponents() {
        return $this->belongsToMany(\App\Models\CharacteristicModelComponent::class, 'Filter_ModelComponentFilter', 'filterID', 'modelComponentTypeID');
    }

    public function propertyGroups() {
        return $this->belongsToMany(\App\Models\FilterPropertyGroup::class, 'Filter_PropertyGroupFilter', 'filterID', 'propertyGroupID');
    }

    public function characteristicFilter() {
        return $this->hasOne(\App\Models\FilterCharacteristicFilter::class, 'filterID', 'filterID');
    }

    public function customCharacteristicFilter() {
        return $this->hasOne(\App\Models\FilterCustomCharacteristicFilter::class, 'filterID', 'filterID');
    }

    public function modelComponentFilter() {
        return $this->hasOne(\App\Models\FilterModelComponentFilter::class, 'filterID', 'filterID');
    }

    public function propertyGroupFilter() {
        return $this->hasOne(\App\Models\FilterPropertyGroupFilter::class, 'filterID', 'filterID');
    }

    public function rotamassAccuracyOptionFilter() {
        return $this->hasOne(\App\Models\FilterRotamassAccuracyOptionFilter::class, 'filterID', 'filterID');
    }


}

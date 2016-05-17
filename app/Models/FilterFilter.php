<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterFilter extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_Filter';
    protected $fillable = ['filterID', 'shortName', 'displayName', 'filterTypeID', 'productGroupID', 'filterGroupID', 'resultDisplaySequence', 'filterDisplaySequence', 'filterSpaceLeftInPixel', 'filterSpaceRightInPixel', 'preselectedValueID'];


    public function commonProductGroup() {
        return $this->belongsTo(\App\Models\CommonProductGroup::class, 'productGroupID', 'productGroupID');
    }

    public function commonTranslateWordId() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    public function filterFilterGroup() {
        return $this->belongsTo(\App\Models\FilterFilterGroup::class, 'filterGroupID', 'filterGroupID');
    }

    public function filterFilterType() {
        return $this->belongsTo(\App\Models\FilterFilterType::class, 'filterTypeID', 'filterTypeID');
    }

    public function characteristicCustomCharacteristics() {
        return $this->belongsToMany(\App\Models\CharacteristicCustomCharacteristic::class, 'Filter_CustomCharacteristicFilter', 'filterID', 'customCharacteristicID');
    }

    public function characteristicModelComponents() {
        return $this->belongsToMany(\App\Models\CharacteristicModelComponent::class, 'Filter_ModelComponentFilter', 'filterID', 'modelComponentTypeID');
    }

    public function filterPropertyGroups() {
        return $this->belongsToMany(\App\Models\FilterPropertyGroup::class, 'Filter_PropertyGroupFilter', 'filterID', 'propertyGroupID');
    }

    public function filterCharacteristicFilter() {
        return $this->hasOne(\App\Models\FilterCharacteristicFilter::class, 'filterID', 'filterID');
    }

    public function filterCustomCharacteristicFilter() {
        return $this->hasOne(\App\Models\FilterCustomCharacteristicFilter::class, 'filterID', 'filterID');
    }

    public function filterModelComponentFilter() {
        return $this->hasOne(\App\Models\FilterModelComponentFilter::class, 'filterID', 'filterID');
    }

    public function filterPropertyGroupFilter() {
        return $this->hasOne(\App\Models\FilterPropertyGroupFilter::class, 'filterID', 'filterID');
    }

    public function filterRotamassAccuracyOptionFilter() {
        return $this->hasOne(\App\Models\FilterRotamassAccuracyOptionFilter::class, 'filterID', 'filterID');
    }


}

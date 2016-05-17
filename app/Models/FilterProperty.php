<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterProperty extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_Property';
    protected $fillable = ['propertyID', 'shortName', 'displayName', 'propertyGroupID', 'minTemperatureInCelsius', 'maxTemperatureInCelsius', 'maxPressureInBarAbsolute', 'aggregateStateID', 'displaySequence'];


    public function filterPropertyGroup() {
        return $this->belongsTo(\App\Models\FilterPropertyGroup::class, 'propertyGroupID', 'propertyGroupID');
    }

    public function commonTranslateWordId() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    public function characteristicModels() {
        return $this->belongsToMany(\App\Models\CharacteristicModel::class, 'Filter_CharacteristicModelProperties', 'propertyID', 'characteristicModelID');
    }

    public function commonProductFamilies() {
        return $this->belongsToMany(\App\Models\CommonProductFamily::class, 'Filter_ProductFamilyProperties', 'productPropertyID', 'productFamilyID');
    }

    public function commonProductLines() {
        return $this->belongsToMany(\App\Models\CommonProductLine::class, 'Filter_ProductLineProperties', 'productPropertyID', 'productLineID');
    }

    public function filterCharacteristicModelProperties() {
        return $this->hasMany(\App\Models\FilterCharacteristicModelProperty::class, 'propertyID', 'propertyID');
    }

    public function filterProductFamilyProperties() {
        return $this->hasMany(\App\Models\FilterProductFamilyProperty::class, 'productPropertyID', 'propertyID');
    }

    public function filterProductLineProperties() {
        return $this->hasMany(\App\Models\FilterProductLineProperty::class, 'productPropertyID', 'propertyID');
    }

    public function filterTubeFloatCombinationProperties() {
        return $this->hasMany(\App\Models\FilterTubeFloatCombinationProperty::class, 'propertyID', 'propertyID');
    }


}

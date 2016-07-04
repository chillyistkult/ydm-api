<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterProperty extends Model {

    /**
     * Generated
     */

    protected $primaryKey = 'propertyID';

    protected $table = 'Filter_Property';
    protected $fillable = ['shortName', 'displayName', 'propertyGroupID', 'minTemperatureInCelsius', 'maxTemperatureInCelsius', 'maxPressureInBarAbsolute', 'aggregateStateID', 'displaySequence'];


    public function propertyGroup() {
        return $this->belongsTo(\App\Models\FilterPropertyGroup::class, 'propertyGroupID', 'propertyGroupID');
    }

    public function translation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    public function characteristicModels() {
        return $this->belongsToMany(\App\Models\CharacteristicModel::class, 'Filter_CharacteristicModelProperties', 'propertyID', 'characteristicModelID');
    }

    public function productFamilies() {
        return $this->belongsToMany(\App\Models\CommonProductFamily::class, 'Filter_ProductFamilyProperties', 'productPropertyID', 'productFamilyID');
    }

    public function productLines() {
        return $this->belongsToMany(\App\Models\CommonProductLine::class, 'Filter_ProductLineProperties', 'productPropertyID', 'productLineID');
    }

    public function modelProperties() {
        return $this->hasMany(\App\Models\FilterCharacteristicModelProperty::class, 'propertyID', 'propertyID');
    }

    public function productFamilyProperties() {
        return $this->hasMany(\App\Models\FilterProductFamilyProperty::class, 'productPropertyID', 'propertyID');
    }

    public function productLineProperties() {
        return $this->hasMany(\App\Models\FilterProductLineProperty::class, 'productPropertyID', 'propertyID');
    }

    public function tubeFloatCombinationProperties() {
        return $this->hasMany(\App\Models\FilterTubeFloatCombinationProperty::class, 'propertyID', 'propertyID');
    }


}

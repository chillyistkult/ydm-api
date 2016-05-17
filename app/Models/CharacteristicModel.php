<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicModel extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_Model';
    protected $fillable = ['characteristicModelID', 'code', 'description', 'productLineID', 'basePrice', 'priceInUSD', 'priceInJPY', 'validFrom', 'validTo', 'informationText', 'featureModelPrefix'];


    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'informationText', 'wordID');
    }

    public function commonProductLine() {
        return $this->belongsTo(\App\Models\CommonProductLine::class, 'productLineID', 'productLineID');
    }

    public function characteristicModels() {
        return $this->belongsToMany(\App\Models\CharacteristicModel::class, 'Characteristic_ModelDependency', 'baseCharacteristicModelID', 'requiredCharacteristicModelID');
    }

    public function characteristicModels() {
        return $this->belongsToMany(\App\Models\CharacteristicModel::class, 'Characteristic_ModelDependency', 'requiredCharacteristicModelID', 'baseCharacteristicModelID');
    }

    public function characteristicModelComponentValues() {
        return $this->belongsToMany(\App\Models\CharacteristicModelComponentValue::class, 'Characteristic_ModelModelComponentValueRelation', 'characteristicModelID', 'modelComponentValueID');
    }

    public function filterProperties() {
        return $this->belongsToMany(\App\Models\FilterProperty::class, 'Filter_CharacteristicModelProperties', 'characteristicModelID', 'propertyID');
    }

    public function characteristicCharacteristicRemarks() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicRemark::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function characteristicInheritedFeatures() {
        return $this->hasMany(\App\Models\CharacteristicInheritedFeature::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function characteristicModelCharacteristics() {
        return $this->hasMany(\App\Models\CharacteristicModelCharacteristic::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function characteristicModelDependencies() {
        return $this->hasMany(\App\Models\CharacteristicModelDependency::class, 'baseCharacteristicModelID', 'characteristicModelID');
    }

    public function characteristicModelDependencies() {
        return $this->hasMany(\App\Models\CharacteristicModelDependency::class, 'requiredCharacteristicModelID', 'characteristicModelID');
    }

    public function characteristicModelModelComponentValueRelations() {
        return $this->hasMany(\App\Models\CharacteristicModelModelComponentValueRelation::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function filterCharacteristicModelProperties() {
        return $this->hasMany(\App\Models\FilterCharacteristicModelProperty::class, 'characteristicModelID', 'characteristicModelID');
    }


}

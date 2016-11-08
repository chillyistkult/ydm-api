<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicModel extends Model {

    /**
     * Generated
     */

    protected $primaryKey = 'characteristicModelID';
    protected $table = 'Characteristic_Model';
    protected $fillable = ['characteristicModelID', 'code', 'description', 'productLineID', 'basePrice', 'priceInUSD', 'priceInJPY', 'validFrom', 'validTo', 'informationText', 'featureModelPrefix'];


    public function translation() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'informationText', 'wordID');
    }

    public function productLine() {
        return $this->belongsTo(\App\Models\CommonProductLine::class, 'productLineID', 'productLineID');
    }

    public function bases() {
        return $this->belongsToMany(\App\Models\CharacteristicModel::class, 'Characteristic_ModelDependency', 'baseCharacteristicModelID', 'requiredCharacteristicModelID');
    }


    public function required() {
        return $this->belongsToMany(\App\Models\CharacteristicModel::class, 'Characteristic_ModelDependency', 'requiredCharacteristicModelID', 'baseCharacteristicModelID');
    }


    public function componentValues() {
        return $this->belongsToMany(\App\Models\CharacteristicModelComponentValue::class, 'Characteristic_ModelModelComponentValueRelation', 'characteristicModelID', 'modelComponentValueID');
    }

    public function properties() {
        return $this->belongsToMany(\App\Models\FilterProperty::class, 'Filter_CharacteristicModelProperties', 'characteristicModelID', 'propertyID');
    }

    public function remarks() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicRemark::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function features() {
        return $this->hasMany(\App\Models\CharacteristicInheritedFeature::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function characteristics() {
        return $this->hasMany(\App\Models\CharacteristicModelCharacteristic::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function dependencies() {
        return $this->hasMany(\App\Models\CharacteristicModelDependency::class, 'baseCharacteristicModelID', 'characteristicModelID');
    }

    /*
    public function characteristicModelDependencies() {
        return $this->hasMany(\App\Models\CharacteristicModelDependency::class, 'requiredCharacteristicModelID', 'characteristicModelID');
    }
    */

    public function valueRelations() {
        return $this->hasMany(\App\Models\CharacteristicModelModelComponentValueRelation::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function modelProperties() {
        return $this->hasMany(\App\Models\FilterCharacteristicModelProperty::class, 'characteristicModelID', 'characteristicModelID');
    }


}

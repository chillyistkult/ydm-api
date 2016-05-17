<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicModelCharacteristic extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_ModelCharacteristic';
    protected $fillable = ['modelCharacteristicID', 'characteristicModelID', 'code', 'description', 'characteristicID', 'characteristicGroupID', 'lowerBound', 'upperBound', 'validFrom', 'validTo', 'modifiedValidTo', 'isSpecialRequest', 'displaySequence', 'modifiedDisplaySequence'];


    public function characteristicCharacteristic() {
        return $this->belongsTo(\App\Models\CharacteristicCharacteristic::class, 'characteristicID', 'characteristicID');
    }

    public function characteristicCharacteristicGroup() {
        return $this->belongsTo(\App\Models\CharacteristicCharacteristicGroup::class, 'characteristicGroupID', 'characteristicGroupID');
    }

    public function characteristicModel() {
        return $this->belongsTo(\App\Models\CharacteristicModel::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function characteristicModelCharacteristicValues() {
        return $this->hasMany(\App\Models\CharacteristicModelCharacteristicValue::class, 'modelCharacteristicID', 'modelCharacteristicID');
    }


}

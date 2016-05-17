<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicModelCharacteristicValue extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_ModelCharacteristicValue';
    protected $fillable = ['modelCharacteristicValueID', 'modelCharacteristicID', 'code', 'description', 'longText', 'characteristicValueID', 'validFrom', 'validTo', 'basePrice', 'priceInUSD', 'priceInJPY', 'isSpecialDevice', 'displaySequence', 'modifiedDisplaySequence', 'modifiedValidTo'];


    public function characteristicCharacteristicValue() {
        return $this->belongsTo(\App\Models\CharacteristicCharacteristicValue::class, 'characteristicValueID', 'characteristicValueID');
    }

    public function characteristicModelCharacteristic() {
        return $this->belongsTo(\App\Models\CharacteristicModelCharacteristic::class, 'modelCharacteristicID', 'modelCharacteristicID');
    }

    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'longText', 'wordID');
    }


}

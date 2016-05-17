<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicCustomCharacteristicValueCharacteristicValueRel extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_CustomCharacteristicValueCharacteristicValueRel';
    protected $fillable = ['customCharacteristicValueID', 'characteristicValueID'];


    public function characteristicCharacteristicValue() {
        return $this->belongsTo(\App\Models\CharacteristicCharacteristicValue::class, 'characteristicValueID', 'characteristicValueID');
    }

    public function characteristicCustomCharacteristicValue() {
        return $this->belongsTo(\App\Models\CharacteristicCustomCharacteristicValue::class, 'customCharacteristicValueID', 'customCharacteristicValueID');
    }


}

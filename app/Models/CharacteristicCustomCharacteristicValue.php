<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicCustomCharacteristicValue extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_CustomCharacteristicValue';
    protected $fillable = ['customCharacteristicValueID', 'customCharacteristicID', 'description', 'displayName', 'displaySequence'];


    public function characteristicCustomCharacteristic() {
        return $this->belongsTo(\App\Models\CharacteristicCustomCharacteristic::class, 'customCharacteristicID', 'customCharacteristicID');
    }

    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'displayName', 'wordID');
    }

    public function characteristicCharacteristicValues() {
        return $this->belongsToMany(\App\Models\CharacteristicCharacteristicValue::class, 'Characteristic_CustomCharacteristicValueCharacteristicValueRel', 'customCharacteristicValueID', 'characteristicValueID');
    }

    public function characteristicCustomCharacteristicValueCharacteristicValueRels() {
        return $this->hasMany(\App\Models\CharacteristicCustomCharacteristicValueCharacteristicValueRel::class, 'customCharacteristicValueID', 'customCharacteristicValueID');
    }


}

<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicCharacteristicValue extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_CharacteristicValue';
    protected $fillable = ['characteristicValueID', 'description', 'displayName', 'modifiedDisplayName'];


    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'displayName', 'wordID');
    }

    /*
    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'modifiedDisplayName', 'wordID');
    }
    */

    public function characteristicCustomCharacteristicValues() {
        return $this->belongsToMany(\App\Models\CharacteristicCustomCharacteristicValue::class, 'Characteristic_CustomCharacteristicValueCharacteristicValueRel', 'characteristicValueID', 'customCharacteristicValueID');
    }

    public function characteristicCustomCharacteristicValueCharacteristicValueRels() {
        return $this->hasMany(\App\Models\CharacteristicCustomCharacteristicValueCharacteristicValueRel::class, 'characteristicValueID', 'characteristicValueID');
    }

    public function characteristicModelCharacteristicValues() {
        return $this->hasMany(\App\Models\CharacteristicModelCharacteristicValue::class, 'characteristicValueID', 'characteristicValueID');
    }


}

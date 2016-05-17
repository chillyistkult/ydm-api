<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicCharacteristic extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_Characteristic';
    protected $fillable = ['characteristicID', 'description', 'displayName', 'modifiedDisplayName'];


    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'displayName', 'wordID');
    }

    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'modifiedDisplayName', 'wordID');
    }

    public function filterCharacteristicFilters() {
        return $this->belongsToMany(\App\Models\FilterCharacteristicFilter::class, 'Filter_CharacteristcFilterCharacteristicRelation', 'characteristicID', 'filterID');
    }

    public function characteristicCharacteristicRemarks() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicRemark::class, 'characteristicID', 'characteristicID');
    }

    public function characteristicModelCharacteristics() {
        return $this->hasMany(\App\Models\CharacteristicModelCharacteristic::class, 'characteristicID', 'characteristicID');
    }

    public function filterCharacteristcFilterCharacteristicRelations() {
        return $this->hasMany(\App\Models\FilterCharacteristcFilterCharacteristicRelation::class, 'characteristicID', 'characteristicID');
    }


}

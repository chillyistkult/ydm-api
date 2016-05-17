<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicCustomCharacteristic extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_CustomCharacteristic';
    protected $fillable = ['customCharacteristicID', 'description', 'displayName'];


    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'displayName', 'wordID');
    }

    public function filterFilters() {
        return $this->belongsToMany(\App\Models\FilterFilter::class, 'Filter_CustomCharacteristicFilter', 'customCharacteristicID', 'filterID');
    }

    public function characteristicCustomCharacteristicValues() {
        return $this->hasMany(\App\Models\CharacteristicCustomCharacteristicValue::class, 'customCharacteristicID', 'customCharacteristicID');
    }

    public function filterCustomCharacteristicFilters() {
        return $this->hasMany(\App\Models\FilterCustomCharacteristicFilter::class, 'customCharacteristicID', 'customCharacteristicID');
    }


}

<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterCharacteristcFilterCharacteristicRelation extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_CharacteristcFilterCharacteristicRelation';
    protected $fillable = ['filterID', 'characteristicID'];


    public function characteristicCharacteristic() {
        return $this->belongsTo(\App\Models\CharacteristicCharacteristic::class, 'characteristicID', 'characteristicID');
    }

    public function filterCharacteristicFilter() {
        return $this->belongsTo(\App\Models\FilterCharacteristicFilter::class, 'filterID', 'filterID');
    }


}

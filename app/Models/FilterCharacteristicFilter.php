<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterCharacteristicFilter extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_CharacteristicFilter';
    protected $fillable = ['filterID', 'description'];


    public function filterFilter() {
        return $this->belongsTo(\App\Models\FilterFilter::class, 'filterID', 'filterID');
    }

    public function characteristicCharacteristics() {
        return $this->belongsToMany(\App\Models\CharacteristicCharacteristic::class, 'Filter_CharacteristcFilterCharacteristicRelation', 'filterID', 'characteristicID');
    }

    public function filterCharacteristcFilterCharacteristicRelations() {
        return $this->hasMany(\App\Models\FilterCharacteristcFilterCharacteristicRelation::class, 'filterID', 'filterID');
    }


}

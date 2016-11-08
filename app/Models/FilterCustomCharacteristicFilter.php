<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterCustomCharacteristicFilter extends Model {

    /**
     * Generated
     */

    protected $primaryKey = 'filterID';
    protected $table = 'Filter_CustomCharacteristicFilter';
    protected $fillable = ['filterID', 'customCharacteristicID', 'description'];


    public function characteristicCustomCharacteristic() {
        return $this->belongsTo(\App\Models\CharacteristicCustomCharacteristic::class, 'customCharacteristicID', 'customCharacteristicID');
    }

    public function filterFilter() {
        return $this->belongsTo(\App\Models\FilterFilter::class, 'filterID', 'filterID');
    }


}

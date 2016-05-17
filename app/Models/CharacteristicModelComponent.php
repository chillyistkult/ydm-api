<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicModelComponent extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_ModelComponent';
    protected $fillable = ['modelComponentID', 'displayName', 'description', 'displaySequence'];


    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'displayName', 'wordID');
    }

    public function filterFilters() {
        return $this->belongsToMany(\App\Models\FilterFilter::class, 'Filter_ModelComponentFilter', 'modelComponentTypeID', 'filterID');
    }

    public function characteristicModelComponentValues() {
        return $this->hasMany(\App\Models\CharacteristicModelComponentValue::class, 'modelComponentID', 'modelComponentID');
    }

    public function filterModelComponentFilters() {
        return $this->hasMany(\App\Models\FilterModelComponentFilter::class, 'modelComponentTypeID', 'modelComponentID');
    }


}

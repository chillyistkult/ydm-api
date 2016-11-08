<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterCharacteristicModelProperty extends Model {

    /**
     * Generated
     */

    protected $primaryKey = 'propertyID';
    protected $table = 'Filter_CharacteristicModelProperties';
    protected $fillable = ['propertyID', 'characteristicModelID'];


    public function characteristicModel() {
        return $this->belongsTo(\App\Models\CharacteristicModel::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function property() {
        return $this->belongsTo(\App\Models\FilterProperty::class, 'propertyID', 'propertyID');
    }


}

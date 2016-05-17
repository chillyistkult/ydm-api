<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicModelModelComponentValueRelation extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_ModelModelComponentValueRelation';
    protected $fillable = ['characteristicModelID', 'modelComponentValueID', 'displaySequence'];


    public function characteristicModel() {
        return $this->belongsTo(\App\Models\CharacteristicModel::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function characteristicModelComponentValue() {
        return $this->belongsTo(\App\Models\CharacteristicModelComponentValue::class, 'modelComponentValueID', 'modelComponentValueID');
    }


}

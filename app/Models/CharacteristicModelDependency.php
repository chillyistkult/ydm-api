<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicModelDependency extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_ModelDependency';
    protected $fillable = ['baseCharacteristicModelID', 'requiredCharacteristicModelID'];

    /*
    public function model() {
        return $this->belongsTo(\App\Models\CharacteristicModel::class, 'baseCharacteristicModelID', 'characteristicModelID');
    }
    */

    public function model() {
        return $this->belongsTo(\App\Models\CharacteristicModel::class, 'requiredCharacteristicModelID', 'characteristicModelID');
    }


}

<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicInheritedFeature extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_InheritedFeature';
    protected $fillable = ['inheritedFeatureID', 'characteristicModelID', 'code', 'description'];


    public function characteristicModel() {
        return $this->belongsTo(\App\Models\CharacteristicModel::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function characteristicInheritedFeatureValues() {
        return $this->hasMany(\App\Models\CharacteristicInheritedFeatureValue::class, 'inheritedFeatureID', 'inheritedFeatureID');
    }


}

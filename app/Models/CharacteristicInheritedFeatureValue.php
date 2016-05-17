<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicInheritedFeatureValue extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_InheritedFeatureValue';
    protected $fillable = ['inheritedFeatureValueID', 'inheritedFeatureID', 'code', 'description'];


    public function characteristicInheritedFeature() {
        return $this->belongsTo(\App\Models\CharacteristicInheritedFeature::class, 'inheritedFeatureID', 'inheritedFeatureID');
    }


}

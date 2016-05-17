<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicModelComponentValue extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_ModelComponentValue';
    protected $fillable = ['modelComponentValueID', 'modelComponentID', 'displayName', 'code', 'description'];


    public function characteristicModelComponent() {
        return $this->belongsTo(\App\Models\CharacteristicModelComponent::class, 'modelComponentID', 'modelComponentID');
    }

    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'displayName', 'wordID');
    }

    public function characteristicModels() {
        return $this->belongsToMany(\App\Models\CharacteristicModel::class, 'Characteristic_ModelModelComponentValueRelation', 'modelComponentValueID', 'characteristicModelID');
    }

    public function characteristicModelModelComponentValueRelations() {
        return $this->hasMany(\App\Models\CharacteristicModelModelComponentValueRelation::class, 'modelComponentValueID', 'modelComponentValueID');
    }


}

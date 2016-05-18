<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicCharacteristicGroup extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_CharacteristicGroup';
    protected $fillable = ['characteristicGroupID', 'name', 'displayName', 'displaySequence', 'infoTooltipDisplayName', 'helpTooltipDisplayName'];


    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'displayName', 'wordID');
    }

    public function commonTranslateWordId() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'helpTooltipDisplayName', 'wordID');
    }

    /*
    public function commonTranslateWordId() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'infoTooltipDisplayName', 'wordID');
    }
    */

    public function characteristicModelCharacteristics() {
        return $this->hasMany(\App\Models\CharacteristicModelCharacteristic::class, 'characteristicGroupID', 'characteristicGroupID');
    }


}

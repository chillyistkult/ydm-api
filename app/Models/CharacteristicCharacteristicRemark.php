<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicCharacteristicRemark extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_CharacteristicRemark';
    protected $fillable = ['characteristicRemarkID', 'productLineID', 'characteristicModelID', 'characteristicID', 'modelCharacteristicValue', 'remark'];


    public function characteristicCharacteristic() {
        return $this->belongsTo(\App\Models\CharacteristicCharacteristic::class, 'characteristicID', 'characteristicID');
    }

    public function translation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'remark', 'wordID');
    }

    public function characteristicModel() {
        return $this->belongsTo(\App\Models\CharacteristicModel::class, 'characteristicModelID', 'characteristicModelID');
    }

    public function commonProductLine() {
        return $this->belongsTo(\App\Models\CommonProductLine::class, 'productLineID', 'productLineID');
    }


}

<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductLine extends Model {

    /**
     * Generated
     */

    protected $table = 'Common_ProductLine';
    protected $fillable = ['productLineID', 'productFamilyID', 'shortName', 'displayName', 'selectionResultPrefix', 'productLineGroupID', 'displaySequence'];


    public function commonProductFamily() {
        return $this->belongsTo(\App\Models\CommonProductFamily::class, 'productFamilyID', 'productFamilyID');
    }

    public function commonProductLineGroup() {
        return $this->belongsTo(\App\Models\CommonProductLineGroup::class, 'productLineGroupID', 'productLineGroupID');
    }

    public function commonTranslateWordId() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    /*
    public function commonTranslateWordId() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'selectionResultPrefix', 'wordID');
    }
    */

    public function filterProperties() {
        return $this->belongsToMany(\App\Models\FilterProperty::class, 'Filter_ProductLineProperties', 'productLineID', 'productPropertyID');
    }

    public function characteristicCharacteristicRemarks() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicRemark::class, 'productLineID', 'productLineID');
    }

    public function characteristicModels() {
        return $this->hasMany(\App\Models\CharacteristicModel::class, 'productLineID', 'productLineID');
    }

    public function commonProductGroupValues() {
        return $this->hasMany(\App\Models\CommonProductGroupValue::class, 'productLineID', 'productLineID');
    }

    public function commonProductLineAndModelLimits() {
        return $this->hasMany(\App\Models\CommonProductLineAndModelLimit::class, 'productLineID', 'productLineID');
    }

    public function filterProductLineProperties() {
        return $this->hasMany(\App\Models\FilterProductLineProperty::class, 'productLineID', 'productLineID');
    }


}

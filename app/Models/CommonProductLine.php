<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductLine extends Model {

    /**
     * Generated
     */

    protected $table = 'Common_ProductLine';
    protected $fillable = ['productLineID', 'productFamilyID', 'shortName', 'displayName', 'selectionResultPrefix', 'productLineGroupID', 'displaySequence'];


    public function productFamily() {
        return $this->belongsTo(\App\Models\CommonProductFamily::class, 'productFamilyID', 'productFamilyID');
    }

    public function productLineGroup() {
        return $this->belongsTo(\App\Models\CommonProductLineGroup::class, 'productLineGroupID', 'productLineGroupID');
    }

    public function translation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    /*
    public function translation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'selectionResultPrefix', 'wordID');
    }
    */

    public function filterProperties() {
        return $this->belongsToMany(\App\Models\FilterProperty::class, 'Filter_ProductLineProperties', 'productLineID', 'productPropertyID');
    }

    public function characteristicRemarks() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicRemark::class, 'productLineID', 'productLineID');
    }

    public function characteristicModels() {
        return $this->hasMany(\App\Models\CharacteristicModel::class, 'productLineID', 'productLineID');
    }

    public function productGroups() {
        return $this->hasMany(\App\Models\CommonProductGroupValue::class, 'productLineID', 'productLineID');
    }

    public function productLineAndModelLimits() {
        return $this->hasMany(\App\Models\CommonProductLineAndModelLimit::class, 'productLineID', 'productLineID');
    }

    public function productLineProperties() {
        return $this->hasMany(\App\Models\FilterProductLineProperty::class, 'productLineID', 'productLineID');
    }


}

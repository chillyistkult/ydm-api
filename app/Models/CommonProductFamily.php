<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductFamily extends Model {

    /**
     * Generated
     */

    protected $table = 'Common_ProductFamily';
    protected $fillable = ['productFamilyID', 'shortName', 'displayName', 'displaySequence'];


    public function commonTranslateWordId() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    public function filterProperties() {
        return $this->belongsToMany(\App\Models\FilterProperty::class, 'Filter_ProductFamilyProperties', 'productFamilyID', 'productPropertyID');
    }

    public function commonProductGroupValues() {
        return $this->hasMany(\App\Models\CommonProductGroupValue::class, 'productFamilyID', 'productFamilyID');
    }

    public function commonProductLines() {
        return $this->hasMany(\App\Models\CommonProductLine::class, 'productFamilyID', 'productFamilyID');
    }

    public function filterProductFamilyProperties() {
        return $this->hasMany(\App\Models\FilterProductFamilyProperty::class, 'productFamilyID', 'productFamilyID');
    }


}

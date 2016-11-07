<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductFamily extends Model {

    /**
     * Generated
     */

    protected $primaryKey = 'productFamilyID';

    protected $table = 'Common_ProductFamily';
    protected $fillable = ['productFamilyID', 'shortName', 'displayName', 'displaySequence'];


    public function translation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    public function filterProperties() {
        return $this->belongsToMany(\App\Models\FilterProperty::class, 'Filter_ProductFamilyProperties', 'productFamilyID', 'productPropertyID');
    }

    public function productGroups() {
        return $this->hasMany(\App\Models\CommonProductGroupValue::class, 'productFamilyID', 'productFamilyID');
    }

    public function productLines() {
        return $this->hasMany(\App\Models\CommonProductLine::class, 'productFamilyID', 'productFamilyID');
    }

    public function productFamilyProperties() {
        return $this->hasMany(\App\Models\FilterProductFamilyProperty::class, 'productFamilyID', 'productFamilyID');
    }


}

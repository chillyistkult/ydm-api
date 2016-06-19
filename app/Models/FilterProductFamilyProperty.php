<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterProductFamilyProperty extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_ProductFamilyProperties';
    protected $fillable = ['productFamilyID', 'productPropertyID'];


    public function productFamily() {
        return $this->belongsTo(\App\Models\CommonProductFamily::class, 'productFamilyID', 'productFamilyID');
    }

    public function property() {
        return $this->belongsTo(\App\Models\FilterProperty::class, 'productPropertyID', 'propertyID');
    }


}

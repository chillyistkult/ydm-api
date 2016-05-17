<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterProductLineProperty extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_ProductLineProperties';
    protected $fillable = ['productLineID', 'productPropertyID'];


    public function commonProductLine() {
        return $this->belongsTo(\App\Models\CommonProductLine::class, 'productLineID', 'productLineID');
    }

    public function filterProperty() {
        return $this->belongsTo(\App\Models\FilterProperty::class, 'productPropertyID', 'propertyID');
    }


}

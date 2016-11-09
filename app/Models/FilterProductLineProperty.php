<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterProductLineProperty extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_ProductLineProperties';
    protected $fillable = ['productLineID', 'productPropertyID'];

    public $timestamps = false;

    public function productLine() {
        return $this->belongsTo(\App\Models\CommonProductLine::class, 'productLineID', 'productLineID');
    }

    public function property() {
        return $this->belongsTo(\App\Models\FilterProperty::class, 'productPropertyID', 'propertyID');
    }


}

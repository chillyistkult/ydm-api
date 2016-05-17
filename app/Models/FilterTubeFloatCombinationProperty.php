<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterTubeFloatCombinationProperty extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_TubeFloatCombinationProperties';
    protected $fillable = ['propertyID', 'tubeFloatCombID'];


    public function filterProperty() {
        return $this->belongsTo(\App\Models\FilterProperty::class, 'propertyID', 'propertyID');
    }


}

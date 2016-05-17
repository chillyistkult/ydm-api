<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterModelComponentFilter extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_ModelComponentFilter';
    protected $fillable = ['filterID', 'modelComponentTypeID', 'description'];


    public function characteristicModelComponent() {
        return $this->belongsTo(\App\Models\CharacteristicModelComponent::class, 'modelComponentTypeID', 'modelComponentID');
    }

    public function filterFilter() {
        return $this->belongsTo(\App\Models\FilterFilter::class, 'filterID', 'filterID');
    }


}

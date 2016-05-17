<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterRotamassAccuracyOptionFilter extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_RotamassAccuracyOptionFilter';
    protected $fillable = ['filterID', 'rotamassAccuracyTypeID', 'description'];


    public function filterFilter() {
        return $this->belongsTo(\App\Models\FilterFilter::class, 'filterID', 'filterID');
    }


}

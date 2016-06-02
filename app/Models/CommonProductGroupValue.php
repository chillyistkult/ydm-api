<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductGroupValue extends Model {

    /**
     * Generated
     */

    protected $table = 'Common_ProductGroupValue';
    protected $fillable = ['productGroupValueID', 'productGroupID', 'productFamilyID', 'productLineGroupID', 'productLineID'];


    public function commonProductFamily() {
        return $this->belongsTo(\App\Models\CommonProductFamily::class, 'productFamilyID', 'productFamilyID');
    }

    public function commonProductGroup() {
        return $this->belongsTo(\App\Models\CommonProductGroup::class, 'productGroupID', 'productGroupID');
    }

    public function commonProductLine() {
        return $this->belongsTo(\App\Models\CommonProductLine::class, 'productLineID', 'productLineID');
    }

    public function productLineGroup() {
        return $this->belongsTo(\App\Models\CommonProductLineGroup::class, 'productLineGroupID', 'productLineGroupID');
    }


}

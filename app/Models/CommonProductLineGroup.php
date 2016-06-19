<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductLineGroup extends Model {

    /**
     * Generated
     */

    protected $table = 'Common_ProductLineGroup';
    protected $fillable = ['productLineGroupID', 'displayName', 'displaySequence', 'parentProductLineGroupID', 'description'];


    public function productLineGroup() {
        return $this->belongsTo(\App\Models\CommonProductLineGroup::class, 'parentProductLineGroupID', 'productLineGroupID');
    }

    public function translation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    public function productGroups() {
        return $this->hasMany(\App\Models\CommonProductGroupValue::class, 'productLineGroupID', 'productLineGroupID');
    }

    public function productLines() {
        return $this->hasMany(\App\Models\CommonProductLine::class, 'productLineGroupID', 'productLineGroupID');
    }

    public function productLineGroups() {
        return $this->hasMany(\App\Models\CommonProductLineGroup::class, 'parentProductLineGroupID', 'productLineGroupID');
    }


}

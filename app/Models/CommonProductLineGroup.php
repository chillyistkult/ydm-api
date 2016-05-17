<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductLineGroup extends Model {

    /**
     * Generated
     */

    protected $table = 'Common_ProductLineGroup';
    protected $fillable = ['productLineGroupID', 'displayName', 'displaySequence', 'parentProductLineGroupID', 'description'];


    public function commonProductLineGroup() {
        return $this->belongsTo(\App\Models\CommonProductLineGroup::class, 'parentProductLineGroupID', 'productLineGroupID');
    }

    public function commonTranslateWordId() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    public function commonProductGroupValues() {
        return $this->hasMany(\App\Models\CommonProductGroupValue::class, 'productLineGroupID', 'productLineGroupID');
    }

    public function commonProductLines() {
        return $this->hasMany(\App\Models\CommonProductLine::class, 'productLineGroupID', 'productLineGroupID');
    }

    public function commonProductLineGroups() {
        return $this->hasMany(\App\Models\CommonProductLineGroup::class, 'parentProductLineGroupID', 'productLineGroupID');
    }


}

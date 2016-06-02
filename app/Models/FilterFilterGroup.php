<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterFilterGroup extends Model {

    /**
     * Generated
     */

    protected $table = 'Filter_FilterGroup';
    protected $fillable = ['filterGroupID', 'shortName', 'displayName', 'infoTooltip', 'helpTooltip', 'initiallyCollapsed', 'displaySequence'];


    public function translation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'displayName', 'wordID');
    }

    public function helpTranslation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'helpTooltip', 'wordID');
    }

    public function tooltipTranslation() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'infoTooltip', 'wordID');
    }

    public function filterFilters() {
        return $this->hasMany(\App\Models\FilterFilter::class, 'filterGroupID', 'filterGroupID');
    }


}

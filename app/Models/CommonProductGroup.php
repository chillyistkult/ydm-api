<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductGroup extends Model {

    /**
     * Generated
     */

    protected $table = 'Common_ProductGroup';
    protected $fillable = ['productGroupID', 'description'];


    public function commonProductGroupValues() {
        return $this->hasMany(\App\Models\CommonProductGroupValue::class, 'productGroupID', 'productGroupID');
    }

    public function filterFilters() {
        return $this->hasMany(\App\Models\FilterFilter::class, 'productGroupID', 'productGroupID');
    }


}

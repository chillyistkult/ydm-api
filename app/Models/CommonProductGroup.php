<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductGroup extends Model {

    /**
     * Generated
     */
    protected $primaryKey = 'productGroupID';

    protected $table = 'Common_ProductGroup';
    protected $fillable = ['productGroupID', 'description'];


    public function productGroupValues() {
        return $this->hasMany(\App\Models\CommonProductGroupValue::class, 'productGroupID', 'productGroupID');
    }

    public function filters() {
        return $this->hasMany(\App\Models\FilterFilter::class, 'productGroupID', 'productGroupID');
    }


}

<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class I18NCountryGroupType extends Model {

    /**
     * Generated
     */

    protected $table = 'I18N_CountryGroupType';
    protected $fillable = ['countryGroupTypeID', 'description'];


    public function i18NCountryGroups() {
        return $this->hasMany(\App\Models\I18NCountryGroup::class, 'countryGroupTypeID', 'countryGroupTypeID');
    }


}

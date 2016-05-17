<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class I18NCountryGroupCountryRelation extends Model {

    /**
     * Generated
     */

    protected $table = 'I18N_CountryGroupCountryRelation';
    protected $fillable = ['countryGroupID', 'countryID'];


    public function i18NCountry() {
        return $this->belongsTo(\App\Models\I18NCountry::class, 'countryID', 'countryID');
    }

    public function i18NCountryGroup() {
        return $this->belongsTo(\App\Models\I18NCountryGroup::class, 'countryGroupID', 'countryGroupID');
    }


}

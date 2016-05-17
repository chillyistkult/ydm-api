<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class I18NCountryGroup extends Model {

    /**
     * Generated
     */

    protected $table = 'I18N_CountryGroup';
    protected $fillable = ['countryGroupID', 'shortName', 'countryGroupTypeID', 'description', 'displaySequence'];


    public function i18NCountryGroupType() {
        return $this->belongsTo(\App\Models\I18NCountryGroupType::class, 'countryGroupTypeID', 'countryGroupTypeID');
    }

    public function i18NCountries() {
        return $this->belongsToMany(\App\Models\I18NCountry::class, 'I18N_CountryGroupCountryRelation', 'countryGroupID', 'countryID');
    }

    public function i18NCountryGroupCountryRelations() {
        return $this->hasMany(\App\Models\I18NCountryGroupCountryRelation::class, 'countryGroupID', 'countryGroupID');
    }


}

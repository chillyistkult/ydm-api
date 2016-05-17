<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class I18NCountry extends Model {

    /**
     * Generated
     */

    protected $table = 'I18N_Country';
    protected $fillable = ['countryID', 'displayName', 'countryCode', 'displaySequence'];


    public function i18NCountryGroups() {
        return $this->belongsToMany(\App\Models\I18NCountryGroup::class, 'I18N_CountryGroupCountryRelation', 'countryID', 'countryGroupID');
    }

    public function i18NCountryGroupCountryRelations() {
        return $this->hasMany(\App\Models\I18NCountryGroupCountryRelation::class, 'countryID', 'countryID');
    }


}

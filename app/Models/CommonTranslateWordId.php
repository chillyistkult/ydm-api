<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonTranslateWordId extends Model {

    /**
     * Generated
     */

    protected $table = 'Common_TranslateWordId';
    protected $fillable = ['wordID', 'description'];

    public $timestamps = false;

    public function i18NLanguages() {
        return $this->belongsToMany(\App\Models\I18NLanguage::class, 'Common_TranslateWord', 'wordID', 'langID');
    }

    public function characteristicCharacteristicGroups() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicGroup::class, 'helpTooltipDisplayName', 'wordID');
    }

    /*
    public function characteristicCharacteristicGroups() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicGroup::class, 'infoTooltipDisplayName', 'wordID');
    }
    */

    public function characteristicCharacteristicRemarks() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicRemark::class, 'remark', 'wordID');
    }

    public function commonProductFamilies() {
        return $this->hasMany(\App\Models\CommonProductFamily::class, 'displayName', 'wordID');
    }

    public function commonProductLines() {
        return $this->hasMany(\App\Models\CommonProductLine::class, 'displayName', 'wordID');
    }

    /*
    public function commonProductLines() {
        return $this->hasMany(\App\Models\CommonProductLine::class, 'selectionResultPrefix', 'wordID');
    }
    */

    public function productLineGroups() {
        return $this->hasMany(\App\Models\CommonProductLineGroup::class, 'displayName', 'wordID');
    }

    public function languages() {
        return $this->hasMany(\App\Models\CommonTranslateWord::class, 'wordID', 'wordID');
    }

    public function en() {
        return $this->languages()->where('langID', 1);
    }

    public function filterFilters() {
        return $this->hasMany(\App\Models\FilterFilter::class, 'displayName', 'wordID');
    }

    public function filterFilterGroups() {
        return $this->hasMany(\App\Models\FilterFilterGroup::class, 'displayName', 'wordID');
    }

    /*
    public function filterFilterGroups() {
        return $this->hasMany(\App\Models\FilterFilterGroup::class, 'helpTooltip', 'wordID');
    }

    public function filterFilterGroups() {
        return $this->hasMany(\App\Models\FilterFilterGroup::class, 'infoTooltip', 'wordID');
    }
    */

    public function filterProperties() {
        return $this->hasMany(\App\Models\FilterProperty::class, 'displayName', 'wordID');
    }


}

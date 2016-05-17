<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class I18NLanguage extends Model {

    /**
     * Generated
     */

    protected $table = 'I18N_Language';
    protected $fillable = ['langID', 'nameInSourceLanguage', 'displayName', 'localeID', 'durepID', 'displaySequence', 'exportLanguageID'];


    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'displayName', 'wordID');
    }

    public function commonTranslateWordIds() {
        return $this->belongsToMany(\App\Models\CommonTranslateWordId::class, 'Common_TranslateWord', 'langID', 'wordID');
    }

    public function commonTranslateWords() {
        return $this->hasMany(\App\Models\CommonTranslateWord::class, 'langID', 'langID');
    }


}

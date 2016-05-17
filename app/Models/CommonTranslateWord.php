<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonTranslateWord extends Model {

    /**
     * Generated
     */

    protected $table = 'Common_TranslateWord';
    protected $fillable = ['langID', 'wordID', 'word'];


    public function i18NLanguage() {
        return $this->belongsTo(\App\Models\I18NLanguage::class, 'langID', 'langID');
    }

    public function commonTranslateWordId() {
        return $this->belongsTo(\App\Models\CommonTranslateWordId::class, 'wordID', 'wordID');
    }


}

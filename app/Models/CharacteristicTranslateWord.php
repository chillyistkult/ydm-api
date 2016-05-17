<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicTranslateWord extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_TranslateWord';
    protected $fillable = ['wordID', 'langID', 'word'];


    public function characteristicTranslateWordId() {
        return $this->belongsTo(\App\Models\CharacteristicTranslateWordId::class, 'wordID', 'wordID');
    }


}

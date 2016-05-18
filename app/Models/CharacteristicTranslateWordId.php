<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicTranslateWordId extends Model {

    /**
     * Generated
     */

    protected $table = 'Characteristic_TranslateWordId';
    protected $fillable = ['wordID', 'description'];


    public function characteristicCharacteristics() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristic::class, 'displayName', 'wordID');
    }

    /*
    public function characteristicCharacteristics() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristic::class, 'modifiedDisplayName', 'wordID');
    }
    */

    public function characteristicCharacteristicGroups() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicGroup::class, 'displayName', 'wordID');
    }

    public function characteristicCharacteristicValues() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicValue::class, 'displayName', 'wordID');
    }

    /*
    public function characteristicCharacteristicValues() {
        return $this->hasMany(\App\Models\CharacteristicCharacteristicValue::class, 'modifiedDisplayName', 'wordID');
    }
    */

    public function characteristicCustomCharacteristics() {
        return $this->hasMany(\App\Models\CharacteristicCustomCharacteristic::class, 'displayName', 'wordID');
    }

    public function characteristicCustomCharacteristicValues() {
        return $this->hasMany(\App\Models\CharacteristicCustomCharacteristicValue::class, 'displayName', 'wordID');
    }

    public function characteristicModels() {
        return $this->hasMany(\App\Models\CharacteristicModel::class, 'informationText', 'wordID');
    }

    public function characteristicModelCharacteristicValues() {
        return $this->hasMany(\App\Models\CharacteristicModelCharacteristicValue::class, 'longText', 'wordID');
    }

    public function characteristicModelComponents() {
        return $this->hasMany(\App\Models\CharacteristicModelComponent::class, 'displayName', 'wordID');
    }

    public function characteristicModelComponentValues() {
        return $this->hasMany(\App\Models\CharacteristicModelComponentValue::class, 'displayName', 'wordID');
    }

    public function characteristicTranslateWords() {
        return $this->hasMany(\App\Models\CharacteristicTranslateWord::class, 'wordID', 'wordID');
    }

    public function i18NLanguages() {
        return $this->hasMany(\App\Models\I18NLanguage::class, 'displayName', 'wordID');
    }


}

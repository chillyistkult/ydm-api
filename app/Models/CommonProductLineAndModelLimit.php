<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonProductLineAndModelLimit extends Model {

    /**
     * Generated
     */

    protected $primaryKey = 'plmID';
    protected $table = 'Common_ProductLineAndModelLimit';
    protected $fillable = ['plmID', 'productLineID', 'shortName', 'minTemperature', 'maxTemperature', 'limitTemperature', 'minStandardTemperature', 'maxStandardTemperature', 'maxHtTemperature', 'temperatureUnit', 'maxPressure', 'pressureUnit', 'limitSwitchAllowed', 'controllerAllowed', 'calcSpecialModelHighPressureAllowed'];


    public function commonProductLine() {
        return $this->belongsTo(\App\Models\CommonProductLine::class, 'productLineID', 'productLineID');
    }


}

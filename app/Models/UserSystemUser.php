<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSystemUser extends Model {

    /**
     * Generated
     */

    protected $table = 'User_SystemUser';
    protected $fillable = ['systemUserID', 'username', 'password', 'active'];



}

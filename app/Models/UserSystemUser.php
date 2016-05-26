<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSystemUser extends Model {

    /**
     * Generated
     */

    protected $table = 'User_SystemUser';
    protected $fillable = ['systemUserID', 'username', 'password', 'active'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



}

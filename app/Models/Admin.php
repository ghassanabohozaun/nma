<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'mobile',
        'gender',
        'status',
        'last_login_at',
        'last_login_ip',
        'remember_token'
    ];
    protected $hidden = ['created_at', 'updated_at', 'remember_token'];
    //////////////////////////////////// Relations ///////////////////////
    /// Post
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'admin_id', 'id');
    }

    //////////////////////////////////// accessors ///////////////////////
    /// Gender accessors
    public function getGenderAttribute($value)
    {
        if ($value == 'male') {
            return trans('general.male');
        } elseif ($value == 'female') {
            return trans('general.female');
        }
    }
}

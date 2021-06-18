<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class UserDataModel extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = 'user_data';
    protected $fillable = [
        'nis',
        'password'
    ];

    public $timestamps = false;

}

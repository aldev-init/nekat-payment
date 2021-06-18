<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

class AdminData extends Authenticable
{
    protected $table = 'admin_data';
    protected $fillable = [
        'nipd',
        'password'
    ];
    public $timestamps = false;
    use HasFactory,Notifiable;
}

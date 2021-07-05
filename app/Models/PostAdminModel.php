<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAdminModel extends Model
{
    protected $table = 'post_admin';
    public $timestamps = false;
    use HasFactory;
}

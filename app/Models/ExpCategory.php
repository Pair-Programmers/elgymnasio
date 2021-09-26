<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
    	'name',
    	'user_id',
        'created_at',
        'updated_at',
    ];
}

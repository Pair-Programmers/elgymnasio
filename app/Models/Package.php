<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
    	'name',
    	'price',
    	'no_of_months',
    	'services',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'services' => 'array'
    ];

    public function members(){
        return $this->hasMany(Member::class, 'package_id');
    }
}

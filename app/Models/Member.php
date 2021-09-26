<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
    	'name',
    	'date_of_birth',
    	'image_path',
    	'phone',
    	'gender',
    	'email',
    	'adress',
    	'package_id',
		'package_expire_at',
    	'payee_id',
    	'timing',
		'is_active',
    	'cnic',
    	'date',
    	'password',
    	'admission_fee',
    	'hire_trainer',
    	'trainer_fee',
    	'discount',
		'user_id',
        'created_at',
        'updated_at',
    ];

	public function package(){
        return $this->hasOne(Package::class, 'id','package_id');
    }

	
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
    	'amount',
    	'date',
    	'group',
    	'type',
    	'payee_id',
    	'member_id',
    	'account_id',
		'note'
    ];

	public function member(){
        return $this->hasOne(Member::class, 'id','member_id');
    }

	public function payee(){
        return $this->hasOne(Payee::class, 'id','payee_id');
    }
}

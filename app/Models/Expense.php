<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
    	'payee_id',
    	'account_id',
    	'amount',
    	'date',
    	'exp_category_id',
    	'exp_subcategory_id',
    	'note',
        'created_at',
        'updated_at',
    ];
}

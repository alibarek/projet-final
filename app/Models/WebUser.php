<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class WebUser extends Model
{
    use HasFactory;
	protected $fillable = [
        'fname',
		'lname',
        'email',
		'password',
        'DOB',
        'telephone',
		'gender',
		'address',
		'blood',
		'symptomes',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'salary',
        /*'company_id',
        'role_id',
        'user_id',
        'created_at'*/
    ];
}

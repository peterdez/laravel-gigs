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
        'company_id',
        'role_id',
        /*'user_id',
        'created_at'*/
    ];

    /**
     * Get the company that owns the gig.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the role that owns the gig.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getCreatedAtFormattedAttribute()
    {
    return $this->created_at->format('jS, F Y');
    }
}

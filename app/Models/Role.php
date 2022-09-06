<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Get the gigs for the role.
     */
    public function gigs()
    {
        return $this->hasMany(Gig::class);
    }
}

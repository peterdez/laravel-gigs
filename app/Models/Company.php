<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * Get the gigs for the company.
     */
    public function gigs()
    {
        return $this->hasMany(Gig::class);
    }
}

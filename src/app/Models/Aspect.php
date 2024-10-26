<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aspect extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function indicator(): HasMany
    {
        return $this->hasMany(Indicator::class, 'indicator_id');
    }

}
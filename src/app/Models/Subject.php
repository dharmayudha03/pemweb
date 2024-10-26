<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function indicator(): HasMany
    {
        return $this->hasMany(Indicator::class, 'indicator_id');
    }
    public function analyze(): HasMany
    {
        return $this->hasMany(Analyze::class, 'analyze_id');
    }
}
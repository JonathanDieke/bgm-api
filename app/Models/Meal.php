<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meal extends Model
{
    use HasFactory, HasUUID;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the dailyData that owns the Meal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dailyData(): BelongsTo
    {
        return $this->belongsTo(DailyData::class);
    }
}

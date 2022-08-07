<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sport extends Model
{
    use HasFactory, HasUUID;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the dailyData that owns the Sport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dailyData(): BelongsTo
    {
        return $this->belongsTo(DailyData::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailyData extends Model
{
    use HasFactory, HasUUID;

    public $table = "daily_datas";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    /**
    * Get the user that owns the Meal
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo{
       return $this->belongsTo(User::class);
   }

    /**
     * Get all of the meals for the DailyData
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function meals(): HasMany{
        return $this->hasMany(Meal::class);
    }

    /**
     * Get all of the sports for the DailyData
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sports(): HasMany
    {
        return $this->hasMany(Sport::class);
    }

    /**
     * Get all of the sleepings for the DailyData
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sleepings(): HasMany
    {
        return $this->hasMany(Sleeping::class);
    }

}

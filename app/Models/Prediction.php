<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'location',
        'date',
        'time',
        'predicted_occupancy',
        'percentage_occupancy',
        'remaining_spaces',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i:s', // Format time as hours:minutes:seconds
    ];

    /**
     * Get the user that owns the prediction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

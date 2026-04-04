<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SafeMovement extends Model
{
    protected $table = 'safe_movements';
    protected $fillable = [
        'amount', 'type', 'source_safe_id', 'destination_safe_id',
        'reservation_id', 'created_by', 'notes'
    ];

    public function sourceSafe()
    {
        return $this->belongsTo(Safe::class, 'source_safe_id');
    }

    public function destinationSafe()
    {
        return $this->belongsTo(Safe::class, 'destination_safe_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reservation()
    {
        return $this->belongsTo(reservation::class, 'reservation_id');
    }
}

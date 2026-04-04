<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Safe extends Model
{
    protected $table = 'safes';
    protected $fillable = ['name', 'type', 'balance', 'branch_id', 'user_id'];

    public function movements()
    {
        return $this->hasMany(SafeMovement::class, 'source_safe_id')
            ->orWhere('destination_safe_id', $this->id);
    }

    public function incomingMovements()
    {
        return $this->hasMany(SafeMovement::class, 'destination_safe_id');
    }

    public function outgoingMovements()
    {
        return $this->hasMany(SafeMovement::class, 'source_safe_id');
    }
}

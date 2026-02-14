<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class adahyt extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
      protected $table="adahyt";
    protected $fillable = [
        'id',
        'code',
        'adahy',
        'sak',
        'days',
         'times',
      'sak_c',
      'kilo',
      'kilo_s',
      'vendor',
      'reservation',
      'free',
      'cases',
        'created_at',
        'updated_at',
        'agent',
        '_token',
        'is_available',
        'gov'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
  
}
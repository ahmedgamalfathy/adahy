<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class reservation extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
      protected $table="reservation";
    protected $fillable = [
        'id',
        'resnum',
        'c_persons',
        'c_sak',
        'ad_id',
        'code',
        'description',
        'gov_type',
        'adahy',
        'saks',
        'days',
        'times',
        'name',
        'mobile',
        'whats',
      'mobile2',
      'whats2',
      'mobile3',
        'city',
      'zone',
      'address',
      'sak',
      'pay',
      'price',
      'loan',
       'note',
       'rec',
       'def',
       'emp',
       'co_z',
       'history',
       'type',
       'retype',
       'calltype',
       'resptype',
       'rectype',
           'qty',
       'treasury_id',
        'created_at',
        'updated_at',
        'agent',
        'view',
        'number'
        
      
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
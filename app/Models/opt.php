<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class opt extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
      protected $table="opt";
    protected $fillable = [
        'id',
        'code',
        'adahy',
        'sak',
        'gov',
        'days',
      'w_vendor',
      'w_weight',
      'w_note',
      'w_date',
      'w_agent',
      'wb_entry_date',
      'wb_exit_date',
      'wb_deff_date',
      'wb_note1',
      'wb_note',
      'wb_agent',
      
      'b_room',
      'b_follower',
      'b_butcher',
      'b_entry_date',
      'b_case',
      'b_weight',
      'b_aduit',
      'b_note',
      'b_exit_date',
      'b_deff_date',
      'b_date',
      'b_agent',
      
      'fb_entry_date',
      'fb_exit_date',
      'fb_deff_date',
      'fb_note1',
      'fb_note',
      'fb_agent',
      
      's_room',
      's_follower',
      's_entry_date',
      's_weight',
      's_weight2',
      's_note',
      's_exit_date',
      's_deff_date',
      's_date',
      's_agent',
      
      'd_room',
      'd_follower',
      'd_teacher',
      'd_entry_date',
      'd_aduit',
      'd_note',
      'd_exit_date',
      'd_deff_date',
      'd_date',
      'd_agent',
      'f_room',
      'f_follower',
      'f_entry_date',
      'f_weight',
      'f_weight2',
      'f_note',
      'f_exit_date',
      'f_deff_date',
      'f_case',
      'f_date',
      'f_agent',
      'r_room',
      'r_follower',
      'r_entry_date',
      'r_note',
      'r_acc',
      'r_exit_date',
      'r_deff_date',
      'r_type',
      
      'r_date',
      'r_agent',
 'deff_date',
        'created_at',
        'updated_at',
        'type'
        
      
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
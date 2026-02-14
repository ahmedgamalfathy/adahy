<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tr_butcher2 extends Model
{
  use HasFactory;
  protected $table="tr_butcher2";
  protected $fillable = ['treasury_id' , 'type_from' , 'type' , 'amount' , 'total' , 'reason' , 'reason_t' , 'nots' , 'trans_bill' , 'updated_at' , 'created_at' , 'agent'];
}
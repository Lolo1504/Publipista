<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
   const CREATED_AT = null;
const UPDATED_AT = null;
   protected $table='alquiler';
   protected $fillable = [
      'dia',
      'H',
      'IdUser',
      'IdPista',
  ];
}

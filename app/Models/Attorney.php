<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attorney extends Model
{
    protected $table = 'attorneys';


    protected $fillable = [
       'name', 'email', 'phone', 'address', 'status'
   ];

   public function cases()
   {
       return $this->hasMany(ClientCase::class, 'attorney_id');
   }
}

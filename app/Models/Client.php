<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';


     protected $fillable = [
        'name', 'email', 'phone', 'address', 'company_name', 'gst_number', 'status'
    ];

    public function cases()
    {
        return $this->hasMany(ClientCase::class, 'client_id');
    }

}

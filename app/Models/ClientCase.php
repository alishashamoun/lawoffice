<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientCase extends Model
{
    protected $table = 'client_cases';

    protected $fillable = ['client_id', 'attorney_id', 'court_date', 'case_details'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id')->select('id', 'name', 'email');
    }

    public function attorney()
    {
        return $this->belongsTo(Attorney::class, 'attorney_id')->select('id', 'name', 'email');
    }

}

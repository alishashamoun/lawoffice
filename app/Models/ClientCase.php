<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ClientCase extends Model
{
    protected $table = 'client_cases';

    protected $fillable = ['client_id', 'attorney_id', 'court_date', 'case_details', 'start_time', 'end_time'];

    public function getFormattedStartTimeAttribute()
    {
        return Carbon::parse($this->start_time)->format('h:i A');
    }

    public function getFormattedEndTimeAttribute()
    {
        return Carbon::parse($this->end_time)->format('h:i A');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id')->select('id', 'name', 'email');
    }

    public function attorney()
    {
        return $this->belongsTo(Attorney::class, 'attorney_id')->select('id', 'name', 'email');
    }

}

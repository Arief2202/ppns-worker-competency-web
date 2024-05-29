<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTimes extends Model
{
    use HasFactory;
    
    public function schedule()
    {
        return Schedule::where('id', $this->schedule_id)->get();
    }
}

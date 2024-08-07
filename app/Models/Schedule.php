<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    
    public function schedule_workers()
    {
        return ScheduleWorkers::where('schedule_id', $this->id)->get();
    }
    public function times()
    {
        return ScheduleTimes::where('schedule_id', $this->id)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleWorkers extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id',
    ];
    
    public function schedule()
    {
        return Schedule::where('id', $this->schedule_id)->first();
    }
    public function worker()
    {
        return Worker::where('id', $this->worker_id)->first();
    }
    public function competency()
    {
        return Competency::where('id', $this->competency_id)->first();
    }
    public function times()
    {
        return ScheduleTimes::where('schedule_id', $this->schedule_id)->get();
    }
}

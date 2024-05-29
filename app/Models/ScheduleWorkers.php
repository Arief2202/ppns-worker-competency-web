<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleWorkers extends Model
{
    use HasFactory;
    
    public function schedule()
    {
        return Schedule::where('id', $this->schedule_id)->get();
    }
    public function worker()
    {
        return Worker::where('id', $this->worker_id)->get();
    }
    public function competency()
    {
        return Competency::where('id', $this->competency_id)->get();
    }
}

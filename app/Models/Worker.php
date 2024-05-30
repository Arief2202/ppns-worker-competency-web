<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    
    public function WorkerCompetency()
    {
        return WorkerCompetency::where('worker_id', $this->id)->get();
    }

    public function jobs()
    {
        return ScheduleWorkers::where('worker_id', $this->id)->get();
    }
}

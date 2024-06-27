<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class WorkerCompetency extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    public function worker()
    {
        return Worker::where('id', $this->worker_id)->first();
    }
    public function competency()
    {
        return Competency::where('id', $this->competency_id)->first();
    }
    public function dayLeft(){                        
        $now = new DateTime(date('Y-m-d'));
        $dataTime = new DateTime($this->expiration_date);                
        $abs_diff = $now->diff($dataTime)->format("%r%a");
        return $abs_diff;
    }
}

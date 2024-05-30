<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleTimesRequest;
use App\Http\Requests\UpdateScheduleTimesRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleWorkers;
use App\Models\ScheduleTimes;

class ScheduleTimesController extends Controller
{

    public function createView($id)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        return view('schedule.time.create', [
            'id' => $id
        ]);
    }
    public function create(Request $request)
    { 
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        $validated = $request->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $status = ScheduleTimes::insert([
            'schedule_id' => $request->schedule_id,
            'date' => $request->date,
            'start_time' => $request->date." ".$request->start_time.":00",
            'end_time' => $request->date." ".$request->end_time.":00",
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('schedule.detail', ['id' => $request->schedule_id]));
    }
    
    public function updateView($id)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        $schedule = ScheduleTimes::where('id', '=', $id)->first();
        if($schedule){
            return view('schedule.time.update', [
                'scheduleTime' => $schedule,
            ]);
        }
        else return redirect(route('schedule.manage'));
    }
    public function update(Request $request)
    { 
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        $scheduleTime = ScheduleTimes::where('id', '=', $request->id)->first();
        $validated = $request->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $scheduleTime->date = $request->date;
        $scheduleTime->start_time = $request->date." ".$request->start_time.":00";
        $scheduleTime->end_time = $request->date." ".$request->end_time.":00";
        $scheduleTime->updated_at = date('Y-m-d H:i:s');
        $scheduleTime->save();
        return redirect(route('schedule.detail', ['id'=>$scheduleTime->schedule_id]));
    }

    public function delete($id)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };

        $scheduleTime = ScheduleTimes::where('id', '=', $id)->first();
        $id_schedule = $scheduleTime->schedule_id;
        $scheduleTime->delete();

        return redirect(route('schedule.detail', ['id' => $id_schedule]));
    }
}

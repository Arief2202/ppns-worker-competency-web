<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\ScheduleWorkers;
use App\Models\ScheduleTimes;
use DateTime;

class ScheduleController extends Controller
{
    
    public function createView()
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        return view('schedule.create');
    }
    public function create(Request $request)
    { 
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        
        $validated = $request->validate([
            'working_activity' => 'required',
            'supervisor' => 'required',
            'location' => 'required',
        ]);
        $status = Schedule::insert([
            'working_activity' => $request->working_activity,
            'supervisor' => $request->supervisor,
            'location' => $request->location,
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('schedule.manage'));
    }
    
    public function read(Request $request)
    {
        if(!$request->month) return redirect(route('schedule')."?month=".date('Y-m'));
        $selectedDate = new DateTime($request->month);
        $dayCount = $selectedDate->format('t');
        $count = [[]];
        for($a=0;$a<=$dayCount;$a++){
            for($b=0;$b<9;$b++){
                $dateTime = $request->month.($a+1<10?'-0':'-').($a+1)." ".($b+8<10?"0":"").($b+8).":00:00";
                $ScheduleDate = ScheduleTimes::where('date', date('Y-m-d 00:00:00', strtoTime($dateTime)))->get();
                $ScheduleByTimeStart = $ScheduleDate->where('start_time', '<=', $dateTime);
                $ScheduleByTimeEnd = $ScheduleByTimeStart->where('end_time', '>=', "$dateTime");

                $count[$a][$b] = $ScheduleByTimeEnd->count();
            }
        }
        return view('schedule.read', [
            'schedules' => Schedule::all(),
            'dayCount' => $dayCount,
            'request' => $request,
            'count' => $count,
        ]);
    }

    public function manage()
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        return view('schedule.manage',[
            'schedules' => Schedule::all(),
        ]);
    }

    public function detailTime(Request $request)
    {
        $ScheduleDate = ScheduleTimes::where('date', date('Y-m-d 00:00:00', strtoTime($request->dateTime)))->get();
        $ScheduleByTimeStart = $ScheduleDate->where('start_time', '<=', $request->dateTime);
        $ScheduleByTimeEnd = $ScheduleByTimeStart->where('end_time', '>=', $request->dateTime);
        return view('schedule.detailTime',[
            'scheduleTimes' => $ScheduleByTimeEnd,
        ]);
    }

    
    public function updateView($id)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        $schedule = Schedule::where('id', '=', $id)->first();
        if($schedule){
            return view('schedule.update', [
                'schedule' => $schedule,
            ]);
        }
        else return redirect(route('schedule.manage'));
    }
    public function update(Request $request)
    { 
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        $schedule = Schedule::where('id', '=', $request->id)->first();

        $validated = $request->validate([
            'working_activity' => 'required',
            'supervisor' => 'required',
            'location' => 'required',
        ]);
        $schedule->working_activity = $request->working_activity;
        $schedule->supervisor = $request->supervisor;
        $schedule->location = $request->location;
        $schedule->updated_at = date('Y-m-d H:i:s');
        $schedule->save();
        return redirect(route('schedule.detail', ['id'=>$schedule->id]));
    }

    public function delete($id)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };

        $schedule = Schedule::where('id', '=', $id)->first();
        foreach(ScheduleTimes::where('schedule_id', '=', $schedule->id)->get() as $item) $item->delete();
        foreach(ScheduleWorkers::where('schedule_id', '=', $schedule->id)->get() as $item) $item->delete();
        $schedule->delete();

        return redirect(route('schedule.manage'));
    }
    
    public function detail($id, Request $request)
    {
        $schedule = Schedule::where('id', '=', $id)->first();
        if($schedule){
            return view('schedule.detail', [
                'schedule' => $schedule,
            ]);
        }
        else return redirect('worker');
    }

}
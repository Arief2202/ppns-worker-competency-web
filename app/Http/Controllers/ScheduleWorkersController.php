<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateScheduleWorkersRequest;
use App\Http\Requests\StoreScheduleWorkersRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\WorkerCompetency;
use App\Models\ScheduleWorkers;
use App\Models\ScheduleTimes;
use App\Models\Competency;
use App\Models\Schedule;
use App\Models\Worker;

class ScheduleWorkersController extends Controller
{
    
    public function createView($schedule_id)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        $competencies = Competency::all();
        $workers = Worker::all();
        return view('schedule.worker.create', [
            'competencies' => $competencies,
            'workers' => $workers,
            'schedule_id' => $schedule_id
        ]);
    }
    
    public function create(Request $request)
    { 
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        $validated = $request->validate([
            'schedule_id' => 'required',
            'competency_id' => 'required',
            'competency' => 'required',
            'worker_id' => 'required',
            'worker' => 'required',
        ]);
        
        $status = ScheduleWorkers::insert([
            'schedule_id' => $request->schedule_id,
            'competency_id' => $request->competency_id,
            'worker_id' => $request->worker_id,
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
        $schWorker = ScheduleWorkers::where('id', '=', $id)->first();
        if($schWorker){
            $competencies = Competency::all();
            return view('schedule.worker.update', [
                'competencies' => $competencies,
                'scheduleWorker' => $schWorker,
                'schedule_id' => $schWorker->schedule_id
            ]);
        }
        else return redirect(route('schedule.manage'));
    }
    public function update(Request $request)
    { 
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };        
        $validated = $request->validate([
            'id' => 'required',
            'schedule_id' => 'required',
            'competency_id' => 'required',
            'competency' => 'required',
            'worker_id' => 'required',
            'worker' => 'required',
        ]);
        $scheduleWorkers = ScheduleWorkers::where('id', '=', $request->id)->first();
        $scheduleWorkers->schedule_id = $request->schedule_id;
        $scheduleWorkers->competency_id = $request->competency_id;
        $scheduleWorkers->worker_id = $request->worker_id;
        $scheduleWorkers->updated_at = date('Y-m-d H:i:s');
        $scheduleWorkers->save();
        return redirect(route('schedule.detail', ['id'=>$scheduleWorkers->schedule_id]));
    }

    public function delete($id)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };

        $ScheduleWorkers = ScheduleWorkers::where('id', '=', $id)->first();
        $id_schedule = $ScheduleWorkers->schedule_id;
        $ScheduleWorkers->delete();

        return redirect(route('schedule.detail', ['id' => $id_schedule]));
    }

    
    
    public function filter(Request $request)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        if($request->competency_id){
            $WorkerCompetency = WorkerCompetency::where('competency_id', '=', $request->competency_id)->get();
            
            $workers = [];
            foreach($WorkerCompetency as $workc){
                $workers[] =  $workc->worker();
            }
            $workers = collect($workers);

            // $workerJobs = [];
            // $workerData = [];
            // $workerJobs = [];
            // foreach($workers as $key=>$worker){
            //     $workerData = (object) $worker;
            //     foreach($worker->jobs() as $key2=>$job){
            //         $workerJobs[$key2] = (object) $job->times();
            //     }
            //     $workerJobs[$key] = collect([
            //         'worker' => $workerData,
            //         'jobs' => $workerJobs
            //     ]);
            // }
            // $workerJobs = collect($workerJobs);
            
            if($request->schedule_id){
                $schedule = Schedule::where('id', '=', $request->schedule_id)->first();
                // foreach($schedule->times() as $tim){
                //     foreach($workerJobs->where('jobs', '!=', null) as $wjob){
                //         foreach(collect($wjob['jobs']) as $wjob2){

                //                 dd($tim, $wjob2->where('date', '!=', $tim->date));
                //         }

                //     }
                // }
                // foreach($schedule->schedule_workers() as $scwork){
                //     $WorkerCompetency = $WorkerCompetency->where('worker_id', '!=', $scwork->worker()->id);
                // }
                // dd($WorkerCompetency);
                foreach($WorkerCompetency as $workc){
                    foreach($schedule->times() as $nowTimes){
                        foreach($workc->worker()->jobs() as $jobs){
                            // dd($workers, $nowTimes, $jobs->times());
                        }
                    }

                }
            }
            return response()->json(
                [
                    'success' => true,
                    'count' => $workers->count(),
                    'data' => $workers,
                ],
                200
            )->header('Content-Type', 'application/json');
        }
        return response()->json(
            [
                'success' => false,
                'message' => 'required competency_id',
            ],
            200
        )->header('Content-Type', 'application/json');
        

    }

}

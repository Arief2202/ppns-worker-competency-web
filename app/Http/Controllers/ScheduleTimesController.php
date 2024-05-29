<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleTimesRequest;
use App\Http\Requests\UpdateScheduleTimesRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ScheduleTimes;

class ScheduleTimesController extends Controller
{
    public function createView($worker_id)
    {
        if(Auth::user()->role != 1){
            return redirect('worker');
        };
        $worker = Worker::where('id', '=', $worker_id)->first();
        $competency = [];
        
        foreach(Competency::all() as $c){
            $WorkerCompetency = WorkerCompetency::where('worker_id', '=', $worker->id)->where('competency_id', '=', $c->id)->first();
            if(!$WorkerCompetency) $competency[] = $c;
        }
        $competency = collect($competency);
        
        if($worker){
            return view('worker.competency.create',[
                'worker' => $worker,
                'competencies' => $competency
            ]);
        }
    }
    public function create(Request $request)
    {         
        if(Auth::user()->role != 1){
            return redirect('worker');
        };

        $validated = $request->validate([
            'worker_id' => 'required',
            'competency_id' => 'required',
            'competency' => 'required',
            'certification_institute' => 'required',
            'effective_date' => 'required',
            'expiration_date' => 'required',
            'update_status' => 'required',
        ]);
        $status = WorkerCompetency::insert([
            'worker_id' => $request->worker_id,
            'competency_id' => $request->competency_id,
            'certification_institute' => $request->certification_institute,
            'effective_date' => $request->effective_date,
            'expiration_date' => $request->expiration_date,
            'update_status' => $request->update_status,
            'verification_status' => '0',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('worker.detail', ['id_number' => Worker::where('id', '=', $request->worker_id)->first()->id_number]));
    }
    public function updateView($id)
    {
        if(Auth::user()->role != 1){
            return redirect('worker');
        };
        $workerCompetency = WorkerCompetency::where('id', '=', $id)->first();
        
        $competency = [];
        
        foreach(Competency::all() as $c){
            $WorkerCompetency = WorkerCompetency::where('worker_id', '=', $workerCompetency->worker()->id)->where('competency_id', '=', $c->id)->where('id', '!=', $workerCompetency->id)->first();
            if(!$WorkerCompetency) $competency[] = $c;
        }
        $competency = collect($competency);
        

        if($workerCompetency){
            return view('worker.competency.update',[
                'workerCompetency' => $workerCompetency,
                'competencies' => $competency,
            ]);
        }
        return redirect('worker');

    }
    
    public function update(Request $request)
    {         
        if(Auth::user()->role != 1){
            return redirect('worker');
        };

        $validated = $request->validate([
            'worker_id' => 'required',
            'competency_id' => 'required',
            'competency' => 'required',
            'certification_institute' => 'required',
            'effective_date' => 'required',
            'expiration_date' => 'required',
            'update_status' => 'required',
        ]);
        
        $workerCompetency = WorkerCompetency::where('id', '=', $request->id)->first();
        $workerCompetency->worker_id = $request->worker_id;
        $workerCompetency->competency_id = $request->competency_id;
        $workerCompetency->certification_institute = $request->certification_institute;
        $workerCompetency->effective_date = $request->effective_date;
        $workerCompetency->expiration_date = $request->expiration_date;
        $workerCompetency->update_status = $request->update_status;
        $workerCompetency->verification_status = '0';
        $workerCompetency->updated_at = date('Y-m-d H:i:s');
        $workerCompetency->save();
        return redirect(route('worker.detail', ['id_number' => Worker::where('id', '=', $request->worker_id)->first()->id_number]));
    }
    
    public function delete($id)
    {
        if(Auth::user()->role != 1){
            return redirect('worker');
        };
        $workerCompetency = WorkerCompetency::where('id', '=', $id)->first();
        $worker = $workerCompetency->worker();
        $workerCompetency->delete();
        return redirect(route('worker.detail', ['id_number' => $worker->id_number]));
    }
}

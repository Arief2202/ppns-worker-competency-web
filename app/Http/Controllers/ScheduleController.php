<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Schedule;
use App\Models\ScheduleWorkers;
use App\Models\ScheduleTimes;

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
            'image' => 'required',
            'id_number' => 'required|unique:workers|max:255',
            'name' => 'required',
            'active_status' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'address' => 'required',
            'employee_status' => 'required',
            'departement' => 'required',
            'ssw_status' => 'required',
            'mcu_note' => 'required',
            'supervisor_name' => 'required',
            'starting_date_work' => 'required',
            'end_date_work' => 'required',
        ]);

        $destinationPath = 'upload/image';
        $imageName = $request->id_number.'.'.$request->image->extension();
        $request->image->move(public_path($destinationPath), $imageName);
        $status = Worker::insert([
            'photo' => $imageName,
            'id_number' => $request->id_number,
            'name' => $request->name,
            'active_status' => $request->active_status,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'education' => $request->education,
            'address' => $request->address,
            'employee_status' => $request->employee_status,
            'departement' => $request->departement,
            'ssw_status' => $request->ssw_status,
            'mcu_note' => $request->mcu_note,
            'supervisor_name' => $request->supervisor_name,
            'starting_date_work' => $request->starting_date_work,
            'end_date_work' => $request->end_date_work,
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('schedule');
    }
    
    public function read()
    {
        return view('schedule.read',[
            'schedules' => Schedule::all(),
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

    
    public function updateView($id)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        $worker = Worker::where('id', '=', $id)->first();
        if($worker){
            return view('worker.update', [
                'worker' => $worker,
            ]);
        }
        else return redirect('worker');
    }
    public function update(Request $request)
    { 
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };
        $worker = Worker::where('id', '=', $request->id)->first();

        if($worker->id_number != $request->id_number){            
            $validated = $request->validate([
                'id_number' => 'required|unique:workers|max:255',
                'name' => 'required',
                'active_status' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'education' => 'required',
                'address' => 'required',
                'employee_status' => 'required',
                'departement' => 'required',
                'ssw_status' => 'required',
                'mcu_note' => 'required',
                'supervisor_name' => 'required',
                'starting_date_work' => 'required',
                'end_date_work' => 'required',
            ]);
        }
        else{
            $validated = $request->validate([
                'id_number' => 'required',
                'name' => 'required',
                'active_status' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'education' => 'required',
                'address' => 'required',
                'employee_status' => 'required',
                'departement' => 'required',
                'ssw_status' => 'required',
                'mcu_note' => 'required',
                'supervisor_name' => 'required',
                'starting_date_work' => 'required',
                'end_date_work' => 'required',
            ]);
        }
        $imageName = $worker->photo;
        if($request->image){
            $destinationPath = 'upload/image';
            $imageName = $request->id_number.'.'.$request->image->extension();
            $request->image->move(public_path($destinationPath), $imageName);
        }
        $worker->photo = $imageName;
        $worker->id_number = $request->id_number;
        $worker->name = $request->name;
        $worker->active_status = $request->active_status;
        $worker->gender = $request->gender;
        $worker->phone = $request->phone;
        $worker->education = $request->education;
        $worker->address = $request->address;
        $worker->employee_status = $request->employee_status;
        $worker->departement = $request->departement;
        $worker->ssw_status = $request->ssw_status;
        $worker->mcu_note = $request->mcu_note;
        $worker->supervisor_name = $request->supervisor_name;
        $worker->starting_date_work = $request->starting_date_work;
        $worker->end_date_work = $request->end_date_work;
        $worker->updated_at = date('Y-m-d H:i:s');
        $worker->save();
        return redirect(route('worker.detail', ['id_number'=>$worker->id_number]));
    }

    public function delete($id)
    {
        if(Auth::user()->role != 3){
            return redirect('schedule');
        };

        $worker = Worker::where('id', '=', $id)->first();
        foreach(WorkerCompetency::where('worker_id', '=', $worker->id)->get() as $competency){
            $competency->delete();
        }
        $worker->delete();
        return redirect('worker');
    }
    
    public function detail($id_number, Request $request)
    {
        $worker = Worker::where('id_number', '=', $id_number)->first();
        if($worker){
            return view('worker.detail', [
                'worker' => $worker,
                'competencies' => WorkerCompetency::where('worker_id', '=', $worker->id)->get(),
            ]);
        }
        else return redirect('worker');
    }

}
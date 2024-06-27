<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerCompetencyRequest;
use App\Http\Requests\UpdateWorkerCompetencyRequest;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\WorkerCompetency;
use App\Models\Competency;
use App\Models\Worker;
use App\Models\User;

use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File; 

class WorkerCompetencyController extends Controller
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
            'certificate' => 'required',
        ]);

        $status = WorkerCompetency::create([
            'worker_id' => $request->worker_id,
            'competency_id' => $request->competency_id,
            'certification_institute' => $request->certification_institute,
            'effective_date' => $request->effective_date,
            'expiration_date' => $request->expiration_date,
            'update_status' => $request->update_status,
            'certificate' => '',
            'verification_status' => '0',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $destinationPath = 'upload/certificate';
        $certificateName = $status->id.'.'.$request->certificate->extension();
        $request->certificate->move(public_path($destinationPath), $certificateName);
        $status->certificate = $certificateName;
        $status->save();
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
        if($request->certificate){
            $destinationPath = public_path().'\upload\certificate';
            $certificateName = $destinationPath.'\\'.$workerCompetency->certificate;
            File::delete($certificateName);
            $destinationPath = 'upload/certificate';
            $certificateName = $workerCompetency->id.'.'.$request->certificate->extension();
            $request->certificate->move(public_path($destinationPath), $certificateName);
            $workerCompetency->certificate = $certificateName;
        }
        
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
        
        $destinationPath = public_path().'\upload\certificate';
        $certificateName = $destinationPath.'\\'.$workerCompetency->certificate;
        File::delete($certificateName);

        $workerCompetency->delete();
        return redirect(route('worker.detail', ['id_number' => $worker->id_number]));
    }

    public function verify($verify, $id,  Request $request)
    {
        if(Auth::user()->role != 2){
            return redirect('worker');
        };
        $workerCompetency = WorkerCompetency::where('id', '=', $id)->first();
        if($workerCompetency){
            $worker = $workerCompetency->worker();
            if($verify == 'verify') $workerCompetency->verification_status = '1';
            if($verify == 'unverify') $workerCompetency->verification_status = '0';
            $workerCompetency->save();
            return redirect(route('worker.detail', ['id_number' => $worker->id_number]));
        }
        return redirect('worker');
    }
    
    public function report()
    {
        return view('report', [
            'workerCompetency' => WorkerCompetency::all(),
        ]);
    }
    public function report_export(){
        return Excel::download(new ReportExport, 'Report.xlsx');
    }
}

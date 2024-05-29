<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetencyRequest;
use App\Http\Requests\UpdateCompetencyRequest;
use App\Models\Competency;
use App\Models\WorkerCompetency;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Illuminate\Http\Request;

class CompetencyController extends Controller
{
    public function createView()
    {
        if(Auth::user()->role != 1){
            return redirect('competency');
        };
        return view('competency.create');
    }
    public function create(Request $request)
    {         
        if(Auth::user()->role != 1){
            return redirect('competency');
        };

        $validated = $request->validate([
            'competency_name' => 'required|unique:competencies',
        ]);

        $status = Competency::insert([
            'competency_name' => $request->competency_name,
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('competency'));
    }
    
    public function read()
    {
        return view('competency.read', [
            'competencies' => Competency::all(),
        ]);
    }

    public function updateView($id)
    {
        $competency = Competency::where('id', '=', $id)->first();
        
        if($competency){
            return view('competency.update',[
                'competency' => $competency,
            ]);
        }
        return redirect('competency');

    }
    
    public function update(Request $request)
    {         
        if(Auth::user()->role != 1){
            return redirect('competency');
        };

        $validated = $request->validate([
            'id' => 'required',
            'competency_name' => 'required|unique:competencies',
        ]);
        
        $competency = Competency::where('id', '=', $request->id)->first();
        $competency->competency_name = $request->competency_name;
        $competency->updated_at = date('Y-m-d H:i:s');
        $competency->save();
        return redirect(route('competency'));
    }
    public function delete($id)
    {
        if(Auth::user()->role != 1){
            return redirect('worker');
        };
        $competency = Competency::where('id', '=', $id)->first();
        foreach(WorkerCompetency::where('competency_id', '=', $competency->id)->get() as $comp){
            $comp->delete();
        }
        $competency->delete();
        return redirect(route('competency'));
    }
}

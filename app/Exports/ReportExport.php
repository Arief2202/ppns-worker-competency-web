<?php

namespace App\Exports;

use App\Models\WorkerCompetency;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport implements FromCollection, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return WorkerCompetency::all();
    // }
    
    public function collection()
    {
        $data[0] = ['No', 'Name', 'ID Number', 'Employee Status', 'Competency', 'Expired', 'Dayleft', 'Update Status'];
        $index = 1;
        foreach(WorkerCompetency::all() as $i=>$workc){
            $data[$index++] = [
                $i+1,
                $workc->worker()->name,
                $workc->worker()->id_number,
                $workc->worker()->employee_status,
                $workc->competency()->competency_name,
                $workc->expiration_date,
                $workc->dayLeft(),
                $workc->update_status,
            ];                     
        }
        return collect($data);
    }
}

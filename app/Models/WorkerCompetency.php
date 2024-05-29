<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class WorkerCompetency extends Model
{
    use HasFactory;

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
        // if($abs_diff <= 7){
        //     $users = mysqli_query($conn, "SELECT * FROM users where role = 1");
        //     while($userAdmin = mysqli_fetch_object($users)){
        //         if($abs_diff > 0) mysqli_query($conn, "INSERT INTO `notification` (`id`, `user_id`, `title`, `content`, `displayed`, `timestamp`) VALUES (NULL, '$userAdmin->id', 'APAR Hampir Kadaluarsa', 'APAR hampir kadaluarsa terdeteksi, Nomor Apar : $apar->nomor', '0', current_timestamp());");
        //         else mysqli_query($conn, "INSERT INTO `notification` (`id`, `user_id`, `title`, `content`, `displayed`, `timestamp`) VALUES (NULL, '$userAdmin->id', 'APAR Kadaluarsa', 'APAR kadaluarsa terdeteksi, Nomor Apar : $apar->nomor', '0', current_timestamp());");
        //     }
        // }
    }
}

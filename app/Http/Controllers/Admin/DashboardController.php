<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        $data = [];
        // -----------user----
        $countUser = User::get()->count();
        $countUserActive = User::where('status',1)->get()->count();
        $countUserUnActive = User::where('status',2)->get()->count();
        
        $data['countUser'] = $countUser;
        $data['countUserActive'] = $countUserActive;
        $data['countUserUnActive'] = $countUserUnActive;
        // ------------endUser---
        //---------Worker------
        $countWorker = Worker::get()->count();
        $countWorkerActive = Worker::where('status',1)->get()->count();
        $countWorkerUnActive = Worker::where('status',0)->get()->count();

        $data['countWorker'] = $countWorker;
        $data['countWorkerActive'] = $countWorkerActive;
        $data['countWorkerUnActive'] = $countWorkerUnActive;
        //-----------EndWorker----
        for($i=1; $i<=12; $i++){
            $getMonthWorker = Worker::whereMonth('day_work', $i)->get()->count();
            $dataChart[] = $getMonthWorker;
        }
            
        // dd($dataChart);
        // dua vao data nay và em fill cho dung data mong muoosn nhe
        //
        $categoryData = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
        $data['categoryData'] = $categoryData;

        // $dataChart = [1, 5, 7, 3, 1, 5, 4, 6, 0, 4, 4, 3];
        $data['dataChart'] = $dataChart;

        return view('admin.dashboard', $data);
    }
}

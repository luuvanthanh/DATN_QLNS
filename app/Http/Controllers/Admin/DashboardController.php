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
        return view('admin.dashboard', $data);
    }
}

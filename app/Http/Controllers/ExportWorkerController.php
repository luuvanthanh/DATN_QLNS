<?php

namespace App\Http\Controllers;
use App\Exports\WorkerExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportWorkerController extends Controller
{
    public function index()
    {
        return Excel::download(new WorkerExport, 'nhanvien.xlsx');
    }
}

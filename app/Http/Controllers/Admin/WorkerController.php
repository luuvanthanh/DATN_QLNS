<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreworkerRequest;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Department;
use App\Models\Position;
use App\Models\Record;
use App\Models\Worker;
use App\Models\WorkerRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkerController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // echo 111;die;
        $data = [];
        $workers = Worker::where('name', 'like', '%' . $request->name . '%')
        ->orWhere('code', 'like', '%' . $request->name . '%')
        ->orWhere('phone', 'like', '%' . $request->name . '%')
        ->orWhere('day_work', 'like', '%' . $request->name . '%')
        ->orWhere('day_work', 'like', '%' . $request->name . '%')
        ->with('position')->paginate(10);
        $data['workers'] = $workers;
        return view('admin.workers.index', $data);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $worker = Worker::orderBy('id','DESC')->first();
        $departments = Department::get();
        $records = Record::get();
        $data['workers'] = $worker;
        $data['departments'] = $departments;
        $data['records'] = $records;
        $positions = Position::get();
        $data['positions'] = $positions;
        return view('admin.workers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreworkerRequest $request)
    {
        // try {
        //     DB::beginTransaction();
        //     // insert data table role
        //     $WorkerCreate = $this->worker->create([
        //         'code' => $request->code,
        //         'name' => $request->name,
        //         'cmnd_no' => $request->cmnd_no,
        //         'day_range' => $request->day_range,
        //         'birthday' => $request->birthday,
        //         'issued_by' => $request->issued_by,
        //         'address' => $request->address,
        //         'level' => $request->level,
        //         'school' => $request->school,
        //         'certificate' => $request->certificate,
        //         'sex' => $request->sex,
        //         'phone' => $request->phone,
        //         'email' => $request->email,
        //         'day_work' => $request->day_work,
        //         'status' => $request->status,
        //         'skill' => $request->skill,
        //         'department_id' => $request->department_id,
        //         'position_id' => $request->position_id,
        //     ]);
        //     // insert data table worker_record
           
        //     $WorkerCreate->workerRecords()->attach($request->record);
        //     dd($request->record);
        //     DB::commit();
        //     // success
        //     return redirect()->route('admin.workers.index')->with('success', 'Insert into data to Workers Sucessful.');
           
        // } catch (\Exception $ex) {
        //     DB::rollback();
        //     return redirect()->back()->with('error', $ex->getMessage());
        // }

            
            // dd($request->record);


        $workerInsert = [
            'code' => $request->code,
            'name' => $request->name,
            'cmnd_no' => $request->cmnd_no,
            'day_range' => $request->day_range,
            'birthday' => $request->birthday,
            'issued_by' => $request->issued_by,
            'address' => $request->address,
            'level' => $request->level,
            'school' => $request->school,
            'certificate' => $request->certificate,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'email' => $request->email,
            'day_work' => $request->day_work,
            'status' => $request->status,
            'skill' => $request->skill,
            'department_id' => $request->department_id,
            'position_id' => $request->position_id,
        ];
        // dd($workerInsert);
        DB::beginTransaction();
       
        try {
            // insert into table workers
            
            $worker = Worker::create($workerInsert);

            // insert into table worker_record
            if (!empty($request->record)) {
                foreach ($request->record as $recordId) {
                    WorkerRecord::create([
                        'worker_id' => $worker->id,
                        'record_id' => $recordId,
                    ]);
                }
            }
            

            DB::commit();
            return redirect()->route('admin.workers.index')->with('success', 'Insert into data to Workers Sucessful.');
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $workers = Worker::with('department')->where('id', '=', $id)->get();
        $contract_types = ContractType::get();
        $contracts = Contract::with('contractType')->get();

        $departments = Department::get();
        $workerId = Worker::findOrFail($id);

        $getAllWorkerContract = DB::table('contract_worker')->where('worker_id', $id)->pluck('contract_id');
        $data['getAllWorkerContract'] = $getAllWorkerContract;

        $positions = Position::pluck('name', 'id')->toArray();
        $data['positions'] = $positions;
        
        $data['workerId'] = $workerId;
        $data['departments'] = $departments;
        $data['contract_types'] = $contract_types;
        $data['workers'] = $workers;
        $data['contracts'] = $contracts;
        return view('admin.workers.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        // ten bien works nen dat la so it thoi vi no chi lay 1 record
        // workers ===> work
        $worker = Worker::findOrFail($id);
        $departments = Department::pluck('name', 'id')->toArray();
        $positions = Position::pluck('name', 'id')->toArray();
        $records = Record::get();
        $getAllRecordWorker = DB::table('worker_record')->where('worker_id', $id)->pluck('record_id');
        // $workerRecords = WorkerRecord::get();
        // $records = DB::table('records')->join('worker_record', 'records.id', '=', 'worker_record.record_id')->get();

        // dd($departments);
        $data['workers'] = $worker;
        $data['departments'] = $departments;
        $data['positions'] = $positions;
        $data['records'] = $records;
        $data['getAllRecordWorker'] = $getAllRecordWorker;
        // $data['workerRecords'] = $workerRecords;
       
        return view('admin.workers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $worker = Worker::find($id);
        $worker->code = $request->code;
        $worker->name = $request->name;
        $worker->cmnd_no = $request->cmnd_no;
        $worker->day_range = $request->day_range;
        $worker->issued_by = $request->issued_by;
        $worker->address = $request->address;
        $worker->level = $request->level;
        $worker->school = $request->school;
        $worker->certificate = $request->certificate;
        $worker->sex = $request->sex;
        $worker->phone = $request->phone;
        $worker->email = $request->email;
        $worker->day_work = $request->day_work;
        $worker->status = $request->status;
        $worker->skill = $request->skill;
        $worker->department_id = $request->department_id;
        $worker->position_id = $request->position_id;
        // dd( $worker);
        
        DB::beginTransaction();
        
        try{
           
            $worker->save();
            // dd($request->all());
            DB::table('worker_record')->where('worker_id', $id)->delete();
         
            $worker->record()->attach($request->record);
            
            
            DB::commit();
            
            return redirect()->route('admin.workers.index')->with('success','Update workers successful!');
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $worker = Worker::find($id);
            $worker->delete();
            DB::commit();
            return redirect()->route('admin.workers.index')
                ->with('success', 'Delete worker successful!');
        }  catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}

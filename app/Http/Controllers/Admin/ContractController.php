<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\ContractWorker;
use App\Models\Department;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Symfony\Component\VarDumper\Cloner\Data;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [];
        $contracts = Contract::orderBy('id','DESC')->first();
        $contract_types = ContractType::get();
        $workers = Worker::get();
        $data['contract_types'] = $contract_types;
        $data['workers'] = $workers;
         $data['contracts'] = $contracts;
        return view('admin.contracts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $contractInsert = [
            'code' => $request->code,
            'start_day' => $request->effective_date,
            'end_day' => $request->expiry_date,
            'wage' => $request->wage,
            'status' => $request->status,
            'contract_type_id' => $request->contract_type_id,
        ];
        // dd($contractInsert);
        DB::beginTransaction();
        try {

            $contract = Contract::create($contractInsert);

             // insert into table worker_record
            ContractWorker::create([
                'contract_id'   => $contract->id,
                'worker_id'     =>$request->id_worker,
            ]);
            DB::commit();
            return redirect()->route('admin.workers.index')->with('success', 'Insert into data to contracts Sucessful.');
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
        $data  =[];
        $users = Contract::get();
        $data['users'] = $users;
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
        $contract = Contract::find($id);
        return response()->json($contract);
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
        // dd($request->all());
        // 
        // dd( $worker);
        DB::beginTransaction();
        try{
            // dung find($id) : get ra 1 record 
            // dung findOrfail($id) : get ra 1 record vaf them tra ve loi 404 neu $id ko ton tai
            $contract = Contract::findOrFail($id);
            $contract->code = $request->code;
            $contract->start_day = date('Y-m-d', strtotime($request->start_day));
            $contract->end_day = date('Y-m-d', strtotime($request->end_day));
            $contract->wage = $request->wage;
            $contract->status = $request->status;
            $contract->contract_type_id = $request->contract_type_id;
            $contract->save();
            // DB::table('contract_worker')->where('contract_id', $request->id)->delete();
            // $contract->worker()->attach($request->id_worker);
            DB::commit();
            return response()->json($contract);
        }catch(\Exception $ex){
            DB::rollback();
            return response()->json([
                'message' => $ex->getMessage()
            ], 500);
        }
    }
    // public function update(Request $request, $id)
    // {
    //     // dd($request->all());
    //     // 
    //     // dd( $worker);
    //     DB::beginTransaction();
    //     try{
    //         // dung find($id) : get ra 1 record 
    //         // dung findOrfail($id) : get ra 1 record vaf them tra ve loi 404 neu $id ko ton tai
    //         $contract = Contract::findOrFail($id);
    //         $contract->code = $request->code1;
    //         $contract->start_day = $request->effective_date1;
    //         $contract->end_day = $request->expiry_date1;
    //         $contract->wage = $request->wage1;
    //         $contract->status = $request->status1;
    //         $contract->contract_type_id = $request->contract_type_id1;
    //         $contract->save();
    //         // DB::table('contract_worker')->where('contract_id', $request->id)->delete();
    //         // $contract->worker()->attach($request->id_worker);
    //         DB::commit();
    //         return response()->json($contract);
    //     }catch(\Exception $ex){
    //         DB::rollback();
    //         return response()->json([
    //             'message' => $ex->getMessage()
    //         ], 500);
    //     }
    // }
    // public function updateContract(Request $request){
    //     $contract = Contract::find($request->id);
    //     $contract->code = $request->code1;
    //     $contract->start_day = $request->effective_date1;
    //     $contract->end_day = $request->expiry_date1;
    //     $contract->wage = $request->wage1;
    //     $contract->status = $request->status1;
    //     $contract->contract_type_id = $request->contract_type_id1;
    //     $contract->save();
    //     return response()->json($contract);
    // }

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
            $contract = Contract::find($id);

            // find contract_id
            $contract_worker = ContractWorker::where('contract_id', $id);
            
            // delete record of Contract_Worker
            $contract_worker->delete();

            // delete record of Contract
            $contract->delete();
            // $contract_worker->delete();
            DB::commit();
            
            $data = [];
            $workers = Worker::with('department')->where('id', '=', $id)->get();
            $contract_types = ContractType::get();
            $contracts = Contract::with('contractType')->get();
            $data['contract_types'] = $contract_types;
            $data['workers'] = $workers;
            $data['contracts'] = $contracts;

            return response()->json([
                'message' => 'Delete worker successful!',
                'data_table' => View::make('admin.contracts._table_contract', $data)->render()
            ]);
        }  catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            // return redirect()->back()->with('error', $ex->getMessage());

            return response()->json([
                'message' => $ex->getMessage()
            ], 500);
        }
    }
}

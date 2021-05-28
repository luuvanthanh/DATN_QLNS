<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoredepartmentRequest;
use App\Models\Department;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $departments = Department::where('name', 'like', '%' . $request->name . '%')->withCount('workers')->paginate(7);
        
        // if(!empty($request->name)){
        //     $departments = $departments->where('name', 'like', '%' . $request->name . '%')->get();
        // }
        // $department = $departments->paginate(2);
        $data['departments'] = $departments;
        return view('admin.departments.index', $data);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('admin.departments.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredepartmentRequest $request)
    {
        $departmentInsert = [
            'name' => $request->name,
        ];
        // dd($departmentInsert);
        DB::beginTransaction();
        try {
            Department::create($departmentInsert);
            DB::commit();
            return redirect()->route('admin.departments.index')->with('sucess', 'Insert into data to Departments Sucessful.');
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
        //
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
        $departments = Department::findOrFail($id);
        $data['departments'] = $departments;
        return view('admin.departments.edit', $data);
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
        $departments = Department::find($id);
        $departments->name = $request->name;
        DB::beginTransaction();
        try{
            $departments->save();

            DB::commit();
            return redirect()->route('admin.departments.index')->with('success','Update departments successful!');
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
            $departments = Department::find($id);
            $departments->delete();
            DB::commit();
            return redirect()->route('admin.departments.index')
                ->with('success', 'Delete Department successful!');
        }  catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $data = [];
        $projects = Project::where('name', 'like', '%' . $request->name . '%')->get();
        $data['projects'] = $projects;
        return view('admin.projects.index', $data);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataInsert = [
            'name' => $request->name,
            'number_of_member' => $request->number,
            'start_day' => $request->start_day,
            'expected_end_day' => $request->expected_end_day,
            'actual_end_day' => $request->actual_end_day,
            'status' => $request->status,
        ];
        // dd($departmentInsert);
        DB::beginTransaction();
        try {
            Project::create($dataInsert);
            DB::commit();
            return redirect()->route('admin.project.index')->with('success', 'Insert into data to Project Sucessful.');
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
        $projects = Project::findOrFail($id);
        $data['projects'] = $projects;
        return view('admin.projects.edit', $data);
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
        $projects = Project::find($id);
        $projects->name = $request->name;
        $projects->number_of_member = $request->number;
        $projects->start_day = $request->start_day;
        $projects->expected_end_day = $request->expected_end_day;
        $projects->actual_end_day = $request->actual_end_day;
        $projects->status = $request->status;
        
        DB::beginTransaction();
        try{
            $projects->save();

            DB::commit();
            return redirect()->route('admin.projects.index')->with('success','Update projects successful!');
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
            $projects = Project::find($id);
            $projects->delete();
            DB::commit();
            return redirect()->route('admin.projects.index')
                ->with('success', 'Delete projects successful!');
        }  catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}


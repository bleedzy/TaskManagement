<?php

namespace App\Http\Controllers;
use App\Models\ManagerTask;
use Illuminate\Http\Request;

class CManager extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'page_name' => 'Dashboard'
        ]);
    }
    public function task_from_director()
    {
        // dd(ManagerTask::where('assigned_to', 2)->get());
        return view('task_from_director', [
            'page_name' => 'Task From Director',
            'manager_task' => ManagerTask::where('assigned_to', 2)->with('created_user')->get()// 2 = id login manager
        ]);
    }
    public function task_detail($id){
        dd(ManagerTask::find($id));
        return view('task_from_director_detail', [
            'page_name' => 'Task Detail',
            'task' => ManagerTask::find($id)
        ]);
    }

}

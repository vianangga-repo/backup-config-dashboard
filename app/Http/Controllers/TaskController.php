<?php

namespace App\Http\Controllers;

use App\Models\Task; //import model Task
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //show page list Task
    public function index(){
        $alltasks = Task::all(); // colect all data from table Task
        return view ('todo',['tasks' => $alltasks]);
    }

    // store new task to db
    public function store(Request $request){
        // validasi input
        $request->validate([
            'title'=>'required|min:3'
        ]);

        // save to db
        Task::create([
            'title'=>$request->title,
            'is_completed'=> false
        ]);

        return redirect()->back(); // back to page before
    }
}

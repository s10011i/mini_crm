<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    protected $task;

    public function __construct(){
        $this->task = new Task(); 
    }

    public function index(){
        return $this->task->all();
    }
    
    public function save(Request $request){
        return $this->task->create($request->all()); 
    }

    public function show(string $id){
        $task = $this->task->find($id);  
    }

    public function update(Request $request, string $id){
        $task = $this->task->find($id);
        $task->update($request->all());
        return $task;
    }

    public function delete(string $id){
        $task = $this->task->find($id);
        return $task->delete();   
    }

}

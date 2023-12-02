<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Entry;

class UserController extends Controller{
    protected $employee;

    public function __construct(){
        $this->employee = new User(); 
    }

    public function getBackofficeEmployees(){
        $employees = $this->employee->where('role','=','2')->get();
        return response()->json(['employees'=>$employees],200);
    }

    public function createEmployee(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'integer'],
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>false,'message'=>'some fields are incorrect!'],400);
        }
        $this->employee->name = $request->input('name');
        $this->employee->email = $request->input('email');
        $this->employee->role = $request->input('role');
        $this->employee->username = $request->input('username');
        $this->employee->password = Hash::make($request->input('password'));

        $this->employee->save();
        
        return response()->json(['status'=>true, 'message'=>'employee created'],200);
    }

    public function loginEmployee(Request $request){
        $employee = $this->employee->where([
            ['username', $request->input('username')],
            ['password', $request->input('password')]
        ])->first();

        if($employee){
            return response()->json(['status'=>true,'employee'=>$employee],200);
        }
        return response()->json(['status'=>false,'employee'=>[]],400);
    }
}

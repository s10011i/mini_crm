<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class EntryController extends Controller{
    protected $entry;

    public function __construct(){
        $this->entry = new Entry(); 
    }

    public function getAllEntries(){
        $entries = $this->entry->with('user')->orderBy('id', 'DESC')->get();
        return response()->json(['entries'=>$entries],200);
    }

    public function searchEntries(Request $request){
        $search=$request->get('s');

        if($search != null){  
            $entries = $this->entry->with('user')
            ->where('id', 'LIKE', "%$search%")
            ->orWhere('requester', 'LIKE', "%$search%")
            ->orWhere('status', 'LIKE', "%$search%")
            ->get();
            return response()->json(['entries'=>$entries],200);
        }else{
            return $this->getAllEntries(); 
        }
    }

    public function entryFrontEdit($id){
        $entry=$this->entry->with('user')->find($id);
        return response()->json(['entry'=>$entry], 200);
    }

    public function myEntries($id){
        $my_entries=$this->entry->where('assignee_id', $id)->get();
        return response()->json(['my_entries'=>$my_entries], 200);
    }

    public function assignToEmployee(Request $request){
        $entry = $this->entry->where('id','=',$request->input('id'))->first();

        $entry->assignee_id = $request->input('assignee_id');
        $entry->save();
        return response()->json(['entry'=>'assigned'], 200);
    }

    public function entryBackUpdate(Request $request){
        $entry = $this->entry->where('id',$request->input('id'))->first();

        $entry->update($request->all());
        return response()->json(['entry'=>'updated'], 200);
    }

}

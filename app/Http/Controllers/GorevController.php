<?php
// database password = uGb5NP1KmeeB!fG1

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class GorevController extends Controller
{
    public function getTasks(Request $request){
        $tasks = DB::table('tasks')->get();
        return $tasks;
    }

    public function getTask(Request $request){
        $task_id = $request->input('task_id');
        $task = DB::table('tasks')->where(['id' => $task_id])->get();

        if(count($task) != 0){
            return response()->json($task, 200);
        }
        else{
            return response()->json(['status' => 404, 'description' => "Error one"]);
        }
    }

    public function postTask(Request $request){
        $task_time = time();
        $task_header = $request->input('task_header');
        $task_subject = $request->input('task_subject');
        $permission = $request->input('permission');
        $status = $request->input('status');
    
        $add = DB::table('tasks')->insert([
            'task_time' => $task_time,
            'task_header' => $task_header,
            'task_subject' => $task_subject,
            'permission' => $permission,
            'status' => $status
        ]);

        // login tekrar kontrol edilecek

        if($add){
            $allUsers = DB::table('users')->get();
            $contents = $task_header;
            $subject = $task_subject;
            $reciver_email = $allUsers->email;
            $view_name = "API görev güncelleme"; //efolb2bcontact
            Mail::send('email.'.$view_name, ['contents'=> $contents], function ($message) use ($reciver_email, $subject) {
                $message->to($reciver_email, 'APITEST')->subject($subject);
            });
            return response()->json(['status' => 200, 'description' => 'Task successfuld added'], 200);
        }
        else{
            return response()->json(['status' => 404, 'description' => 'Error two']);
        }
    }
    public function deleteTask(Request $request){
        $task_id = $request->input('task_id');
        $delete = DB::table('tasks')->where(['id' => $task_id])->delete();
        if($delete){
            return response()->json(['status' => 200, 'description' => 'Task successfuld deleted'], 200);
        }
        else{
            return response()->json(['status' => 500, 'description' => 'Error three']);
        }
    }

    public function putAdminTask(Request $request){
        $task_id = $request->input('task_id');
        $task_time = time();
        $task_header = $request->input('task_header');
        $task_subject = $request->input('task_subject');
        $permission = $request->input('permission');
        $status = $request->input('status');
    
        $update = DB::table('tasks')->where(['id' => $task_id])->update([
            'task_id' => $task_id,
            'task_time' => $task_time,
            'task_header' => $task_header,
            'task_subject' => $task_subject,
            'permission' => $permission,
            'status' => $status,
        ]);
        if($update){
            $get = DB::table('tasks')->where(['id' => $task_id])->first();
            return response()->json(['status' => 200, 'description' => 'Task successfuld updated', 'task' => $get], 200);
        }else{
            return response()->json(['status' => 500, 'description' => 'Server error']);
        }
    
    }
    public function putUserTask(Request $request){
        $task_id = $request->input('task_id');
        $task_time = time();
        // $task_header = $request->input('task_header');
        // $task_subject = $request->input('task_subject');
        // $permission = $request->input('permission');
        $status = $request->input('status');
    
        $update = DB::table('tasks')->where(['id' => $task_id])->update([
            'task_id' => $task_id,
            'task_time' => $task_time,
            // 'task_header' => $task_header,
            // 'task_subject' => $task_subject,
            // 'permission' => $permission,
            'status' => $status,
        ]);
        if($update){
            $get = DB::table('tasks')->where(['id' => $task_id])->first();
            return response()->json(['status' => 200, 'description' => 'Task successfuld updated', 'task' => $get], 200);
        }else{
            return response()->json(['status' => 500, 'description' => 'Server error']);
        }
    
    }
    public function taskSelection(Request $request){
        $name = $request->input('name');
        $value = $request->input('value');

        $find = DB::table('tasks')->where([$name => $value]);
        
        if($find->exists()){
            return response()->json(['status' => 200, 'description' => 'Tasks found according to searched criteria ', 'task' => $find->get()], 200);
        }else{
            return response()->json(['status' => 404, 'description' => 'Task not found'], 404);
        }
    }
}

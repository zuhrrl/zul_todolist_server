<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getAllTask()
    {
        $tasks = Task::get();
        return response()->json([
            'status' => true,
            'message' => 'success get all task',
            'data' => $tasks
        ], 200);
    }

    public function createTask(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'failed to create task',
                'data' => $validator->errors()
            ], 403);
        }

        $create = Task::insert($request->all());

        if($create) {
            return response()->json([
                'status' => true,
                'message' => 'success create task',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'faile create task',
            'data' => []
        ], 403);

    }

    public function updateTask(Request $request)
    {
        $update = Task::where('id', $request->id)->update($request->all());

        if($update) {
            return response()->json([
                'status' => true,
                'message' => 'success update task',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'failed to update task',
            'data' => []
        ], 403);

    }

    public function deleteTask(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'failed to delete task',
                'data' => $validator->errors()
            ], 403);
        }

        $delete = Task::where('id', $request->id)->delete();

        if($delete) {
            return response()->json([
                'status' => true,
                'message' => 'success delete task',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'failed to delete task',
            'data' => []
        ], 403);

    }
}
